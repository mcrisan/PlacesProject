<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\PlacePhotos;

class InsertPlacesPhotosCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-photos')
                ->setDescription('Insert place photos.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();
        $text = "";
        $apiKey = $this->getContainer()->getParameter('api_key');

        $output->writeln($this->addPlacePhotos($apiKey, $em));
    }

    /**
     * 
     * Add all photos for all places in placesdb.places
     * 
     */
    function addPlacePhotos($apiKey, $em) {

        $detailsRef = $em->getRepository('BundleProjectBundle:Places')
                ->getPlacesDetailsRef();

        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $placeName = $place['slug'];
            $detailsRef = $place['details_ref'];

            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;

            $placeDetails = simplexml_load_file($url);
            $detailsResults = $placeDetails->result;
            $isPhoto = $em->getRepository('BundleProjectBundle:PlacePhotos')
                            ->checkForPhotos($placeId);
            if (!$isPhoto) { // if photos for place_id not inserted
                        //exit();
            foreach ($detailsResults as $detailResult) {
                $photos = $detailResult->photo;
                foreach ($photos as $photo) {
                    $placePhotos = new PlacePhotos();
                    $photoRef = $photo->photo_reference;
                    
                    // convert img reference to link
                    $urlPicture = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoRef&sensor=true&key=" . $apiKey;
                    $toCurl = curl_init($urlPicture);
                    curl_setopt($toCurl, CURLOPT_URL, $urlPicture);
                    curl_setopt($toCurl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($toCurl, CURLOPT_RETURNTRANSFER, 1);
                    curl_exec($toCurl);
                    $urlToAdd = curl_getinfo($toCurl);
                    $imgUrl = $urlToAdd['redirect_url'];

                            
                    $placePhotos->setImgUrl($imgUrl);
                        $placePhotos->setOrigin('google');
                        $placePhotos->setPlaceId($placeId);
                        $placePhotos->setImgRef($photoRef);
                        $em->persist($placePhotos);
                        $em->flush();

                        echo "Photo inserted for: place_id '" . $placeId . "' place name: '" . $placeName . "' \r\n";
                }
                        
                }
            } else {
                echo "Photo already inserted for: '$placeName' \r\n";
            }
            
            /*else {
                        // update photos table
                        $updatePhotos = $em->getRepository('BundleProjectBundle:PlacePhotos')
                                ->updatePlacePhotos($placeId, $photoRef, $imgUrl);

                        $updatePhotos->execute();

                        echo "Photos paths for: '$placeName' updated ! \r\n";
                        //exit();
                    }*/ 
        }
    }

// addPlacePhotos
}