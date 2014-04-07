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
        $events->setImage($request->request->get('picture'));
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

    public function eventuploaduhoto($url) {
        $request = Request::createFromGlobals();
        var_dump($request);
        $saveto = '';//?
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $raw = curl_exec($ch);
        curl_close($ch);
        if (file_exists($saveto)) {
            unlink($saveto);
        }
        $fp = fopen($saveto, 'x');
        fwrite($fp, $raw);
        fclose($fp);
    }

}
