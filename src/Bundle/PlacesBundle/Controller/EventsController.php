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

    private $em;

    function __construct() {
        
    }
    
    
    function editeventAction($id) {
        //insert db 
        //upload file
        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('index', array(
                                    'input' => 'insomnia')));
    }
}