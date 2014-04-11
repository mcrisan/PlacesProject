<?php

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Bundle\PlacesBundle\lib\GetUserIp;
use Bundle\PlacesBundle\lib\ClientBrowser;
use Bundle\PlacesBundle\Entity\UsersIp;
use Bundle\PlacesBundle\Entity\Rating;
use Bundle\PlacesBundle\Entity\Tags;
use Bundle\PlacesBundle\Entity\PlaceDetails;
use Bundle\PlacesBundle\Entity\AppUsers;
use Bundle\PlacesBundle\lib\UserIp;
use Bundle\PlacesBundle\Service\PlaceOperations;
use Bundle\PlacesBundle\Command\InsertAllDetailsCommand;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller {

    function editeventAction($id) {
        $request = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BundlePlacesBundle:PlaceEvents');
        $events = $repository->findOneBy(array('placeid' => $id));
        if (!$events) {
            $events = new \Bundle\PlacesBundle\Entities\PlaceEvents();
        }

        $events->setTitle($request->request->get('title'));
        $events->setDescription($request->request->get('body'));
        if ($request->request->get('picture') != '') {
            $events->setImage($request->request->get('picture'));
        }

        $events->setPlaceid($id);


        $validator = $this->container->get('validator');


        $errors = $validator->validate($events);
        $strerror = (string) $errors;
        if ($strerror) {
            $msg = "Error, image url!";
        } else {
            $em->persist($events);
            $em->flush();
            $msg = "Success.";
        }

        $resp = new \Symfony\Component\HttpFoundation\Response($msg, 200);
        return $resp;
    }

    public function getDataFromUrl($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function eventuploaduhotoAction() {
        $uid = uniqid();
        $request = Request::createFromGlobals();
        $image = $request->get('value');
        if (filter_var($image, FILTER_VALIDATE_URL) === FALSE) {
            die('Not a valid URL');
        }
        $tImage = $this->getDataFromUrl($image);
        if (getimagesize($image) !== false) {
            $imDets = getimagesize($image);
            $fs = new Filesystem();
            
            $fp = fopen('D:\git\PlacesProject\web\uploads\\' . $uid . '.jpg', 'w');
            fwrite($fp, $tImage);
            fclose($fp);
            
            $msg = 'http://localhost/PlacesProject/web/uploads/' . $uid . '.jpg';
        } else {
            $msg = 'Not a valid URL';
        }
         $resp = new Response($msg, 200);
         return $resp;
    }

}
