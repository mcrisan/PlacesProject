<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Entity\PlaceTags;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bridge\Monolog\Logger;
use Bundle\PlacesBundle\Entity\Places;
use Bundle\PlacesBundle\Command\InsertAllDetailsCommand;

/**
 * Description of PlaceOperations
 *
 * @author mcrisan
 */
class PlaceOperations {

    //put your code here
    protected $opDAO;
    private $container;
    private $logger;

    public function __construct(PlaceOperationsDAO $dao, ContainerInterface $container, Logger $logger) {
        $this->opDAO = $dao;
        $this->container = $container;
        $this->logger = $logger;
    }
    
    public function logMessage($mes) {
//        $session = $this->container->get('session');
//        $session ->set("cas","tare");
//        echo $session->get("cas");
//        echo $session->getId();
 //       echo $mes;
        $this->logger->info($mes);
        
    }

    public function insertPlace($place) {

        $i=1;
        $slug = $place->getSlug();
        $detailsRef = $place->getDetailsRef();
        $checkSlug = $this->opDAO->checkCurrentSlug($place->getSlug());
        $lastSlug = $this->opDAO->getLastSlug($place->getSlug() . '-'); // last slug
        $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
        $extId = $place->getExtId();
        if ($checkSlug) {
            if ($lastSlug) { // if the place 'has number-to-slug'
                $lastSlugId = explode('-', $lastSlug[0]['slug']);
                $allKeys = array_keys($lastSlugId);
                 $maxIndex = end($allKeys);
                $nextNoToSlug = $lastSlugId[$maxIndex] + 1;
                 $slug .="-" . $nextNoToSlug;
            } else {
                $slug .="-" . $i;
            }
        }
        //check detailsRef
        if (empty($detailsRef)) {
            $detailsRef = "no ref";
        }
        if (!$isPlace) { // if not-insert place 
            $place->setSlug($slug);
            $place->setDetailsRef($detailsRef);
            $validator = $this->container->get('validator');
            $errors = $validator->validate($place);
            $strerror = (string) $errors;
            if ($strerror) {
              //  echo $strerror;
                throw new \Exception($strerror);
            } else {
                $this->opDAO->insertPlace($place);
            }
        } else { //update place
          //  echo "place exists";
            $place2 = $this->opDAO->getPlaceByExtId($place->getExtId());
            $place2->setExtId($place->getExtId());
            $place2->setDetailsRef($detailsRef);
            $validator = $this->container->get('validator');
            $errors = $validator->validate($place);
            $strerror = (string) $errors;
            if ($strerror) {
          //      echo $strerror;
                throw new \Exception($strerror);
            } else {
                $this->opDAO->insertPlace($place2);
            }
        }

       // echo $place->getSlug();
    }

    public function insertTag($tag) {

        $validator = $this->container->get('validator');
        $errors = $validator->validate($tag);
        $strerror = (string) $errors;
        if ($strerror) {
         //   echo $strerror;
            throw new \Exception($strerror);
        } else {
            $isTag = $this->opDAO->isTag($tag->getTag());
            if (!$isTag) {
                //insert tag to db
                $this->opDAO->insertTag($tag);
          //      echo "tag  inserted in tags table ! \r\n";
            } else {
          //      echo "tag already inserted in tags table ! \r\n";
            };
        }
    }

    //check place tags
    public function insertPlaceTag($tag, $placeId) {

        $allTypes = $this->opDAO->getAllTags();
        $currentTypes = json_decode(json_encode($tag), TRUE);
        // delete all tags in tb. 'place_tags' for current place
        $this->opDAO->deletePlaceTag($placeId);
        // run query's & insert details in place_tags
        // on first run set main = true
        $inc = 0;
        foreach ($allTypes as $typeInfo) {
            $typeId = $typeInfo['id'];
            $typeValue = $typeInfo['tag'];

            if (in_array($typeValue, $currentTypes)) {
                //echo "Current place_id: ".$placeId;
                $insertPlaceTypes = new PlaceTags();
                $insertPlaceTypes->setPlaceId($placeId);
                $insertPlaceTypes->setTagId($typeId);
                if ($inc == 0) {
                    $insertPlaceTypes->setMain('true');
                } else {
                    $insertPlaceTypes->setMain('false');
                }
                $validator = $this->container->get('validator');
                $errors = $validator->validate($insertPlaceTypes);
                $strerror = (string) $errors;
                if ($strerror) {
             //       echo $strerror;
                    throw new \Exception($strerror);
                } else {
                    $this->opDAO->insertPlaceTag($insertPlaceTypes);
             //       echo $inc;
             //       echo "Place name: '$typeValue'. Action: type inserted ! \r\n";
                    $inc++;
                }
            }
        }
    }

