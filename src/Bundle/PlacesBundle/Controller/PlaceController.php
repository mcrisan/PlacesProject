<?php

// src/Bundle/ProjectBundle/Controller/StoreController.php

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bundle\PlacesBundle\lib\GetUserIp;
use Bundle\PlacesBundle\Model\StoreModel;

/**
 * Store controller.
 */
class PlaceController extends Controller {

    // Places page - show all places
    function placesAction() {
        $em = $this->getDoctrine()->getManager();
        
        $firstId = $em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getFirstId();
        $places = $em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getPlacesDetails("",$limit = 3);
        $count = count($places);
        return $this->render('BundlePlacesBundle:Places:infoPlaces.html.twig', array(
                    'places' => $places,
                    'placesCount' => $count,
                    'start' =>$firstId[0]['place_id'],
                    'limit' =>3
        ));
    }

    // Show place by id
    function showPlaceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $placeReviews = $em->getRepository('BundlePlacesBundle:PlaceReviews')
                ->getReviewsById($id);
       
        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getPlaceById($id);
        
        $placeShow = $em->getRepository('BundlePlacesBundle:Places')
                ->getPlacesById($id);
         $placePhotos = $em->getRepository('BundlePlacesBundle:PlacePhotos')
                    ->getPlacePhotos($id, 1);    
        $placeToShow = $em->getRepository('BundlePlacesBundle:Places')->find($id);
       
        if (!$placeToShow) {
            return $this->render('BundlePlacesBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }
        $comments = $em->getRepository('BundlePlacesBundle:Comment')
                ->getCommentsForPlace($placeToShow->getId());
        
         return $this->render('BundlePlacesBundle:Places:show.html.twig',array(
           'places' => $place,
           'ip' => $currentIp,
             'comments' => $comments,
             'id' =>$id,
             'placeToShow' =>$placeShow,
             'placePhotos' =>$placePhotos
        ));
    }
}
