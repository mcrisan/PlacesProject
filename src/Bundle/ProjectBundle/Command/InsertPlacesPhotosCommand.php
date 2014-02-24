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
        $placeop = $this->getContainer()->get('placeop');
        $text = "";
        $apiKey = $this->getContainer()->getParameter('api_key');

        $output->writeln($this->addPlacePhotos($apiKey, $placeop));
    }

    /**
     * 
     * Add all photos for all places in placesdb.places
     * 
     */
    function addPlacePhotos($apiKey, $placeop) {

        $detailsRef = $placeop->getPlacesDetailsRef();
        //loop in all places
        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $placeName = $place['slug'];
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $placeDetails = simplexml_load_file($url);
            $detailsResults = $placeDetails->result;
            $isPhoto = $placeop->isPhoto($placeId);
            if (!$isPhoto) { // if photos for place_id not inserted
                //insert photos for place    
                foreach ($detailsResults as $detailResult) {
                    $photos = $detailResult->photo;
                    foreach ($photos as $photo) {
                        $photoRef = $photo->photo_reference;
                        $urlPicture = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoRef&sensor=true&key=" . $apiKey;
                        $placePhotos = new PlacePhotos();
                        $placePhotos->setImgUrl($urlPicture);
                        $placePhotos->setOrigin('google');
                        $placePhotos->setPlaceId($placeId);
                        $placePhotos->setImgRef($photoRef);
                        
                        $placeop->checkPlacePhotos($placePhotos);
                    }
                }
            } else {
                echo "Photo already inserted for: '$placeName' \r\n";
            }

            /* else {
              // update photos table
              $updatePhotos = $em->getRepository('BundleProjectBundle:PlacePhotos')
              ->updatePlacePhotos($placeId, $photoRef, $imgUrl);

              $updatePhotos->execute();

              echo "Photos paths for: '$placeName' updated ! \r\n";
              //exit();
              } */
        }
    }

}
