<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Description of ServiceController
 *
 * @author mcrisan
 */
class ServiceController extends Controller {

    //put your code here

    function searchByNameAction($name) {
       $name= urldecode($name);
       $search = $this->get('search');
       $res = $search->searchByName($name);
       $resp = new Response($res, 200);      
       $resp->headers->set('Content-Type', 'application/json');
       
       
       return $resp;
    }
    
    function searchByAddressAction($address) {
       $address= urldecode($address);
       $search = $this->get('search');
       $res = $search->searchByAddress($address);
       $resp = new Response($res, 200);      
       $resp->headers->set('Content-Type', 'application/json');
       
       
       return $resp;
    }
    
    function searchByTagAction($tag) {
       $tag= urldecode($tag);
       $search = $this->get('search');
       $res = $search->searchByTag($tag);
       $resp = new Response($res, 200);      
       $resp->headers->set('Content-Type', 'application/json');
       
       
       return $resp;
    }
    
    function searchByTagAndAddressAction($tag, $address) {
       $tag= urldecode($tag);
       $address= urldecode($address);
       $search = $this->get('search');
       $res = $search->searchByTagAndAddress($tag, $address);
       $resp = new Response($res, 200);      
       $resp->headers->set('Content-Type', 'application/json');
       
       
       return $resp;
    }
    
    function testServiceAction() {
        $name=urlencode("casa ardeleana");
        $url = "http://localhost/PlacesProject/web/app_dev.php/searchname/$name";
        //$url = "http://localhost/rest/web/app_dev.php/defaults.json";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        //var_dump($json);
        $res = $data['details']['placeInfos'];
        var_dump($res);
        echo $res['placeSlug'];
        var_dump($data['details']['places']);

    }

}