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
            $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $json = file_get_contents($url);
            $data = json_decode($json, TRUE);
            $detailsResults = $data['result'];
            $isPhoto = $placeop->isPhoto($placeId);
            if (isset($detailsResults['photos'])) {
                if (!$isPhoto) { // if photos for place_id not inserted
                    //insert photos for place    
                    $photos = $detailsResults['photos'];
                    foreach ($photos as $photo) {
                        $photoRef = $photo['photo_reference'];
                        $urlPicture = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoRef&sensor=true&key=" . $apiKey;
                        $imgUrl = $this->getImgUrl($urlPicture);
                        $placePhotos = new PlacePhotos();
                        $placePhotos->setImgUrl($imgUrl);
                        $placePhotos->setOrigin('google');
                        $placePhotos->setPlaceId($placeId);
                        $placePhotos->setImgRef($photoRef);
                        $placeop->insertPlacePhotos($placePhotos);
                    }
                } else {
                    echo "place: '$placeName' contains photos \r\n";
                    // if place contains other photos we save them to db
                    $photos = $detailsResults['photos'];
                    foreach ($photos as $photo) {
                        $photoRef = $photo['photo_reference'];
                        $urlPicture = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoRef&sensor=true&key=" . $apiKey;
                        $imgUrl = $this->getImgUrl($urlPicture);
                        $placePhotos = $placeop->getImageByPhotoRef($placeId, $imgUrl);
                        if ($placePhotos) {
                            $placePhotos = new PlacePhotos();
                            $placePhotos->setImgUrl($imgUrl);
                            $placePhotos->setOrigin('google');
                            $placePhotos->setPlaceId($placeId);
                            $placePhotos->setImgRef($photoRef);
                            $placeop->insertPlacePhotos($placePhotos);
                        }
                    }
                }
            } else {
                echo "Place does not have photos";
            }
        }
    }

    function getImgUrl($urlPicture) {
        $toCurl = curl_init($urlPicture);
        curl_setopt($toCurl, CURLOPT_URL, $urlPicture);
        curl_setopt($toCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($toCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($toCurl);
        $urlToAdd = curl_getinfo($toCurl);
        $imgUrl = $urlToAdd['redirect_url'];
        return $imgUrl;
    }

}
