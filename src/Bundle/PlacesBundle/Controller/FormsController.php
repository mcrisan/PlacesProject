<?php

// src/Bundle/ProjectBundle/Controller/FormsController.php

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Bundle\PlacesBundle\lib\UserIp;
use Bundle\PlacesBundle\lib\GetUserIp;

class FormsController extends Controller {

    private $em;

    function __construct() {
        
    }

    // Render place page
    public function renderPlaceAction($param) {
        $placeName = $this->gen_slug($param);
        $request = Request::createFromGlobals();
        $searchInputVal = $request->query->get('input');
        
        $formsop = $this->get('formsop');
        $formsop->checkPlaceBySlug($placeName, $searchInputVal);
        //$placeName = $this->$this->getRequest()->get('param');

        $this->em = $this->getDoctrine()->getManager();
        $placeDetails = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getPlaceDetailsBySlug($placeName);

        if (!$placeDetails) {
            return $this->render('BundlePlacesBundle:Error:error.html.twig');
            //throw $this->createNotFoundException('Error msg.');
        }
//        var_dump($placeDetails);
//        exit();
        $placeId = $placeDetails[0]['placeId'];
        //var_dump($place_id);
        //exit();
        $user = new GetUserIp();
        $currentIp = $user->get_user_ip();

        //place ratings value & status
        $userStatus = $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                ->getUserStatus($placeId, $currentIp);
        $totalVotesForPlace = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getCurrentCounts($placeId);
        $totalVotesAllTime = $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                ->getTotalVotes();
        $total = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getCurrentVotes($placeId);
        $totalCounts = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getCurrentCounts($placeId);
        $placePhotos = $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                ->getPlacePhotos($placeId, 1);

        //get all photos
        $placeAllPhotos = $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                ->getPlacePhotos($placeId);
        // reviews
        $getDefaultPlaceReviews = $this->em->getRepository('BundlePlacesBundle:Places')->find($placeId);


        $placeReviews = $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                ->getReviews($getDefaultPlaceReviews->getId());
//        var_dump($placeReviews);
//        exit();
        //if user voted
        //echo "si";
        if ($userStatus) {
            return $this->render('BundlePlacesBundle:Places:renderPlace.html.twig', array(
                        'placeDetails' => $placeDetails,
                        'placePhotos' => $placePhotos,
                        'placeAllPhotos' => $placeAllPhotos,
                        'ip' => $currentIp,
                        'totalVotesAllTime' => $totalVotesAllTime,
                        'totalVotes' => $totalVotesForPlace[0]['votesCount'],
                        'usersRating' => round(
                                $total[0]['totalVotes'] / $totalCounts[0]['votesCount'], 2),
                        'bool' => true,
                        'placeSlug' => $placeName,
                        'placeid' => $placeId,
                        'reviews' => $placeReviews
            ));
        }

        return $this->render('BundlePlacesBundle:Places:renderPlace.html.twig', array(
                    'placeDetails' => $placeDetails,
                    'placePhotos' => $placePhotos,
                    'placeAllPhotos' => $placeAllPhotos,
                    'ip' => $currentIp,
                    'placeSlug' => $placeName,
                    'placeid' => $placeId,
                    'reviews' => $placeReviews
        ));
    }

    // Get more places
    public function morePlacesRequestAction() {
        $notLike = $this->getRequest()->get('input');
        $arr = explode(',', $notLike);
        //echo "<pre>";
        //print_r($arr);echo "</pre>";
        //var_dump($notLike);//exit();
        //echo "$notLike";


        $this->em = $this->getDoctrine()->getManager();

        $places = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getMorePlaces($notLike);
//         $this->em->clear($places); 
        //exit();
//        $this->em->refresh($places); 
        //echo "<pre>";print_r($places);//exit();
        //echo "<pre>";print_r($places);exit();
        return $this->render('BundlePlacesBundle:Places:morePlaces.html.twig', array(
                    'places' => $places
        ));
    }

    // Votes for place
    function setVoteAction() {
        $this->em = $this->getDoctrine()->getManager();
        $placeId = $this->getRequest()->get('id');
        $voteValue = $this->getRequest()->get('rating');
        $params = $this->getRequest()->request->all();
        /*
          $param = explode(',', $vot);
          $voteValue = $param[0];
          $placeId = $param[1];
         */
        $userAddr = new GetUserIp();
        $userIp = $userAddr->get_user_ip();

        //get the rating before update
        $ratingBeforeUpdate = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getPlaceUserRating($placeId);
        if (empty($ratingBeforeUpdate)) { //if empty - insert new rating
            $insertRating = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->insertRating($placeId, $voteValue, $this->em);
        } else { //if !empty update current rating
            $currentCounts = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->getCurrentCounts($placeId);
            $currentVotes = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->getCurrentVotes($placeId);
            $updateRating = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                    ->updatePlaceRating($placeId, $voteValue, $currentVotes[0]['totalVotes'], $currentCounts[0]['votesCount'], 1);
        }
        $total = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getCurrentVotes($placeId);
        $totalCounts = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getCurrentCounts($placeId);

        //update vote status - place id and client ip so one user can vote only one time for a places
        $updateVoteStatus = $this->em->getRepository('BundlePlacesBundle:VoteStatus')
                ->insertVoteStatus($placeId, $userIp, $this->em);

        return $this->render('BundlePlacesBundle:Places:usersRating.html.twig', array(
                    'usersRating' => round(
                            $total[0]['totalVotes'] / $totalCounts[0]['votesCount'], 2),
                    'totalVotes' => $totalCounts[0]['votesCount']
        ));
    }

