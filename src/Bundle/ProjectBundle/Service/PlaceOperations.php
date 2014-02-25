<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\ProjectBundle\Service;

use Doctrine\ORM\EntityManager;
use Bundle\ProjectBundle\Command\GreetCommand;
use Bundle\ProjectBundle\Entity\Tags;
use Bundle\ProjectBundle\Entity\PlaceTags;

/**
 * Description of PlaceOperations
 *
 * @author mcrisan
 */
class PlaceOperations {

    //put your code here
    protected $opDAO;

    public function __construct(PlaceOperationsDAO $dao) {
        $this->opDAO = $dao;
    }

    public function checkPlace($place) {

        $slug = $place->getSlug();
        $detailsRef = $place->getDetailsRef();
        $checkSlug = $this->opDAO->checkCurrentSlug($place->getSlug());
        $lastSlug = $this->opDAO->getLastSlug($place->getSlug() . '-'); // last slug
        $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
          
            if ($checkSlug) {
                if ($lastSlug) { // if the place 'has number-to-slug'
                    $lastSlugId = explode('-', $lastSlug[0]['slug']);
                    $allKeys = array_keys($lastSlugId);
                    echo $maxIndex = end($allKeys);
                    $nextNoToSlug = $lastSlugId[$maxIndex] + 1;
                    echo $slug .="-" . $nextNoToSlug;
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
            var_dump($place);
            $this->opDAO->insertPlace($place);
        } else { //update place
            echo "place exists";
            $place2 = $this->opDAO->getPlace($place->getId());
            $place2->setExtId($place->getExtId());
            $place2->setSlug($slug);
            $place2->setDetailsRef($detailsRef);
            $this->opDAO->insertPlace($place2);

        }

        echo $place->getSlug();
    }

    public function checkTag($tag) {
        $isTag = $this->opDAO->isTag($tag->getTag());
        if (!$isTag) {
            //insert tag to db
            $this->opDAO->insertTag($tag);
            $name = $tag->getTag();
            echo "Place name: . Action: sec. tag  inserted in types table ! \r\n";
        } else {
            echo "Place name: . Action: sec tag already inserted in types table ! \r\n";
        }
    }

    //check place tags
    public function checkPlaceTag($tag, $placeId) {

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
                echo $typeId . ".";
                echo $typeValue . "\r\n";
                //echo "Current place_id: ".$placeId;
                $insertPlaceTypes = new PlaceTags();
                $insertPlaceTypes->setPlaceId($placeId);
                $insertPlaceTypes->setTagId($typeId);
                if ($inc == 0) {
                    $insertPlaceTypes->setMain('true');
                } else {
                    $insertPlaceTypes->setMain('false');
                }
                $this->opDAO->insertPlaceTag($insertPlaceTypes);
                echo $inc;
                echo "Place name: '$typeValue'. Action: type inserted ! \r\n";
                $inc++;
            }
            //$inc++;
        }
    }

    public function checkPlaceDetails($place) {

            $place2 = $this->opDAO->getPlace($place->getPlaceId());
            $place->setPlace($place2);
            $this->opDAO->insertPlaceDetails($place);

    }

     public function getPlaceDetails($placeId) {
        
        return $this->opDAO->getPlaceDetails($placeId);
    }
    
    public function checkPlacePhotos($placePhotos) {
        
        $this->opDAO->insertPlacePhotos($placePhotos);
        echo "Photo inserted for \r\n";
    }

    public function checkPlaceReview($placeReview) {
        $this->opDAO->insertPlaceReview($placeReview);
        echo "Photo inserted for \r\n";
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
    
    public function getImageByPhotoRef($placeId, $imgUrl){

        return $this->opDAO->getImageByPhotoRef($placeId, $imgUrl);
    }

}