    public function insertPlaceDetails($place) {

        $place2 = $this->opDAO->getPlace($place->getPlaceId());
        $place->setPlace($place2);
        //var_dump($place2);
        $validator = $this->container->get('validator');
        $errors = $validator->validate($place);
        $strerror = (string) $errors;
        if ($strerror) {
          //  echo $strerror;
            throw new \Exception($strerror);
        } else {
            $this->opDAO->insertPlaceDetails($place);
        }
    }

    public function getPlaceDetails($placeId) {

        return $this->opDAO->getPlaceDetails($placeId);
    }

    public function insertPlacePhotos($placePhotos) {

        $validator = $this->container->get('validator');
        $errors = $validator->validate($placePhotos);
        $strerror = (string) $errors;
        if ($strerror) {
      //      echo $strerror;
            throw new \Exception($strerror);
        } else {
            $this->opDAO->insertPlacePhotos($placePhotos);
        }
     //   echo "Photo inserted \r\n";
    }

    public function insertPlaceReview($placeReview) {

        $validator = $this->container->get('validator');
        $errors = $validator->validate($placeReview);
        $strerror = (string) $errors;
        if ($strerror) {
     //       echo $strerror;
            throw new \Exception($strerror);
        } else {
            $this->opDAO->insertPlaceReview($placeReview);
        }
     //   echo "Photo inserted for \r\n";
    }

    public function getPlacesDetailsRef() {

        return $this->opDAO->getPlacesDetailsRef();
    }

    public function isPhoto($placeId) {
        return $this->opDAO->isPhoto($placeId);
    }

    public function deletePlaceReviews($placeId) {
        return $this->opDAO->deletePlaceReviews($placeId);
    }

    public function getPlace($placeId) {
        return $this->opDAO->getPlace($placeId);
    }

    public function getImageByPhotoRef($placeId, $imgUrl) {

        return $this->opDAO->getImageByPhotoRef($placeId, $imgUrl);
    }
    
    public function getLastPlaceId(){

        $id = $this->opDAO->getLastPlaceId();
        return $id[0]['id'];
    }
    
    public function getPlacesDetailsRefWithId($startId){
        
        return $this->opDAO->getPlacesDetailsRefWithId($startId);
    }
    
    public function checkPlaceDetailsByNameAndAddress($name, $address){
        
        return $this->opDAO->checkPlaceDetailsByNameAndAddress($name, $address);
    }
    
    public function deletePlace($id){
        
        return $this->opDAO->deletePlace($id);
    }
    
    public function getPlacesDetail($startId, $stopId){
        
        return $this->opDAO->getPlacesDetail($startId, $stopId);
    }

    
    public function checkPlace($input) {
        $session = $this->container->get('session');
        $apiKey = $this->container->getParameter('api_key');
        //echo $apiKey;
        //$placeop = $this->container->get('placeop');
        if ($session->has('search')) {           
            $search = $session->get('search');
            $data = $session->get($search);
            //echo "exista";
            //var_dump($data['places']);
            if("" != $data['places']){
            foreach ($data['places'] as $item) {
                //var_dump($item);
                if ($item['placeName'] == $input) {
                    $place = $item['place'];
                    $detRef = $place->getDetailsRef();
                    $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
                    if(!$isPlace){
                        $this->insertPlace($place); 
                        //echo "place-ul nu exista";
                        $placeDetails = new InsertAllDetailsCommand();
                        //$placeDetails->addAllPlacesDetails($apiKey, $this, $detRef);
                        $placeDetails->addAllPlacesDetails($apiKey, $this, $place);
                    }
                    
                    //var_dump($place);
                }
            }
            }
            //$placeName = $data['placeName'];
            //$places = $data['places'];
        }
    }
}
