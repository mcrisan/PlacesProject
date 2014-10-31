<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

use Bundle\PlacesBundle\Services\CityMetaProvider;
use Bundle\PlacesBundle\Services\InputValidationService;
use Bundle\PlacesBundle\Services\PlacesDataFormating;
use Bundle\PlacesBundle\Entities\Places;
use Bundle\PlacesBundle\Entities\PlacePhotos;
use Bundle\PlacesBundle\Entities\PlaceDetails;
use Bundle\PlacesBundle\Entities\Tags;
use Bundle\PlacesBundle\Entities\PlaceReviews;
use Bundle\PlacesBundle\Services\Places as PlaceOp;


/**
 * Description of CommandOperations
 *
 * @author mcrisan
 */
class PlacesInformationsProvider {
    
    private $cityMeta;
    private $container;
    private $placeop;
    private $inputService;
    private $placeDataFormater;
    const STEP = 0.01;
    const RADIUS = 1011;
    const GET_PLACE_DETAILS_URL = "https://maps.googleapis.com/maps/api/place/details/json?reference=";
    const GET_PLACES_URL = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=";


    public function __construct(CityMetaProvider $cityMeta, 
        ContainerInterface $container,
        PlaceOp $placeop,
        InputValidationService $inputService,
        PlacesDataFormating $placeDataFormater
    ) {
        $this->cityMeta = $cityMeta;
        $this->container = $container;
        $this->placeop = $placeop;
        $this->inputService = $inputService; 
        $this->placeDataFormater = $placeDataFormater;
    }
    
    public function addAllPlaces($type, $wlat, $elat) {
        $apiKey = $this->container->getParameter('api_key');   
        $coord = $this->cityMeta->GetCurrentCityCoordinates();
        $id = $this->placeop->getLastPlaceId();       
        $this->placeop->logMessage("Inserting places from lat " .$wlat ." to lat " .$elat);
        $nr = $this->addPlacesFromCoord($wlat, $elat, $coord, $apiKey, $type); 
        $this->placeop->logMessage("We have made: ". $nr ." querys to search for places");
        $this->addAllPlacesDetails($apiKey, $id, null, true, true, true );              
    }
    
    function addAllPlacesDetails($apiKey, 
        $startId = null, 
        $place = null, 
        $saveDetails = false, 
        $savePhotos = false, 
        $saveReviews = false
    ) {
        if (!$place) {
            $detailsRef = $this->placeop->getPlacesDetailsRefWithId($startId);
        } else {
            $detailsRef = array(0 => array('id' => $place->getId(), 
                    'detailsRef' => $place->getDetailsRef(), 
                    'slug' => $place->getSlug()
                )
            );
        }
        foreach ($detailsRef as $place) {
            $url = self::GET_PLACE_DETAILS_URL . $place['detailsRef'] . 
                    "&sensor=true&key=" . $apiKey;
            $data = $this->getDataFromUrl($url);
            if(is_null($data)){
                continue;
            }
            if ($saveDetails){
                $this->addPlaceTypes($data['result'], $place['id']);
                $this->addPlacesDetails($data['result'], $place['id']);
            }
            if ($savePhotos){
                $this->addPlacePhotos($data['result'], $place['id'], $apiKey);
            }
            if ($saveReviews){
                $this->addPlaceReviews($data['result'], $place['id']);
            }
        }
        $this->placeop->logMessage("We have made: " . 
            count($detailsRef) . " querys to insert all details");
    }
    
    private function getDataFromUrl($url){       
        $json = file_get_contents($url); 
        try{
            $data = $this->inputService->decodeJson($json);
        } catch (InvalidArgumentException $e) {
            $this->placeop->logMessage("Server could not be reached");
            return null;
        } 

        try{
            $this->inputService->checkDataStatus($data);
        }catch(UnexpectedValueException $e){
            $this->placeop->logMessage("Invalid data received"); 
            return null;
        }
        return $data;
    }
    
    function addPlaces($type, $apiKey, $latLng, $radius) {
        $url= self::GET_PLACES_URL . $latLng . "&radius=" . $radius . "&types=" 
            . $type . "&sensor=false&key=" . $apiKey;
        $this->addPlacesByUrl($url, $type, $apiKey, $latLng, $radius);
    }
        
