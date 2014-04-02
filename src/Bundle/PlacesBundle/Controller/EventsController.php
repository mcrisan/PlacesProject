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
        
        echo "<pre>";
        print_r($request->request->all());
        die;
        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('index', array(
                                    'input' => 'insomnia')));
    }
}