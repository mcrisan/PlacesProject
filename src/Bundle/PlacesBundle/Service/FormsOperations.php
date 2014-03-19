<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Command\InsertPlacesCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of FormsService
 *
 * @author mcrisan
 */
class FormsOperations {

    private $container;
    private $formDao;

    public function __construct(FormsOperationsDAO $dao, ContainerInterface $container) {
        $this->container = $container;
        $this->formDao = $dao;
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
        $placeop = $this->container->get('placeop');
        $radius = 100; // 1011 m
        $placeNames = array();
        $place = new InsertPlacesCommand();
        $place->addPlaces($type, $apiKey, $lat . ',' . $long, $radius, $placeop, $placeNames, 1);
        return($placeNames);
    }

    public function getPlacesNames($input) {

        return $this->formDao->getPlacesNames($input);
    }

}
