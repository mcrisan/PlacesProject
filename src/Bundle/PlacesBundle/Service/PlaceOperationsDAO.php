<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of PlaceOperationsDAO
 *
 * @author mcrisan
 */
class PlaceOperationsDAO {
    
    
    protected $em;

    public function __construct( EntityManager $em) {
        $this->em = $em;
    }
    
    public function test2($p){
        echo $p;
    }
    
    public function insertPlace($place){
        $this->em->persist($place);
        $this->em->flush();
        return $place;
    }
    
    public function checkCurrentSlug($slug){
        
        return $this->em->getRepository('BundlePlacesBundle:Places')
                ->checkCurrentSlug($slug);
    }
    
    public function checkPlaceDetailsByNameAndAddress($name, $address){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->checkPlaceDetailsByNameAndAddress($name, $address);
    }
    
    
    public function getLastSlug($slug){
        
        return $this->em->getRepository('BundlePlacesBundle:Places') // last slug
                ->getLastSlug($slug);
    }
    
    public function checkCurrentExtId($extId){
        
        return $this->em->getRepository('BundlePlacesBundle:Places')
                ->checkCurrentExtId($extId);
    }
    
    public function insertTag($tag){
        $this->em->persist($tag);
        $this->em->flush();
    }
    
    public function isTag($tagName){

        return $this->em->getRepository('BundlePlacesBundle:Tags')
                ->isTag($tagName);
    }
    
    public function insertPlaceTag($placeTag){
        $this->em->persist($placeTag);
        $this->em->flush();
    }
    
    public function getAllTags(){

        return $this->em->getRepository('BundlePlacesBundle:Tags')
                ->getAllTags();
    }
    
    public function deletePlaceTag($placeId){
        // delete all tags in tb. 'place_tags' for current place
        $delete = $this->em->getRepository('BundlePlacesBundle:PlaceTags')
                ->deletePlaces($placeId);
        //var_dump($delete);
        //exit();

        if ($delete->execute()) {
           // echo "Place name: Action: place deleted from place_tags tb. \r\n";
        }
    }
    
    public function insertPlaceDetails($placeDetails){
        
       // echo $placeDetails->getPlaceId();
       // var_dump($placeDetails);
        $this->em->persist($placeDetails);
        $this->em->flush();
    }
    
    public function isPlaceDetails($placeId){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->checkPlaceDetails($placeId);
    }
    
    public function insertPlacePhotos($placePhotos){
        
        $this->em->persist($placePhotos);
        $this->em->flush();
    }
    
    public function insertPlaceReview($placeReview){
        
        $this->em->persist($placeReview);
        $this->em->flush();
    }
    
    public function getPlace($placeId){
        return $this->em->getRepository('BundlePlacesBundle:Places')->find($placeId);
    }
    
    public function getPlaceByExtId($extId){
        return $this->em->getRepository('BundlePlacesBundle:Places')
                ->findOneBy(array("extId" => $extId));
    }
    
    public function getPlacesDetailsRef(){
        return $this->em->getRepository('BundlePlacesBundle:Places')
                ->getPlacesDetailsRef();
    }
    
    public function isPhoto($placeId){
        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                            ->checkForPhotos($placeId);
    }
    
    public function deletePlaceReviews($placeId){

        return $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                            ->deletePlceReviews($placeId);
    }
    
    public function getImageByPhotoRef($placeId, $imgUrl){

        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                            ->findOneBy(array('placeId' => $placeId, 'imgUrl' => $imgUrl));
    }
    
    public function getPlaceDetails($placeId){

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                            ->find($placeId);
    }
    
    public function getLastPlaceId(){

        return $this->em->getRepository('BundlePlacesBundle:Places')
                            ->getLastPlaceId();
    }
    
    public function getPlacesDetailsRefWithId($startId){
        
        return $this->em->getRepository('BundlePlacesBundle:Places')
                            ->getPlacesDetailsRefWithId($startId);
    }
    
    public function deletePlace($id){

        return $this->em->getRepository('BundlePlacesBundle:Places')
                            ->deletePlace($id);
    }
    
    public function getPlacesDetail($startId, $stopId){
        
        return $this->em->getRepository('BundlePlacesBundle:Places')
                            ->getPlacesDetail($startId, $stopId);
    }
    
    public function getTags($placeid){
        
        return $this->em->getRepository('BundlePlacesBundle:PlaceTags')
                            ->getTagName($placeid);
    }
    
    public function getPlaces(){
        
        return $this->em->getRepository('BundlePlacesBundle:Places')
                            ->findAll();
    }
    
    public function insertCategory($placeCat){
        $placeCat1 = $this->em->getRepository('BundlePlacesBundle:PlaceCategories')
                            ->findBy(array("placeId" => $placeCat->getPlaceId(), "categoryId" => $placeCat->getCategoryId()));
        if(!$placeCat1){
        $this->em->persist($placeCat);
        $this->em->flush();
        }else{
            //echo "exista";
        }
    }
    
    
    
}