    private function addPlacesFromCoord($wlat, $elat, $coord, $apiKey, $type){
        $nr=0;
        for ($x = $wlat; $x <= $elat; $x+=self::STEP)
        {
            for ($y = $coord['nw']['y']; $y >= $coord['se']['y']; $y-=self::STEP)
            {
                $nr++;
                $this->addPlaces($type, $apiKey, $x.','.$y, self::RADIUS);
            }
        }
        return $nr;
    }
    
    private function addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius) {  
        $data = $this->getDataFromUrl($url);
        if(is_null($data)){
            return null;
        }
        $placeItems = $data['results'];
        $pageToken = $this->inputService->getDataElement($data, 'next_page_token');
        foreach ($placeItems as $item) {
            $data = $this->placeDataFormater->getPlaceDataFromArray($item);
            $place = new Places($data['detailsRef'], 
                $data['extId'], 
                0, 
                $data['origin'], 
                $data['slug']
            );
            $this->placeop->insertPlace($place);            
        }
        if ($pageToken != "") {
            $url = self::GET_PLACES_URL . $latLng . "&radius=" . $radius 
                . "&types=" . $placeType . "&sensor=false&key=" . $apiKey 
                . "&pagetoken=" . $pageToken;
            $this->addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius);
        }
    }       
    
    function addPlacePhotos($detailsResults, $placeId, $apiKey) {        
        if (isset($detailsResults['photos'])) {                  
            $photos = $detailsResults['photos'];
            foreach ($photos as $photo) {
                $photodetails = $this->placeDataFormater->getPlacePhotoDetails($photo, $apiKey);
                $placePhotos = $this->placeop->getImageByPhotoRef($placeId, 
                    $photodetails['imgUrl']
                );
                if (!$placePhotos & $photodetails['imgUrl']) {
                    $placePhoto = new PlacePhotos($photodetails['imgUrl'], 
                        'google', 
                        $placeId, 
                        $photodetails['photoRef']
                    );
                    $this->placeop->insertPlacePhotos($placePhoto);
                }
            }  
        }
    }
    
    function addPlaceReviews($detailsResults, $placeId) {
        if( isset( $detailsResults['reviews'] ) ){
            $reviews = $detailsResults['reviews'];
            foreach ($reviews as $review) {
                $reviewDetails = $this->placeDataFormater->getReviewDetails($review, $placeId);
                $review = $this->placeop->checkPlaceReview($reviewDetails['text'], 
                    $reviewDetails['authorName'], 
                    $placeId
                );
                if (!$review){
                    $placeReview = new PlaceReviews($reviewDetails['place'],
                        $reviewDetails['authorName'],
                        $reviewDetails['authorUrl'],
                        $reviewDetails['text'],
                        $reviewDetails['aspectType'],
                        $reviewDetails['aspectRating'],
                        $reviewDetails['time']
                    );
                    $this->placeop->InsertPlaceReview($placeReview);
                }
            }
        }
    }
    
    function addPlacesDetails($detailsResults, $placeId) {
        $data = $this->placeDataFormater->getPlaceDetails($detailsResults, 
                                                          $placeId);
        $place = $this->placeop->getPlaceDetails($placeId);
        if (!$place) {
            $place = new PlaceDetails();
            $place->setPlaceId($placeId);
        }
        $data['place'] = $place;
        $place->updateAllDetails($data['placeName'], 
            $data['placePhoneNumber'], 
            $data['placeAddr'], 
            $data['placeLat'], 
            $data['placeLng'], 
            $data['placeRating'], 
            $data['placeIcon'], 
            $data['placeUrl'], 
            $data['placeWebSite']
        );
        $this->placeop->insertPlaceDetails($place);
    }    
    
    function addPlaceTypes($detailsResults, $placeId) {
        $types = $detailsResults['types'];
        foreach ($types as $innerType) {
            $tag = new Tags($innerType);
            $this->placeop->insertTag($tag);
        }
        $this->placeop->createCategory($placeId, $types, $command=1);
        $this->placeop->insertPlaceTag($types, $placeId);
    }
}