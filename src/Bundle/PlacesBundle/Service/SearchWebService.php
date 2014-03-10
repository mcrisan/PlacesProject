<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Entity\PlaceTags;
use Symfony\Bridge\Monolog\Logger;

/**
 * Description of SearchWebService
 *
 * @author mcrisan
 */
class SearchWebService {

    protected $searchDAO;

    public function __construct(SearchWebServiceDAO $dao) {
        $this->searchDAO = $dao;
    }

    public function searchByName($name) {

        $places = $this->searchDAO->getPlacesNamesAndIds($name);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places),
                'status' => 'OK'
            ));
        } else {
            $resp = json_encode(array(
                'status' => 'Place Not Found'
            ));
        }
        return $resp;
    }

    public function searchByAddress($address) {

        $places = $this->searchDAO->getPlacesNamesAndIdsByAddress($address);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places),
                'status' => 'OK'
            ));
        } else {
            $resp = json_encode(array(
                'status' => 'Place Not Found'
            ));
        }
        return $resp;
    }

    public function searchByTag($tag) {

        $places = $this->searchDAO->getPlacesNamesAndIdsByTag($tag);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places),
                'status' => 'OK'
            ));
        } else {
            $resp = json_encode(array(
                'status' => 'Place Not Found'
            ));
        }
        return $resp;
    }
    
    public function searchByTagAndAddress($tag, $address) {

        $places = $this->searchDAO->getPlacesNamesByTagAndAddress($tag, $address);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places),
                'status' => 'OK'
            ));
        } else {
            $resp = json_encode(array(
                'status' => 'Place Not Found'
            ));
        }
        return $resp;
    }

    public function getPlaceInfos($placeId) {

        $placeInfo = array();
        $getPlaceSlug = $this->searchDAO->getPlacesSlug($placeId);
        $placeInfo['placeSlug'] = $getPlaceSlug[0]['slug'];
        $placeInfo['placeReviews'] = $this->searchDAO->getDefaultPlaceReviews($placeId);
        $placeDet = $this->searchDAO->getPlacesDetails($placeId);
        // echo "place details";
        //var_dump($placeDet);
        $placeInfo['place']['placeId'] = $placeDet[0]->getPlaceId();
        $placeInfo['place']['placeName'] = $placeDet[0]->getPlaceName();
        $placeInfo['place']['placePhonenumber'] = $placeDet[0]->getPlacePhonenumber();
        $placeInfo['place']['placeVicinity'] = $placeDet[0]->getPlaceVicinity();
        $placeInfo['place']['placeLat'] = $placeDet[0]->getPlaceLat();
        $placeInfo['place']['placeLng'] = $placeDet[0]->getPlaceLng();
        $placeInfo['place']['placeRating'] = $placeDet[0]->getPlaceRating();
        $placeInfo['place']['placeIcon'] = $placeDet[0]->getPlaceIcon();
        $placeInfo['place']['placeUrl'] = $placeDet[0]->getPlaceUrl();
        $placeInfo['place']['placeWebsite'] = $placeDet[0]->getPlaceWebsite();
        //var_dump($placeInfo['place']);
        $placeInfo['placePhotos'] = $this->searchDAO->getPlacePhotos($placeId, 1);
        $placeInfo['placeAllPhotos'] = $this->searchDAO->getPlacePhotos($placeId);
        $placeInfo['userStatus'] = $this->searchDAO->getPlacePhotos($placeId);


        $placeInfo['totalVotesForPlace'] = $this->searchDAO->getCurrentCounts($placeId);
        $placeInfo['totalVotesAllTime'] = $this->searchDAO->getTotalVotes();
        $placeInfo['total'] = $this->searchDAO->getCurrentVotes($placeId);

        return $placeInfo;
    }

}
