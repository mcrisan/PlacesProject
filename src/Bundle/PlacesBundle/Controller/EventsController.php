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

//use \DateTime;

class EventsController extends Controller {

    function editeventAction($id) {
        $request = Request::createFromGlobals();
        $eventProcess = $this->get('ownerplaces');
        $eventProcess->eventProcess($id,$request);
        $msg = "Success.";
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
        $request = Request::createFromGlobals();
        $image = $request->get('value');
        $uid = uniqid();
        $webPath = $this->get('kernel')->getRootDir().'/../web';
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        if (filter_var($image, FILTER_VALIDATE_URL) === FALSE) {
            die('Not a valid URL');
        }
        $tImage = $this->getDataFromUrl($image);
        if (getimagesize($image) !== false) {
            $imDets = getimagesize($image);
            $fs = new Filesystem();

            $fp = fopen($webPath.'\uploads\\' . $uid . '.jpg', 'w');
            fwrite($fp, $tImage);
            fclose($fp);
            $msg = $baseurl."/uploads/" . $uid . '.jpg';
        } else {
            $msg = 'Not a valid URL';
        }
        $resp = new Response($msg, 200);
        return $resp;
    }

}
