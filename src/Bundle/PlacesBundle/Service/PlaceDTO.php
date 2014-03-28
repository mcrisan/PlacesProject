<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Service;

/**
 * Description of PlaceDTO
 *
 * @author mcrisan
 */
class PlaceDTO {
    //put your code here
    
    private $placeDetails;
    private $firstPhoto;
    private $placeAllPhotos;
    private $userIp;
    private $placeSlug;
    private $placeId;
    private $reviews;
    private $totalVotesAllPlaces;
    private $totalVotesForPlace;
    private $usersRating;
    private $userVoted;
    
    public function setPlaceDetails($placeDet){
        $this->placeDetails = $placeDet;
    }
    
    public function getPlaceDetails(){
        return $this->placeDetails;
    }
    
    public function setFirstPhoto($firstPhoto){
        $this->firstPhoto = $firstPhoto;
        return $this;
    }
    
    public function getFirstPhoto(){
        return $this->firstPhoto;
    }
    
    public function setPlaceAllPhotos($placeAllPhotos){
        $this->placeAllPhotos = $placeAllPhotos;
    }
    
    public function getPlaceAllPhotos(){
        return $this->placeAllPhotos;
    }
    
    public function setUserIp($userIp){
        $this->userIp = $userIp;
    }
    
    public function getUserIp(){
        return $this->userIp;
    }
    
    public function setPlaceSlug($placeSlug){
        $this->placeSlug = $placeSlug;
    }
    
    public function getPlaceSlug(){
        return $this->placeSlug;
    }
    
    public function setPlaceId($id){
        $this->placeId = $id;
    }
    
    public function getPlaceId(){
        return $this->placeId;
    }
    
    public function setReviews($reviews){
        $this->reviews = $reviews;
    }
    
    public function getReviews(){
        return $this->reviews;
    }
    
    public function setTotalVotesAllPlaces($totalVotesAllPlaces){
        $this->totalVotesAllPlaces = $totalVotesAllPlaces;
    }
    
    public function getTotalVotesAllPlaces(){
        return $this->totalVotesAllPlaces;
    }
    
    public function setUsersRating($usersRating){
        $this->usersRating = $usersRating;
    }
    
    public function getUsersRating(){
        return $this->usersRating;
    }
    
    public function setTotalVotesForPlace($totalVotesForPlace){
        $this->totalVotesForPlace = $totalVotesForPlace;
    }
    
    public function getTotalVotesForPlace(){
        return $this->totalVotesForPlace;
    }
    
     public function setUserVoted($userVoted){
        $this->userVoted = $userVoted;
    }
    
    public function getUserVoted(){
        return $this->userVoted;
    }
    
    public function jsonSerialize() {
        $data = array();
        $data['placeDetails'] = $this->placeDetails;
        $data['firstPhoto'] = $this->firstPhoto;
        $data['placeAllPhotos'] = $this->placeAllPhotos;
        $data['userIp'] = $this->userIp;
        $data['placeSlug'] = $this->placeSlug;
        $data['placeId'] = $this->placeId;
        $data['reviews'] = $this->reviews;
        $data['totalVotesAllPlaces'] = $this->totalVotesAllPlaces;
        $data['totalVotesForPlace'] = $this->totalVotesForPlace;
        $data['usersRating'] = $this->usersRating;
        $data['userVoted'] = $this->userVoted;
        
        return $data;
    }
    
}
