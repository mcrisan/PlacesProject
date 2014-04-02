<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entities\PlacePhotos;
use Bundle\PlacesBundle\Service\Places;

class InsertPlacesPhotosCommand extends ContainerAwareCommand {

    private $placeop;

    public function __construct(Places $placeop) {
        $this->placeop = $placeop;
    }
    
    protected function configure() {
        $this
                ->setName('places:insert-photos')
                ->setDescription('Insert place photos.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        $id = $this->placeop->getLastPlaceId();
        $output->writeln();
    }
   
    function addPlacePhotos($data, $place, $apiKey) {
        
            $placeId = $place['id'];
            $status = $data['status'];
            if ($status =="REQUEST_DENIED"){
                $mes = "Request denied while inserting photos for place: ". $placeId;
                $this->placeop->logMessage($mes);
                return;
            }
            if ($status =="NOT_FOUND"){
                $mes = "Place: ". $placeId . " not found while inserting photos";
                $this->placeop->logMessage($mes);
                return;
            }
            if ($status !="OK"){
                return;
            }
            $detailsResults = $data['result'];
            $isPhoto = $this->placeop->isPhoto($placeId);
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
                        $this->placeop->insertPlacePhotos($placePhotos);
                    }
                } else {
                    // if place contains other photos we save them to db
                    $photos = $detailsResults['photos'];
                    foreach ($photos as $photo) {
                        $photoRef = $photo['photo_reference'];
                        $urlPicture = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoRef&sensor=true&key=" . $apiKey;
                        $imgUrl = $this->getImgUrl($urlPicture);
                        $placePhotos = $this->placeop->getImageByPhotoRef($placeId, $imgUrl);
                        if ($placePhotos) {
                            $placePhotos = new PlacePhotos();
                            $placePhotos->setImgUrl($imgUrl);
                            $placePhotos->setOrigin('google');
                            $placePhotos->setPlaceId($placeId);
                            $placePhotos->setImgRef($photoRef);
                            $this->placeop->insertPlacePhotos($placePhotos);
                        }
                    }
                }
            } else {
                //echo "Place does not have photos";
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
