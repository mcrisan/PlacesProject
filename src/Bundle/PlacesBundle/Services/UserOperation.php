<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Services;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Description of User
 *
 * @author mcrisan
 */
class UserOperation {
    
    private $container;
    
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
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
            $info = $this->getUser();
            if (!empty($info)) {
                $userName = $info->getUsername();
                $userId = $info->getId();
            }
        }

        return array('currentIp' => $currentIp,
            'providerName' => $providerName,
            'userName' => $userName,
            'userId' => $userId,
            'socialLogged' => $socialLogged);
    }

    public function getIp() {
        @$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
        @$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
        @$remote_addr = $_SERVER['REMOTE_ADDR'];
        if (isset($http_client_ip) && !empty($http_client_ip)) {
            $ip_address = $http_client_ip;
        } else if (isset($http_x_forwarded_for) && !empty($http_x_forwarded_for)) {
            $ip_address = $http_client_ip;
        } else {
            $ip_address = $remote_addr;
        }

        return $ip_address;
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
