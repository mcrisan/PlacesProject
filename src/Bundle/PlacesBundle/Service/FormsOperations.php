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

    public function getPlaces($address) {
        $add = $address . ", Cluj-Napoca, Romania";
        $address = $add; // Google HQ
        $prepAddr = str_replace(' ', '+', $address);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
        $output = json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        $str = $latitude . " " . $longitude;
        if (apc_exists($str)) {
            $places = apc_fetch($str);
        } else {
            if ($latitude == 46.777248 & $longitude = 23.5998899) {
                $places = "";
            } else if (strlen($address) > 3) {
                $places = $this->searchPlaces($latitude, $longitude);
            } else {
                $places = "";
            }
            apc_store($str, $places);
        }
        return $places;
    }

    public function searchPlaces($lat, $long) {

        $type = "establishment";
        $apiKey = $this->container->getParameter('api_key');
        $radius = 100; // 1011 m
        $placeNames = array();
        $this->insertPlaces->addPlaces($type, $apiKey, $lat . ',' . $long, $radius, $placeNames, 1);
        return($placeNames);
    }

    public function getPlacesNames($input) {

        return $this->formDao->getPlacesNames($input);
    }
    
    public function checkPlace($input) {
        $session = $this->container->get('session');
        $apiKey = $this->container->getParameter('api_key');
        if ($session->has('search')) {
            $search = $session->get('search');
            $data = apc_fetch($search);
            if ("" != $data['places']) {
                foreach ($data['places'] as $item) {
                    if ($item['placeName'] == $input) {
                        $place = $item['place'];
                        $detRef = $place->getDetailsRef();
                        $isPlace = $this->opDAO->checkCurrentExtId($place->getExtId());
                        if (!$isPlace) {
                            $this->placeop->insertPlace($place);
                            $this->alldet->addAllPlacesDetails($apiKey, null, $place);
                        }
                    }
                }
            }
        }
    }

}
