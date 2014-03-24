<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Command\InsertPlacesCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Bundle\PlacesBundle\Command\InsertAllDetailsCommand;
use Bundle\PlacesBundle\Service\PlaceOperations;
use Bundle\PlacesBundle\Entity\Places;

/**
 * Description of FormsService
 *
 * @author mcrisan
 */
class FormsOperations {

    private $container;
    private $formDao;
    private $alldet;
    private $placeop;
    private $opDAO;
    private $insertPlaces;

    public function __construct(FormsOperationsDAO $dao, ContainerInterface $container, InsertAllDetailsCommand $alldet, PlaceOperations $placeop, PlaceOperationsDAO $opdao, InsertPlacesCommand $insPlace) {
        $this->container = $container;
        $this->formDao = $dao;
        $this->alldet = $alldet;
        $this->placeop = $placeop;
        $this->opDAO = $opdao;
        $this->insertPlaces = $insPlace;
    }

//    public function getPlaces($address) {
//        $add = $address . ", Cluj-Napoca, Romania";
//        $address = $add; // Google HQ
//        $prepAddr = str_replace(' ', '+', $address);
//        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
//        $output = json_decode($geocode);
//        $latitude = $output->results[0]->geometry->location->lat;
//        $longitude = $output->results[0]->geometry->location->lng;
//        $str = $latitude . " " . $longitude;
//        if (apc_exists($str)) {
//            $places = apc_fetch($str);
//        } else {
//            if ($latitude == 46.777248 & $longitude = 23.5998899) {
//                $places = "";
//            } else if (strlen($address) > 3) {
//                $places = $this->searchPlaces($latitude, $longitude);
//            } else {
//                $places = "";
//            }
//            apc_store($str, $places);
//        }
//        return $places;
//    }
//
//    public function getPlaces2($address) {
//        $add = $address . ", Cluj-Napoca, Romania";
//        $address = $add; // Google HQ
//        $prepAddr = str_replace(' ', '+', $address);
//        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
//        $output = json_decode($geocode);
//        $latitude = $output->results[0]->geometry->location->lat;
//        $longitude = $output->results[0]->geometry->location->lng;
//        $str = $latitude . " " . $longitude;
//        //var_dump($output->results);
//        $address = array();
//        $i = 0;
//        //$geocode = file_get_contents('https://maps.googleapis.com/maps/api/place/autocomplete/json?input=Vict&types=geocode&language=fr&sensor=true&key=API_KEY');
////        foreach($output->results as $res){
////            $i++;
////            //var_dump($res->formatted_address);
////            $address[$i] = $res->formatted_address;
////        }
//        $address['name'] = $output->results[0]->formatted_address;
//        $address['lat'] = $latitude;
//        $address['long'] = $longitude;
////        if (apc_exists($str)) {
////            $places = apc_fetch($str);
////        } else {
////            if ($latitude == 46.777248 & $longitude = 23.5998899) {
////                $places = "";
////            } else if (strlen($address) > 3) {
////                $places = $this->searchPlaces($latitude, $longitude);
////            } else {
////                $places = "";
////            }
////            apc_store($str, $places);
////        }
////        return $places;
//        //var_dump($address);
//
//        return $address;
//    }

//    public function searchPlaces($lat, $long) {
//
//        $apiKey = $this->container->getParameter('api_key');
//        $type = "establishment";
//        $apiKey = $this->container->getParameter('api_key');
//        $radius = 20; // 1011 m
//
//        $placeNames = array();
//        $id = $this->placeop->getLastPlaceId();
//        $this->insertPlaces->addPlaces($type, $apiKey, $lat . ',' . $long, $radius, $placeNames);
//        $this->alldet->addAllPlacesDetails($apiKey, $id);
//        return($placeNames);
//    }

