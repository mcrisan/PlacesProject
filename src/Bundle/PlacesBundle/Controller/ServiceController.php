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
use Symfony\Component\HttpFoundation\Request;

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
    
    function searchAction($input) {
       $input= urldecode($input);
       $search = $this->get('search');
       $res = $search->getPlacesByNameOrAddressOrTag($input);
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
    
    function autocomAction() {

        return $this->render("BundlePlacesBundle:Service:index.html.twig");

    }
    
    function doAutocomAction() {
        $session = $this->get('session');
        $search = $this->get('search');
        $em = $this->getDoctrine()->getManager();
        $request = Request::createFromGlobals();
        $input = $request->request->get('search');
        //$session->clear();
        //$input = $request->query->get('search');
        $session->set('search', $input);
        if($session->has($input)){
            //echo "in sesiune";
            $data = $session->get($input);
            //echo "exista";
            //var_dump($data);
            $placeName = $data['placeName'];
            $places = $data['places'];
        }else{
        //echo $input ."<br/>";
        $placeName = $em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getPlacesNames($input);
        //echo 23;
        //var_dump($placeName);
        //$b_name='<strong>'.$input.'</strong>';
        $add = $input.", Cluj-Napoca, Romania";
        //echo $add;
        $address = $add; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        //var_dump($output->results[0]);
        echo $latitude ."<br/>";
        echo $longitude."<br/>";
        if ($latitude == 46.777248 & $longitude = 23.5998899){
          //  echo "adresa nu e";
            $places ="";
        }else if(strlen($input)>3){
            $places = $search->getPlaces($latitude, $longitude);
            //$places ="";
        }else{
            $places ="";
        }
        $session->set($input, array('placeName' => $placeName, 'places' => $places));
        //echo "nu exista";
        }
        
        return $this->render("BundlePlacesBundle:Service:ind.html.twig", array('place' => $placeName, 'placesAdd' => $places));
    }

}
