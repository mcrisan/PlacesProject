<?php

// src/Bundle/ProjectBundle/Controller/StoreController.php

namespace Bundle\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bundle\ProjectBundle\lib\GetUserIp;
use Bundle\ProjectBundle\Model\StoreModel;

/**
 * Store controller.
 */
class PlaceController extends Controller {

    // Places page - show all places
    function placesAction() {
        $em = $this->getDoctrine()->getManager();
        
        $firstId = $em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getFirstId();
        $places = $em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getPlacesDetails("",$limit = 3);
        $count = count($places);
        return $this->render('BundleProjectBundle:Places:infoPlaces.html.twig', array(
                    'places' => $places,
                    'placesCount' => $count,
                    'start' =>$firstId[0]['place_id'],
                    'limit' =>3
        ));
    }

    // Show place by id
    function showPlaceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $placeReviews = $em->getRepository('BundleProjectBundle:PlaceReviews')
                ->getReviewsById($id);
       
        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getPlaceById($id);
        
        $placeShow = $em->getRepository('BundleProjectBundle:Places')
                ->getPlacesById($id);
         $placePhotos = $em->getRepository('BundleProjectBundle:PlacePhotos')
                    ->getPlacePhotos($id, 1);    
        $placeToShow = $em->getRepository('BundleProjectBundle:Places')->find($id);
       
        if (!$placeToShow) {
            return $this->render('BundleProjectBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }
        $comments = $em->getRepository('BundleProjectBundle:Comment')
                ->getCommentsForPlace($placeToShow->getId());
        
         return $this->render('BundleProjectBundle:Places:show.html.twig',array(
           'places' => $place,
           'ip' => $currentIp,
             'comments' => $comments,
             'id' =>$id,
             'placeToShow' =>$placeShow,
             'placePhotos' =>$placePhotos
        ));
    }
}
