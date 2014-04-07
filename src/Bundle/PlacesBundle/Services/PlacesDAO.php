<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Services;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ApcCache;

/**
 * Description of PlacesDAO
 *
 * @author mcrisan
 */
class PlacesDAO {

    protected $em;
    protected $cache;
    
    public function __construct(EntityManager $em, ApcCache $cache) {
        $this->em = $em;
        $this->cache = $cache;
    }

    public function test2($p) {
        echo $p;
    }

    public function insertPlace($place) {
        $this->em->persist($place);
        $this->em->flush();
        return $place;
    }

    public function checkCurrentSlug($slug) {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->checkCurrentSlug($slug);
    }

    public function checkPlaceDetailsByNameAndAddress($name, $address) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->checkPlaceDetailsByNameAndAddress($name, $address);
    }

    public function getLastSlug($slug) {

        return $this->em->getRepository('BundlePlacesBundle:Places') // last slug
                        ->getLastSlug($slug);
    }

    public function checkCurrentExtId($extId) {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->checkCurrentExtId($extId);
    }

    public function insertTag($tag) {
        $this->em->persist($tag);
        $this->em->flush();
    }

    public function isTag($tagName) {

        return $this->em->getRepository('BundlePlacesBundle:Tags')
                        ->isTag($tagName);
    }

    public function insertPlaceTag($placeTag) {
        $this->em->persist($placeTag);
        $this->em->flush();
    }

    public function getAllTags() {

        return $this->em->getRepository('BundlePlacesBundle:Tags')
                        ->getAllTags();
    }

    public function deletePlaceTag($placeId) {

        $delete = $this->em->getRepository('BundlePlacesBundle:PlaceTags')
                ->deletePlaces($placeId);
        $delete->execute();
    }

    public function insertPlaceDetails($placeDetails) {

        $this->em->persist($placeDetails);
        $this->em->flush();
    }

    public function isPlaceDetails($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->checkPlaceDetails($placeId);
    }

    public function insertPlacePhotos($placePhotos) {

        $this->em->persist($placePhotos);
        $this->em->flush();
    }

    public function insertPlaceReview($placeReview) {

        $this->em->persist($placeReview);
        $this->em->flush();
    }

    public function getPlace($placeId) {
        return $this->em->getRepository('BundlePlacesBundle:Places')->find($placeId);
    }

    public function getPlaceByExtId($extId) {
        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->findOneBy(array("extId" => $extId));
    }

    public function getPlacesDetailsRef() {
        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->getPlacesDetailsRef();
    }

    public function isPhoto($placeId) {
        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                        ->checkForPhotos($placeId);
    }

    public function deletePlaceReviews($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                        ->deletePlceReviews($placeId);
    }

    public function getImageByPhotoRef($placeId, $imgUrl) {

        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                        ->findOneBy(array('placeId' => $placeId, 'imgUrl' => $imgUrl));
    }

    public function getPlaceDetails($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->find($placeId);
    }

    public function getLastPlaceId() {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->getLastPlaceId();
    }

    public function getPlacesDetailsRefWithId($startId) {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->getPlacesDetailsRefWithId($startId);
    }

    public function deletePlace($id) {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->deletePlace($id);
    }

    public function getPlacesDetail($startId, $stopId) {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->getPlacesDetail($startId, $stopId);
    }

    public function getTags($placeid) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceTags')
                        ->getTagName($placeid);
    }

    public function getPlaces() {

        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->findAll();
    }

    public function insertCategory($placeCat) {
        $placeCat1 = $this->em->getRepository('BundlePlacesBundle:PlaceCategories')
                ->findBy(array("placeId" => $placeCat->getPlaceId(), "categoryId" => $placeCat->getCategoryId()));
        if (!$placeCat1) {
            $this->em->persist($placeCat);
            $this->em->flush();
        }
    }

    public function getPlacesNames($input) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->getPlacesNames($input);
    }

    public function getAllPlacesNames() {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->getAllPlacesNames();
    }

    public function getPlacesNamesAndIds($name) {
        
        $key = \md5($name);
        $this->cache->setNamespace("search.name");
        if ($this->cache->contains($key)) {
            return $this->cache->fetch($key);
        } else {
            $data = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesAndIds($name);
            $this->cache->save($key, $data);
            return $data;
        }
    }

    public function getPlacesByDistance($criteria) {
        $key = \md5($criteria->toString());
        $this->cache->setNamespace("search.criteria");
        if ($this->cache->contains($key)) {
            return $this->cache->fetch($key);
        } else {
            $data = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesByDistance($criteria);
            $this->cache->save($key, $data);
            return $data;
        }
    }

    public function getPlacesSlug($id) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->getPlacesSlug($id);
    }

    public function getPlaceReviews($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                        ->getReviews($placeId);
    }

    public function getPlacesDetails($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                        ->getPlacesDetails($placeId, 1);
    }
    public function getEvents($placesId) {
        $events = $this->em->getRepository('BundlePlacesBundle:PlaceEvents')
                ->findOneBy(array('placeid'=>$placesId));
        return $events;
    }
    public function getPlacePhotos($placeId, $nr = null) {

        return $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                        ->getPlacePhotos($placeId, $nr);
    }

    public function getUserStatus($placeId, $currentIp) {

        return $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                        ->getUserStatus($placeId, $currentIp);
    }

    public function getCurrentCounts($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                        ->getCurrentCounts($placeId);
    }

    public function getTotalVotes() {

        return $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                        ->getTotalVotes();
    }

    public function getCurrentVotes($placeId) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                        ->getCurrentVotes($placeId);
    }

    public function getPlacesIdBySlug($slug) {
        return $this->em->getRepository('BundlePlacesBundle:Places')
                        ->getPlaceIdBySlug($slug);
    }

}