    public function insertPlaces($places, $address) {

        $session = $this->container->get('session');
        $apiKey = $this->container->getParameter('api_key');
        $pl = json_decode($places);
        $id = $this->placeop->getLastPlaceId();
        for ($i = 0; $i < count($pl); $i++) {
            $place = new Places();
            $place->setExtId($pl[$i]->extId);
            $slug = $this->placeop->gen_slug($pl[$i]->name);
            $place->setSlug($slug);
            $place->setDetailsRef($pl[$i]->detref);
            $place->setOrigin("google");
            $place->setHasOwner(0);
            if ($i == 0) {
                $newPlace = $this->placeop->insertPlace($place);
                $data[$i] = array("placeId" => $newPlace->getId(), "placeName" => $pl[$i]->name, "placeRating" => $pl[$i]->rating, "slug" => $slug, "extId" => $pl[$i]->extId, "detref" => $pl[$i]->detref);
                $this->alldet->addAllPlacesDetails($apiKey, $id);
            } else {
                $data[$i] = array("placeId" => "", "placeName" => $pl[$i]->name, "placeRating" => $pl[$i]->rating, "slug" => $slug, "extId" => $pl[$i]->extId, "detref" => $pl[$i]->detref);
            }
            apc_store($address, $data);
        }
    }
    
    public function insertHomepagePlaces($places) {

        $pl = json_decode($places);
        for ($i = 0; $i < count($pl); $i++) {
            $place = new Places();
            $place->setExtId($pl[$i]->extId);
            $slug = $this->placeop->gen_slug($pl[$i]->name);
            $place->setSlug($slug);
            $place->setDetailsRef($pl[$i]->detref);
            $place->setOrigin("google");
            $place->setHasOwner(0);

                $data[$i] = array("placeId" => "",
                    "placeName" => $pl[$i]->name, 
                    "placeRating" => $pl[$i]->rating, 
                    "slug" => $slug, 
                    "extId" => $pl[$i]->extId, 
                    "detref" => $pl[$i]->detref,
                    "tags" => $pl[$i]->tags,
                    "address" => $pl[$i]->address
                    
                        );
            }
            apc_store("index", $data);
    }

    public function checkPlaceBySlug($slug, $input) {
        $apiKey = $this->container->getParameter('api_key');
        $aux = $this->placeop->checkPlaceBySlug($slug);
        //echo $input;
        //echo "1211232321321312321";
        if (apc_exists($input)) {
            $places = apc_fetch($input);
            //echo "este";
        }
        if (!$aux) {

            for ($i = 0; $i < count($places); $i++) {
                if ($places[$i]['slug'] == $slug) {
                    $place = new Places();
                    $place->setExtId($places[$i]['extId']);
                    $place->setSlug($slug);
                    $place->setDetailsRef($places[$i]['detref']);
                    $place->setOrigin("google");
                    $place->setHasOwner(0);

                    $id = $this->placeop->getLastPlaceId();
                    $newPlace = $this->placeop->insertPlace($place);
                    $this->alldet->addAllPlacesDetails($apiKey, $id);
                }
            }
        }

        //var_dump($session->get('places'));
    }

    public function getPlacesNames($input) {

        return $this->formDao->getPlacesNames($input);
    }

    public function getAllPlacesNames() {

        return $this->formDao->getAllPlacesNames();
    }

//    public function checkPlace($input) {
//        $session = $this->container->get('session');
//        $apiKey = $this->container->getParameter('api_key');
//        if ($session->has('search')) {
//            $search = $session->get('search');
//            $data = apc_fetch($search);
//            if ("" != $data['places']) {
//                foreach ($data['places'] as $item) {
//                    if ($item['placeName'] == $input) {
//                        $place = $item['place'];
//                        $detRef = $place->getDetailsRef();
//                        $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
//                        if (!$isPlace) {
//                            $this->placeop->insertPlace($place);
//                            $this->alldet->addAllPlacesDetails($apiKey, null, $place);
//                        }
//                    }
//                }
//            }
//        }
//    }

}
