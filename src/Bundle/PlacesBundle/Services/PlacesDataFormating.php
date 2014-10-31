<?php
namespace Bundle\PlacesBundle\Services;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Bundle\PlacesBundle\Services\InputValidationService;
use Bundle\PlacesBundle\Services\Places;
use Bundle\PlacesBundle\Services\CurlRequest;
/**
 * Description of PlacesDataProcessing
 *
 * @author mcrisan
 */
class PlacesDataFormating {
    
    private $inputService;
    private $placeop;
    private $curlRequest;
    
    const GET_PHOTO_URL = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=";
      
    public function __construct($inputService=null, $placeop=null, $curlRequest=null) {
        $this->inputService = $inputService;
        $this->placeop = $placeop;
        $this->curlRequest = $curlRequest;
    }
    
    public function gen_slug($str) {
        
        $str = iconv("UTF-8", "ASCII//TRANSLIT", $str);
        $str = strtolower($str);
        
        return preg_replace(array('/[^a-z0-9-]/', '/[-]+/', '/^-|-$/'), array('', '-', ''), $str);
    } 
    
    public function getPlaceDataFromArray($item){
        $data=array();
        $data['extId'] = $this->inputService->getDataElement($item, 'id');
        $data['name'] = $this->inputService->getDataElement($item, 'name');
        $data['slug'] = $this->gen_slug($data['name']);
        $data['origin'] = "google";
        $data['detailsRef'] = $this->inputService->getDataElement($item, 'reference');
        $data['rating'] = $this->inputService->getDataElement($item, 'rating');
        return $data;
    }
    
    public function getPlacePhotoDetails($photo, $apiKey){
        $data = array();
        $data['photoRef'] = $photo['photo_reference'];
        $data['urlPicture'] = self::GET_PHOTO_URL . $data['photoRef']. "&sensor=true&key=" . $apiKey;
        try{
            $data['imgUrl'] = $this->getImgUrl($data['urlPicture']);
        }catch(Exception $e){
            $this->placeop->logMessage("Could not connect to url ");
            $data['imgUrl'] = null;
        }
        return $data;
    }

    public function getImgUrl($urlPicture) {
        $this->curlRequest->initCurl($urlPicture);
        $this->curlRequest->setOption(CURLOPT_URL, $urlPicture);
        $this->curlRequest->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $this->curlRequest->setOption(CURLOPT_RETURNTRANSFER, 1);
        $this->curlRequest->execute();
        $urlToAdd = $this->curlRequest->getInfo();
        $imgUrl = $urlToAdd['redirect_url'];
        return $imgUrl;
    }
    
    public function getReviewDetails($review, $placeId){
        $data = array();
        $data['time'] = $review['time'];
        $data['text'] = $review['text'];
        $data['authorName'] = $review['author_name'];
        $data['authorUrl'] = $this->inputService->getDataElement($review, 'author_url');
        $aspects = $review['aspects'];
        foreach ($aspects as $aspect) {
            $data['aspectType'] = $aspect['type'];
            $data['aspectRating'] = $aspect['rating'];
        }
        $data['place'] = $this->placeop->getPlace($placeId);
        return $data;
    }
    
    public function getPlaceDetails($detailsResults, $placeId){
        $data = array();
        $geoGeometry = $detailsResults['geometry'];
        $geoLocation = $geoGeometry['location'];
        $data['placeUrl'] = $detailsResults['url'];
        $data['placeName'] = $detailsResults['name'];
        $data['placeAddr'] = $this->inputService->getDataElement($detailsResults, 'formatted_address');
        $data['placePhoneNumber'] = $this->inputService->getDataElement($detailsResults, 'formatted_phone_number');
        $data['placeRating'] = $this->inputService->getDataElement($detailsResults, 'rating');
        $data['placeWebSite'] = $this->inputService->getDataElement($detailsResults, 'website');
        $data['placeIcon'] = $this->inputService->getDataElement($detailsResults, 'icon');
        $data['placeLat'] = $geoLocation['lat'];
        $data['placeLng'] = $geoLocation['lng'];
        return $data;
    }
}
