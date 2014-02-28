<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\ProjectBundle\Service;

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
    }
    
    public function checkCurrentSlug($slug){
        
        return $this->em->getRepository('BundleProjectBundle:Places')
                ->checkCurrentSlug($slug);
    }
    
    public function getLastSlug($slug){
        
        return $this->em->getRepository('BundleProjectBundle:Places') // last slug
                ->getLastSlug($slug);
    }
    
    public function checkCurrentExtId($extId){
        
        return $this->em->getRepository('BundleProjectBundle:Places')
                ->checkCurrentExtId($extId);
    }
    
    public function insertTag($tag){
        $this->em->persist($tag);
        $this->em->flush();
    }
    
    public function isTag($tagName){

        return $this->em->getRepository('BundleProjectBundle:Tags')
                ->isTag($tagName);
    }
    
    public function insertPlaceTag($placeTag){
        $this->em->persist($placeTag);
        $this->em->flush();
    }
    
    public function getAllTags(){

        return $this->em->getRepository('BundleProjectBundle:Tags')
                ->getAllTags();
    }
    
    public function deletePlaceTag($placeId){
        // delete all tags in tb. 'place_tags' for current place
        $delete = $this->em->getRepository('BundleProjectBundle:PlaceTags')
                ->deletePlaces($placeId);
        //var_dump($delete);
        //exit();

        if ($delete->execute()) {
            echo "Place name: Action: place deleted from place_tags tb. \r\n";
        }
    }
    
    public function insertPlaceDetails($placeDetails){
        
        echo $placeDetails->getPlaceId();
        var_dump($placeDetails);
        $this->em->persist($placeDetails);
        $this->em->flush();
    }
    
    public function isPlaceDetails($placeId){
        
        return $this->em->getRepository('BundleProjectBundle:PlaceDetails')
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
        return $this->em->getRepository('BundleProjectBundle:Places')->find($placeId);
    }
    
    public function getPlaceByExtId($extId){
        return $this->em->getRepository('BundleProjectBundle:Places')
                ->findOneBy(array("extId" => $extId));
    }
    
    public function getPlacesDetailsRef(){
        return $this->em->getRepository('BundleProjectBundle:Places')
                ->getPlacesDetailsRef();
    }
    
    public function isPhoto($placeId){
        return $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                            ->checkForPhotos($placeId);
    }
    
    public function deletePlaceReviews($placeId){

        return $this->em->getRepository('BundleProjectBundle:PlaceReviews')
                            ->deletePlceReviews($placeId);
    }
    
    public function getImageByPhotoRef($placeId, $imgUrl){

        return $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                            ->findOneBy(array('placeId' => $placeId, 'imgUrl' => $imgUrl));
    }
    
    public function getPlaceDetails($placeId){

        return $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                            ->find($placeId);
    }
    
}
