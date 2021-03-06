<?php

// src/Bundle/ProjectBundle/Controller/FormsController.php

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class FormsController extends Controller {

    private $em;

    function __construct() {
        
    }
  
    protected function getRequestJson()
    {
        $params = null;
        $content = $this->get("request")->getContent();
        if (!empty($content))
        {
            $params = json_decode($content, true);
        }
        return $params;
    }
    // Get more places
    public function morePlacesRequestAction() {
        $request = Request::createFromGlobals();
        $params = $this->getRequestJson();
        $manager = $this->getDoctrine()->getManager();
        $page=$params['pag'];
        $name=$params['searchval'];
        $limit = $this->container->getParameter('limit');
        $distance = $this->container->getParameter('distance');
        $session = $this->get('session');
        if ($session->has("cat")) {
            $cat = $session->get("cat");
            $food = $cat['food'];
            $drink = $cat['drink'];
        } else {
            $food = "";
            $drink = "";
        } 
        $cache = $this->get('cache');
        $cache->setNamespace("search.coord");
        if ($cache->contains($name)) {
            $coord = $cache->fetch($name);
            $lat = $coord['lat'];
            $lng = $coord['lng'];
        } else {
            $lat = 0;
            $lng = 0;
        }
        $criteria = $this->get('criteria');
        $criteria->setCategory(array("food" => $food, "drink" => $drink));
        $criteria->setName($name);
        $criteria->setPage($page);
        $criteria->setResultsLimit($limit);
        $criteria->setDistance($distance);
        $criteria->setLat($lat);
        $criteria->setLng($lng);
        $placesdao = $this->get('placesDAO');
        $places = $placesdao->getPlacesByDistance($criteria);
        $this->em = $this->getDoctrine()->getManager();
        $nrplaces = count($places);
        return $this->render('BundlePlacesBundle:Places:morePlaces.html.twig', array(
                    'places' => $places,
                    'nrplaces' => $nrplaces,
                    'pag' => $page
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

        $userop = $this->get("userop");
        $userIp = $userop->getIp();

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
        $userop = $this->get("userop");
        $currentIp = $userop->getIp();

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

        $request = Request::createFromGlobals();
        $this->em = $this->getDoctrine()->getManager();
        if ($request->getMethod() == "POST") {
            $searchInput = $request->get('input');
            $drink_check = $request->request->get('drink-checkbox');
            $food_check = $request->request->get('food-checkbox');
            $cat = array("food" => $food_check, "drink" => $drink_check);
            $session = $this->get('session');
            $session->set("cat", $cat);
            if (!empty($searchInput)) {
                // echo "a";
                return $this->redirect($this->generateUrl('index', array(
                                    'input' => $searchInput,
                                    'food' => $food_check,
                                    'drink' => $drink_check
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

    function getPlacesNamesAction() {
        $placeop = $this->get('placeOperation');
        $placeName = $placeop->getAllPlacesNames();

        $res = json_encode($placeName);
        $resp = new Response($res, 200);
        $resp->headers->set('Content-Type', 'application/json');


        return $resp;
    }

    public function renderPlaceAction($param) {
        
        $placeSlug = $this->gen_slug($param);
        $slug = urlencode($placeSlug);      
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $userid = $this->get('security.context')->getToken()->getUser()->getId();                   
            //search action
        }else{
            $userid = 'null';
        }
        $session = $this->get('session');
        $session->set('aux', false);
       
        $userid = $this->getAuthUser(); //get leged usrt id
        $placeop = $this->get("placeOperation");
        $info = $placeop->getPlaceInfosBySlug($slug);
        $placeInfo = $info['details'];
        $userInfo = $info['userInfo'];
               
        if ($placeInfo['userStatus']) {
            $userVoted = true;
        } else {
            $userVoted = false;
        }

        if ($placeInfo['place']['hasowner'] === $userid && $placeInfo['place']['hasowner'] != 0) {
            $isowner = '1';
        } else {
            $isowner = '0';
        }
        $events = $placeInfo['events'] ;
        $placeDto = $this->get("placeDto");
        $placeDto->setPlaceDetails($placeInfo['place']);
        $placeDto->setFirstPhoto($placeInfo['placePhotos']);
        $placeDto->setPlaceAllPhotos($placeInfo['placeAllPhotos']);
        $placeDto->setUserIp($userInfo['currentIp']);
        $placeDto->setPlaceSlug($placeInfo['placeSlug']);
        $placeDto->setPlaceId($placeInfo['place']['placeid']);
        $placeDto->setReviews($placeInfo['placeReviews']);
        $placeDto->setTotalVotesAllPlaces($placeInfo['totalVotesAllTime']);
        $rate = round($placeInfo['total'][0]['totalVotes'] / $placeInfo['totalCounts'][0]['votesCount'], 2);
        $placeDto->setUsersRating($rate);
        $placeDto->setTotalVotesForPlace($placeInfo['totalVotesForPlace'][0]['votesCount']);
        $placeDto->setUserVoted($userVoted);


        return $this->render('BundlePlacesBundle:Page:renderPlaceDetails.html.twig', array(
            'place'     => $placeDto, 
            'isowner'   => $isowner, 
            'events'    => $events
        ));
    }
    
    public function getAuthUser() {
        if (!is_null($this->get('security.context')->getToken()) && $this->get('security.context')->getToken()->getUser() != 'anon.') {
            return $this->get('security.context')->getToken()->getUser()->getId();
        } else {
            return 0;
        }
//        $userid_s = $this->get('security.context')->getToken()->getUser();
//        echo "<pre>";
//        print_r($userid_s->getUser());
//        die;
//            if($userid_s->getUser()!='anon.'){
//            $userid = $this->get('security.context')->getToken()->getUser()->getId();
//            }else{
//             $userid = 0;   
//            }
    }

}

?>
