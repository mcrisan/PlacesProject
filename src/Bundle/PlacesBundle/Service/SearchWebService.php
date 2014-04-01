<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Entity\PlaceTags;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Bundle\PlacesBundle\lib\GetUserIp;
use Bundle\PlacesBundle\Command\InsertPlacesCommand;

/**
 * Description of SearchWebService
 *
 * @author mcrisan
 */
class SearchWebService {

    protected $searchDAO;
    protected $container;
    protected $formsOP;

    public function __construct(SearchWebServiceDAO $dao, ContainerInterface $container, FormsOperations $formsOP) {
        $this->searchDAO = $dao;
        $this->container = $container;
        $this->formsOP = $formsOP;
    }

    public function searchByName($name, $food, $drink) {
        //echo $name;

        $places1 = $this->searchDAO->getPlacesNamesAndIds($name);
        $distance = $this->container->getParameter('distance');
        $limit = $this->container->getParameter('limit');
        if (empty($places1)) {
            $name_enc = urlencode($name);
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $name_enc . '&sensor=false');
            $output = json_decode($geocode);
            if (isset($output->results[0])) {
                $latitude = $output->results[0]->geometry->location->lat;
                $longitude = $output->results[0]->geometry->location->lng;
                $coord = array("lat" => $latitude, "lng" => $longitude);
                apc_store($name, $coord);
                $places = $this->searchDAO->getPlacesByDistance($name, $food, $drink, $latitude, $longitude, $distance, $limit);
            }
        } else {
            $placeId = $places1[0]['placeId'];
            $placeInfo = $this->getPlaceInfos($placeId);
            $latitude = $placeInfo['place']['placelat'];
            $longitude = $placeInfo['place']['placelng'];
            $coord = array("lat" => $latitude, "lng" => $longitude);
            apc_store($name, $coord);
            $cat = $places1[0]['category'];
            if($food == "off" & $drink == "off"){
            if(strpos($cat, 'Food') !== FALSE){
                $food = "on";
            }
            if(strpos($cat, 'Drink') !== FALSE){
                $drink = "on";
            }
            }
            $places = $this->searchDAO->getPlacesByDistance($name, $food, $drink, $latitude, $longitude, $distance, $limit);
            
            //if ((("on" == $food) & (strpos($cat, 'Food') !== FALSE)) || (("on" == $drink) & (strpos($cat, 'Drink') !== FALSE))) {
                array_unshift($places, $places1[0]);
                array_pop($places);
            //}
        }
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $places = $this->searchDAO->getPlacesNamesAndIds("Restaurant Havana");
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        }
        return $resp;
    }

    public function homepagePlaces() {
        //echo $name;
        if (apc_exists("index")) {
            $places = apc_fetch("index");
            //var_dump($places);
        }

        if (!empty($places)) {
            $resp = json_encode(array(
                'places' => $places,
                'status' => 'OK'
            ));
        } else {
            $resp = json_encode(array(
                'status' => 'Places Not Found'
            ));
        }
        return $resp;
    }

    public function searchByAddress($address) {

        $places = $this->searchDAO->getPlacesNamesAndIdsByAddress($address);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        }
        return $resp;
    }

    public function searchByTag($tag) {

        $places = $this->searchDAO->getPlacesNamesAndIdsByTag($tag);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        }
        return $resp;
    }

    public function searchByTagAndAddress($tag, $address) {

        $places = $this->searchDAO->getPlacesNamesByTagAndAddress($tag, $address);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        }
        return $resp;
    }

    public function getPlacesByNameOrAddressOrTag($input) {

        $places = $this->searchDAO->getPlacesByNameOrAddressOrTag($input);
        if (!empty($places)) {
            $placeId = $places[0]['placeId']; // #1 place from search results..
            $placeInfo = $this->getPlaceInfos($placeId);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
            ));
        } else {
            $placeInfo = $this->getPlaceInfos(1595);
            $userInfo = $this->getUserDetails();
            $resp = json_encode(array(
                'details' => array(
                    'placeInfos' => $placeInfo,
                    'places' => $places,
                    'userInfos' => $userInfo),
                'status' => 'OK'
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
        
        $placeInfo['place']['placeid'] = $placeDet[0]->getPlaceId();
        $placeInfo['place']['hasowner'] = $placeDet[0]->getPlace()->getHasOwner();
        $placeInfo['place']['placename'] = $placeDet[0]->getPlaceName();
        $placeInfo['place']['placephonenumber'] = $placeDet[0]->getPlacePhonenumber();
        $placeInfo['place']['placevicinity'] = $placeDet[0]->getPlaceVicinity();
        $placeInfo['place']['placelat'] = $placeDet[0]->getPlaceLat();
        $placeInfo['place']['placelng'] = $placeDet[0]->getPlaceLng();
        $placeInfo['place']['placerating'] = $placeDet[0]->getPlaceRating();
        $placeInfo['place']['placeicon'] = $placeDet[0]->getPlaceIcon();
        $placeInfo['place']['placeurl'] = $placeDet[0]->getPlaceUrl();
        $placeInfo['place']['placeWebSite'] = $placeDet[0]->getPlaceWebsite();
        $placeInfo['placePhotos'] = $this->searchDAO->getPlacePhotos($placeId, 1);
        $placeInfo['placeAllPhotos'] = $this->searchDAO->getPlacePhotos($placeId);


        $placeInfo['totalVotesForPlace'] = $this->searchDAO->getCurrentCounts($placeId);
        $placeInfo['totalVotesAllTime'] = $this->searchDAO->getTotalVotes();
        $placeInfo['total'] = $this->searchDAO->getCurrentVotes($placeId);
        $placeInfo['totalCounts'] = $this->searchDAO->getCurrentCounts($placeId);

        $placeInfo['userStatus'] = $this->searchDAO->getUserStatus($placeId, $this->getIp());

        return $placeInfo;
    }
    
    public function getPlaceInfosBySlug($slug) {

        $placeId = $this->searchDAO->getPlacesIdBySlug($slug);
        //var_dump($placeId);
        $id = $placeId[0]['id'];
        $details = $this ->getPlaceInfos($placeId);
        $userInfo = $this->getUserDetails();     
        //var_dump($details);
        return array("details" => $details, "userInfo" => $userInfo );
    }

    public function getUserDetails() {
        $currentIp = $this->getIp();

        $providerName = "";
        $userName = "";
        $userId = "";
        $socialLogged = false;

        $userInfoFromSession = $this->getUserInfo();
        if (!empty($userInfoFromSession)) {
            $providerName = $userInfoFromSession['providerName'];
            $userIdentifier = $userInfoFromSession['userIdentifier'];
            $userName = $userInfoFromSession['userName'];
            $userId = 1010;
            $socialLogged = true;
        } else {
            // check if current user is logged and get info
            $info = $this->getUser();
            if (!empty($info)) {
                $userName = $info->getUsername();
                $userId = $info->getId();
                //exit();
            }
        }

        return array('currentIp' => $currentIp,
            'providerName' => $providerName,
            'userName' => $userName,
            'userId' => $userId,
            'socialLogged' => $socialLogged);
    }

    public function getIp() {
        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        return $currentIp;
    }

    public function getUserInfo() {
        $session = $this->container->get('session');
        if ($session->get('providerName')) {
            return array(
                'providerName' => $session->get('providerName'),
                'userIdentifier' => $session->get('identifier'),
                'userName' => $session->get('userName'),
                'userEmail' => $session->get('userEmail')
            );
        }
        return null;
    }

    public function getUser() {
        if (!$this->container->has('security.context')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }
        if (null === $token = $this->container->get('security.context')->getToken()) {
            return null;
        }
        if (!is_object($user = $token->getUser())) {
            return false;
        }
        return $user;
    }

}
