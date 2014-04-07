<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Models;
/**
 * Description of Criteria
 *
 * @author mcrisan
 */
class Criteria {
    
    private $name;
    private $category;
    private $distance;
    private $page;
    private $resultsLimit;
    private $address;
    private $lat;
    private $lng;
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setCategory($category){
        $this->category = $category;
    }
    
    public function getCategory(){
        return $this->category;
    }
    
    public function setDistance($distance){
        $this->distance = $distance;
    }
    
    public function getDistance(){
        return $this->distance;
    }
    
    public function setPage($page){
        $this->page = $page;
    }
    
    public function getPage(){
        return $this->page;
    }
    
    public function setResultsLimit($resultsLimit){
        $this->resultsLimit = $resultsLimit;
    }
    
    public function getResultsLimit(){
        return $this->resultsLimit;
    }
    
    public function setAddress($address){
        $this->address = $address;
    }
    
    public function getAddress(){
        return $this->address;
    }
    
    public function setLat($lat){
        $this->lat = $lat;
    }
    
    public function getLat(){
        return $this->lat;
    }
    
    public function setLng($lng){
        $this->lng = $lng;
    }
    
    public function getLng(){
        return $this->lng;
    }
    
    public function toString(){
        $str = $this->name . " " .
                $this->category['food'] . " " .
                $this->category['drink'] . " " .
                $this->distance . " " .
                $this->page . " " .
                $this->resultsLimit . " " .
                $this->address . " " .
                $this->lat . " " .
                $this->lng;
        
        return $str;
    }
}
