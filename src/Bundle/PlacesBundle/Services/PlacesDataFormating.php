<?php
namespace Bundle\PlacesBundle\Services;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Bundle\PlacesBundle\Services\InputValidationService;
/**
 * Description of PlacesDataProcessing
 *
 * @author mcrisan
 */
class PlacesDataFormating {
    
    private $inputService;
    const GET_PHOTO_URL = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=";
      
    public function __construct($inputService=null) {
        $this->inputService = $inputService; 
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
        $toCurl = curl_init($urlPicture);
        curl_setopt($toCurl, CURLOPT_URL, $urlPicture);
        curl_setopt($toCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($toCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($toCurl);
        if(curl_errno($toCurl)){
            throw new Exception(curl_error($toCurl));
        }
        $urlToAdd = curl_getinfo($toCurl);
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
