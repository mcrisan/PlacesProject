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

    public function __construct(SearchWebServiceDAO $dao, ContainerInterface $container) {
        $this->searchDAO = $dao;
        $this->container = $container;
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
        // echo "place details";
        //var_dump($placeDet);
        $placeInfo['place']['placeid'] = $placeDet[0]->getPlaceId();
        $placeInfo['place']['placename'] = $placeDet[0]->getPlaceName();
        $placeInfo['place']['placephonenumber'] = $placeDet[0]->getPlacePhonenumber();
        $placeInfo['place']['placevicinity'] = $placeDet[0]->getPlaceVicinity();
        $placeInfo['place']['placelat'] = $placeDet[0]->getPlaceLat();
        $placeInfo['place']['placelng'] = $placeDet[0]->getPlaceLng();
        $placeInfo['place']['placerating'] = $placeDet[0]->getPlaceRating();
        $placeInfo['place']['placeicon'] = $placeDet[0]->getPlaceIcon();
        $placeInfo['place']['placeurl'] = $placeDet[0]->getPlaceUrl();
        $placeInfo['place']['placeWebSite'] = $placeDet[0]->getPlaceWebsite();
        //var_dump($placeInfo['place']);
        $placeInfo['placePhotos'] = $this->searchDAO->getPlacePhotos($placeId, 1);
        $placeInfo['placeAllPhotos'] = $this->searchDAO->getPlacePhotos($placeId);


        $placeInfo['totalVotesForPlace'] = $this->searchDAO->getCurrentCounts($placeId);
        $placeInfo['totalVotesAllTime'] = $this->searchDAO->getTotalVotes();
        $placeInfo['total'] = $this->searchDAO->getCurrentVotes($placeId);
        $placeInfo['totalCounts'] = $this->searchDAO->getCurrentCounts($placeId);

        $placeInfo['userStatus'] = $this->searchDAO->getUserStatus($placeId, $this->getIp());

        return $placeInfo;
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