    // Votes for site
    function voteeAction() {
        $this->em = $this->getDoctrine()->getManager();
        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();

        $updateVoteFlag = $this->em->getRepository('BundlePlacesBundle:UsersIp')
                ->updateClient($currentIp);
        $vote = $this->getRequest()->get('vote');
        //get content of textfile
        $filename = "bundles/bundleplaces/txt/poll_result.txt";
        $content = file($filename);

        //put content in array
        $array = explode("||", $content[0]);
        $yes = $array[0];
        $ok = $array[1];
        $notReally = $array[2];
        $no = $array[3];
        $total = $array[4];
        //update voteField (yes,it's ok,not really,no)
        if ($vote == 0) {
            $yes = $yes + 1;
            $total = $total + 1;
        }
        if ($vote == 1) {
            $ok = $ok + 1;
            $total = $total + 1;
        }
        if ($vote == 2) {
            $notReally = $notReally + 1;
            $total = $total + 1;
        }
        if ($vote == 3) {
            $no = $no + 1;
            $total = $total + 1;
        }
        //insert votes to txt file
        $insertvote = $yes . "||" . $ok . "||" . $notReally . "||" . $no . "||" . $total;
        $fp = fopen($filename, "w");
        fputs($fp, $insertvote);
        fclose($fp);

        return $this->render('BundlePlacesBundle:Places:voteResult.html.twig', array(
                    'yes' => $yes,
                    'ok' => $ok,
                    'notReally' => $notReally,
                    'no' => $no,
                    'totalVotes' => $total
        ));
    }

    // Search by rating - out
    function searchAction() {
        //$request = $this->getRequest();
        $request = Request::createFromGlobals();
        if ($request->getMethod() == "POST") {
            $searchInput = $request->get('input');
            //$typeInput = $request->get('type');
            if (!empty($searchInput)) {
                if (is_numeric($searchInput) && $searchInput >= 1 && $searchInput <= 5) {
                    return $this->redirect($this->generateUrl('BundlePlacesBundle_places', array(
                                        'input' => $searchInput
                    )));
                } else if (is_string($searchInput)) {
                    return $this->redirect($this->generateUrl('BundlePlacesBundle_places', array(
                                        'input' => htmlentities($searchInput)
                    )));
                } else {
                    return $this->redirect($this->generateUrl('BundlePlacesBundle_places'));
                }
            } else {
                // if rating filed is not valid ..
                return $this->redirect($this->generateUrl('BundlePlacesBundle_places'));
            }
        } else {
            // if the request != post
            return $this->redirect($this->generateUrl('BundlePlacesBundle_places'));
        }
    }

    // Demo search
    public function demoSearchAction() {
        //$request = $this->getRequest();
        //var_dump($request);
        //echo "sunt";
        $request = Request::createFromGlobals();
        //var_dump($request);
        //echo "si";
        $this->em = $this->getDoctrine()->getManager();
        if ($request->getMethod() == "POST") {
            $searchInput = $request->get('input');
            if (!empty($searchInput)) {
                echo "a";
                return $this->redirect($this->generateUrl('index', array(
                                    'input' => $searchInput
                )));
            } else {
                return $this->redirect($this->generateUrl('index'));
            }
        } else {
            return $this->redirect($this->generateUrl('index'));
        }
    }

    function gen_slug($str) {
        # special accents
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $str)));
    }

   function doAutocomAction() {
       $session = $this->get('session');
       $formsop = $this->get('formsop');
       $em = $this->getDoctrine()->getManager();
       $request = Request::createFromGlobals();
       $input = $request->request->get('search');
       //$input = $request->query->get('search');
       $session->set('search', $input);
//        if (apc_exists($input)) {
//            $data = apc_fetch($input);
//            $placeName = $data['placeName'];
//            $places = $data['places'];
//        } else {
           $placeName = $formsop->getPlacesNames($input);
           //$places = $formsop->getPlaces2($input);
           $places ="";
        //   apc_store($input, array('placeName' => $placeName, 'places' => $places));
      // }

       return $this->render("BundlePlacesBundle:Places:autocomplete.html.twig", array('place' => $placeName, 'placesAdd' => $places));
   }
    
    function getPlacesNamesAction(){
        $formsop = $this->get('formsop');
        $placeName = $formsop->getAllPlacesNames();
        
        $res = json_encode($placeName);
        $resp = new Response($res, 200);      
       $resp->headers->set('Content-Type', 'application/json');
       
       
       return $resp;
    }
    
    function insertPlacesAction(){
        $request = Request::createFromGlobals();
        $input = $request->request->get('search');
        $address = $request->request->get('address');
        //$input = $request->query->get('search');
        $formsop = $this->get('formsop');
        $formsop->insertPlaces($input, $address);
        
        return $this->render("BundlePlacesBundle:About:about.html.twig");
    }
    
    function homepagePlacesAction(){
        $request = Request::createFromGlobals();
        $input = $request->request->get('search');
        //$input = $request->query->get('search');
        $formsop = $this->get('formsop');
        $formsop->insertHomepagePlaces($input);
        
        return $this->render("BundlePlacesBundle:About:about.html.twig");
    }
}

?>
