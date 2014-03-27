<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of SearchWebServiceDAO
 *
 * @author mcrisan
 */
class SearchWebServiceDAO {
    //put your code here
    
    protected $em;

    public function __construct( EntityManager $em) {
        $this->em = $em;
    }
    
    public function getPlacesNamesAndIds($name){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesAndIds($name);
    }
    
    public function getPlacesByDistance($name, $food, $drink, $lat, $lng, $dist, $limit=null, $pag=null){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesByDistance($name, $food, $drink, $lat, $lng, $dist, $limit, $pag);
    }
    
     public function getPlacesNamesAndIdsByAddress($address){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesAndIdsByAddress($address);
    }
    
    public function getPlacesNamesByTagAndAddress($tag, $address){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesByTagAndAddress($tag, $address);
    }
    
    public function getPlacesByNameOrAddressOrTag($input){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesByNameOrAddressOrTag($input);
    }
    
    public function getPlacesNamesAndIdsByTag($tag){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesAndIdsByTag($tag);
    }
    
     public function getPlacesSlug($id){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesSlug($id);
    }
    
    public function getDefaultPlaceReviews($placeId){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                    ->getReviews($placeId);
    }
    
    public function getPlacesDetails($placeId){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesDetails($placeId, 1);
    }
    
    public function getPlacePhotos($placeId, $nr = null){
        
        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                    ->getPlacePhotos($placeId, $nr);
    }
    
    public function getUserStatus($placeId, $currentIp){
        
        return $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                    ->getUserStatus($placeId, $currentIp);
    }
    
    public function getCurrentCounts($placeId){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->getCurrentCounts($placeId);
    }
    
    public function getTotalVotes(){
        
        return $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                    ->getTotalVotes();
    }
    
    public function getCurrentVotes($placeId){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->getCurrentVotes($placeId);
    }
    
    

}
