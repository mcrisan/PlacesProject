<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bridge\Monolog\Logger;
use Bundle\PlacesBundle\Entities\PlaceTags;
use Bundle\PlacesBundle\Entities\PlaceCategories;
use Bundle\PlacesBundle\Services\PlacesDAO;
use Bundle\PlacesBundle\Services\UserOperation;

/**
 * Description of Places
 *
 * @author mcrisan
 */
class Places {

    protected $opDAO;
    private $container;
    private $logger;
    private $userop;

    public function __construct(PlacesDAO $placesdao, UserOperation $userop, ContainerInterface $container, Logger $logger) {
        $this->opDAO = $placesdao;
        $this->container = $container;
        $this->logger = $logger;
        $this->userop = $userop;
    }

    public function logMessage($mes) {
        $this->logger->info($mes);
    }

    public function insertPlace($place) {

        $i = 1;
        $slug = $place->getSlug();
        $detailsRef = $place->getDetailsRef();
        $checkSlug = $this->opDAO->checkCurrentSlug($place->getSlug());
        $lastSlug = $this->opDAO->getLastSlug($place->getSlug() . '-'); // last slug
        $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
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
                throw new \Exception($strerror);
            } else {
                $newPlace = $this->opDAO->insertPlace($place);
            }
        } else { //update place
            $place2 = $this->opDAO->getPlaceByExtId($place->getExtId());
            $place2->setExtId($place->getExtId());
            $place2->setDetailsRef($detailsRef);
            $validator = $this->container->get('validator');
            $errors = $validator->validate($place);
            $strerror = (string) $errors;
            if ($strerror) {
                throw new \Exception($strerror);
            } else {
                $newPlace = $this->opDAO->insertPlace($place2);
            }
        }
        return $newPlace;
    }

    public function insertTag($tag) {

        $validator = $this->container->get('validator');
        $errors = $validator->validate($tag);
        $strerror = (string) $errors;
        if ($strerror) {
            throw new \Exception($strerror);
        } else {
            $isTag = $this->opDAO->isTag($tag->getTag());
            if (!$isTag) {
                $this->opDAO->insertTag($tag);
            }
        }
    }

    //check place tags
    public function insertPlaceTag($tag, $placeId) {

        $allTypes = $this->opDAO->getAllTags();
        $currentTypes = json_decode(json_encode($tag), TRUE);
        $this->opDAO->deletePlaceTag($placeId);
        // on first run set main = true
        $inc = 0;
        foreach ($allTypes as $typeInfo) {
            $typeId = $typeInfo['id'];
            $typeValue = $typeInfo['tag'];
            if (in_array($typeValue, $currentTypes)) {
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
                    throw new \Exception($strerror);
                } else {
                    $this->opDAO->insertPlaceTag($insertPlaceTypes);
                    $inc++;
                }
            }
        }
    }

    public function insertPlaceDetails($place) {

        $place2 = $this->opDAO->getPlace($place->getPlaceId());
        $place->setPlace($place2);
        $validator = $this->container->get('validator');
        $errors = $validator->validate($place);
        $strerror = (string) $errors;
        if ($strerror) {
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
            throw new \Exception($strerror);
        } else {
            $this->opDAO->insertPlacePhotos($placePhotos);
        }
    }

    public function insertPlaceReview($placeReview) {

        $validator = $this->container->get('validator');
        $errors = $validator->validate($placeReview);
        $strerror = (string) $errors;
        if ($strerror) {
            throw new \Exception($strerror);
        } else {
            $this->opDAO->insertPlaceReview($placeReview);
        }
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

    public function getLastPlaceId() {

        $id = $this->opDAO->getLastPlaceId();
        return $id[0]['id'];
    }

    public function getPlacesDetailsRefWithId($startId) {

        return $this->opDAO->getPlacesDetailsRefWithId($startId);
    }

    public function checkPlaceDetailsByNameAndAddress($name, $address) {

        return $this->opDAO->checkPlaceDetailsByNameAndAddress($name, $address);
    }

    public function deletePlace($id) {

        return $this->opDAO->deletePlace($id);
    }

    public function getPlacesDetail($startId, $stopId) {

        return $this->opDAO->getPlacesDetail($startId, $stopId);
    }

    public function gen_slug($str) {
        # special accents
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $str)));
    }

    public function checkPlaceBySlug($slug) {

        return $this->opDAO->checkCurrentSlug($slug);
    }

    public function insertCategories() {
        $places = $this->opDAO->getPlaces();
        $i = 0;
        foreach ($places as $place) {
            $i++;
            $id = $place->getId();
            $tags = $this->opDAO->getTags($id);
            $this->createCategory($id, $tags);
            echo "" . $i . " ";
        }
        echo "done";
    }

    public function createCategory($id, $tags, $command = null) {
        $food = array("restaurant", "bakery", "meal_delivery");
        $drinks = array("cafe", "bar", "night_club");
        $ok_f = false;
        $ok_d = false;
        foreach ($tags as $tag) {
            if (!$command) {
                $t_name = $tag['tag'];
            } else {
                $t_name = $tag;
            }
            if (in_array($t_name, $food)) {
                $ok_f = true;
            }
            if (in_array($t_name, $drinks)) {
                $ok_d = true;
            }
        }
        if ($ok_f) {
            $placeCat = new PlaceCategories();
            $placeCat->setCategoryId(1);
            $placeCat->setPlaceId($id);
            $this->opDAO->insertCategory($placeCat);
        }
        if ($ok_d) {
            $placeCat = new PlaceCategories();
            $placeCat->setCategoryId(2);
            $placeCat->setPlaceId($id);
            $this->opDAO->insertCategory($placeCat);
            return;
        }
        $placeCat = new PlaceCategories();
        $placeCat->setCategoryId(3);
        $placeCat->setPlaceId($id);
        $this->opDAO->insertCategory($placeCat);
    }
    
    public function getPlacesNames($input) {

        return $this->opDAO->getPlacesNames($input);
    }

    public function getAllPlacesNames() {

        $places = $this->opDAO->getAllPlacesNames();
        foreach ($places as $key => $place) {
            $cat = $place['category'];
            if (strpos($cat, ',') !== FALSE) {
                $places[$key]['category'] = 'FoodDrink';
            }
        }
        return $places;
    }
    
    public function searchByName($name, $food, $drink) {

        $places1 = $this->opDAO->getPlacesNamesAndIds($name);
        $distance = $this->container->getParameter('distance');
        $limit = $this->container->getParameter('limit');
        if (empty($places1)) {
            $name_enc = urlencode($name);
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $name_enc . '&sensor=false');
            $output = json_decode($geocode);
            if (isset($output->results[0])) {
                $latitude = $output->results[0]->geometry->location->lat;
                $longitude = $output->results[0]->geometry->location->lng;
                $coord = array("lat" => $latitude, "lng" => $longitude);
                apc_store($name, $coord);
                $places = $this->opDAO->getPlacesByDistance($name, $food, $drink, $latitude, $longitude, $distance, $limit);
            }
        } else {
            $placeId = $places1[0]['placeId'];
            $placeInfo = $this->getPlaceInfos($placeId);
            $latitude = $placeInfo['place']['placelat'];
            $longitude = $placeInfo['place']['placelng'];
            $coord = array("lat" => $latitude, "lng" => $longitude);
            apc_store($name, $coord);
            $cat = $places1[0]['category'];
            if($food == "off" & $drink == "off"){
            if(strpos($cat, 'Food') !== FALSE){
                $food = "on";
            }
            if(strpos($cat, 'Drink') !== FALSE){
                $drink = "on";
            }
            }
            $places = $this->opDAO->getPlacesByDistance($name, $food, $drink, $latitude, $longitude, $distance, $limit);
            
            //if ((("on" == $food) & (strpos($cat, 'Food') !== FALSE)) || (("on" == $drink) & (strpos($cat, 'Drink') !== FALSE))) {
                array_unshift($places, $places1[0]);
                array_pop($places);
            //}
        }
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->userop->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $places = $this->opDAO->getPlacesNamesAndIds("Restaurant Havana");
            $userInfo = $this->userop->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        }
        return $resp;
    }
    
    public function getPlaceInfos($placeId) {

        $placeInfo = array();
        $getPlaceSlug = $this->opDAO->getPlacesSlug($placeId);
        $placeInfo['placeSlug'] = $getPlaceSlug[0]['slug'];
        $placeInfo['placeReviews'] = $this->opDAO->getPlaceReviews($placeId);
        $placeDet = $this->opDAO->getPlacesDetails($placeId);
        $placeInfo['place']['placeid'] = $placeDet[0]->getPlaceId();
        $placeInfo['place']['placename'] = $placeDet[0]->getPlaceName();
        $placeInfo['place']['placephonenumber'] = $placeDet[0]->getPlacePhonenumber();
        $placeInfo['place']['placevicinity'] = $placeDet[0]->getPlaceVicinity();
        $placeInfo['place']['placelat'] = $placeDet[0]->getPlaceLat();
        $placeInfo['place']['placelng'] = $placeDet[0]->getPlaceLng();
        $placeInfo['place']['placerating'] = $placeDet[0]->getPlaceRating();
        $placeInfo['place']['placeicon'] = $placeDet[0]->getPlaceIcon();
        $placeInfo['place']['placeurl'] = $placeDet[0]->getPlaceUrl();
        $placeInfo['place']['placeWebSite'] = $placeDet[0]->getPlaceWebsite();
        $placeInfo['placePhotos'] = $this->opDAO->getPlacePhotos($placeId, 1);
        $placeInfo['placeAllPhotos'] = $this->opDAO->getPlacePhotos($placeId);
        $placeInfo['totalVotesForPlace'] = $this->opDAO->getCurrentCounts($placeId);
        $placeInfo['totalVotesAllTime'] = $this->opDAO->getTotalVotes();
        $placeInfo['total'] = $this->opDAO->getCurrentVotes($placeId);
        $placeInfo['totalCounts'] = $this->opDAO->getCurrentCounts($placeId);
        $placeInfo['userStatus'] = $this->opDAO->getUserStatus($placeId, $this->userop->getIp());

        return $placeInfo;
    }
    
    public function getPlaceInfosBySlug($slug) {

        $placeId = $this->opDAO->getPlacesIdBySlug($slug);
        $id = $placeId[0]['id'];
        $details = $this ->getPlaceInfos($placeId);
        $userInfo = $this->userop->getUserDetails();     
        return array("details" => $details, "userInfo" => $userInfo );
    }

}
