<?php

// src/Bundle/PlacesBundle/Controller/PageController

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bundle\PlacesBundle\Command\InsertPlaceAllInOneCommand;
use Symfony\Component\HttpFoundation\Response;
use Bundle\PlacesBundle\Entities\Ownership;

class PageController extends Controller {

    private $em;
    private $ip;

    function __construct() {
        
    }

    // Preload method - insert/update in/the users_ip table and redirect to homePage
    function preLoadAction() {

        //$url = "http://localhost/PlacesProject/web/app_dev.php/homeplace";
        //$json = file_get_contents($url);
        //$data = json_decode($json, TRUE);
        //var_dump($data);
//        $url = "http://localhost/PlacesProject/web/app_dev.php/homeplace";
//        $json = file_get_contents($url);
//        $data = json_decode($json, TRUE);
//        $places = array();
//        if(array_key_exists('places', $data)){
//            $places = $data['places'];
//        }        
        
        
       $articles = $this->getDoctrine()
                  ->getRepository("BundlePlacesBundle:PlaceEvents")
                  ->findEvents();
        $places = "";


        return $this->render("BundlePlacesBundle:Page:home.html.twig", array(
                    "places" => $places, "events"=> $articles
                        )
        );

        //return $this->redirect($this->generateUrl('index'));
    }
    
    function eventsDetailsAction() {
              
       $articles = $this->getDoctrine()
                  ->getRepository("BundlePlacesBundle:PlaceEvents")
                  ->findEvents();
        $res = json_encode($articles);
        $resp = new Response($res, 200);
        $resp->headers->set('Content-Type', 'application/json');


        return $resp;       
    }

    // About page
    function aboutAction() {
        $this->em = $this->getDoctrine()->getManager();

        $placeop = $this->get("userop");
        $currentIp = $placeop->getIp();

        $providerName = "";
        $userName = "";
        $userId = "";
        $socialLogged = false;

        $userInfoFromSession = $this->getUserInfo();
        if (!empty($userInfoFromSession)) {
            $providerName = $userInfoFromSession['providerName'];
            $userIdentifier = $userInfoFromSession['userIdentifier'];
            $userName = $userInfoFromSession['userName'];
            $userId = 1010;
            $socialLogged = true;
        } else {
            // check if current user is logged and get info
            $info = $this->getUser();

            if (!empty($info)) {
                $userName = $info->getTxtLogin();
                $userId = $info->getId();
                //exit();
            }
        }

        // check if the user already voted
        $isUser = $this->em->getRepository('BundlePlacesBundle:UsersIp')
                ->isUser($currentIp); // return true or false
        // get the vote results
        //get content of poll_result.txt
        $filename = "bundles/bundleplaces/txt/poll_result.txt";
        $content = file($filename);

        //put content in array
        $array = explode("||", $content[0]);
        $yes = $array[0];
        $ok = $array[1];
        $notReally = $array[2];
        $no = $array[3];
        $total = $array[4];

        //if the user already voted
        if ($isUser) {
            return $this->render("BundlePlacesBundle:About:about.html.twig", array(
                        'bool' => true,
                        'yes' => $yes,
                        'ok' => $ok,
                        'notReally' => $notReally,
                        'no' => $no,
                        'totalVotes' => $total,
                        'userId' => $userId,
                        'userName' => $userName,
                        'socialLogged' => $socialLogged,
                        'providerName' => $providerName
            ));
        }

        return $this->render("BundlePlacesBundle:About:about.html.twig");
    }

   

    public function indexAction() {
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $userid = $this->getAuthUser();
            $ownerPlaces = $this->get('ownerplaces');
            $placeO = $ownerPlaces->getPlaceForUser($userid);
            if ($placeO) {
                $placesList = $placeO;
            } else {
                $placesList = '';
            }

            //search action
        } else {
            $userid = 'null';
            $placesList = '';
        }

        
        $session = $this->get('session');
        $this->em = $this->getDoctrine()->getManager();
        $request = Request::createFromGlobals();
        $searchInputVal = $request->query->get('input');
        $slug = $request->query->get('slug');
        $aux = false;
        
        if($slug){
           
        $place = $this->em->getRepository('BundlePlacesBundle:Places')->getPlaceName($slug);//findOneBy(array("placeId" => $placeid));
        $searchInputVal = $place[0]['placeName'];
        $session->set('aux', true);
    
        }
        $food = $request->query->get('food');
        $drink = $request->query->get('drink');
        $criteria = $this->get('criteria');
        $criteria->setCategory(array("food" => $food, "drink" => $drink));
        $criteria->setName($searchInputVal);
        $placeop = $this->get("placeOperation");
        $json = $placeop->searchByName($criteria);
        $data = json_decode($json, TRUE);
        $places = $data['details']['places'];
        $totalResults = count($places);
        $placeInfo = $data['details']['placeInfos'];
        $userInfo = $data['details']['userInfos'];

// verify if the use is the owner of the place
        if ($data['details']['placeInfos']['place']['hasowner'] === $userid) {
            $isowner = '1';
        } else {
            $isowner = '0';
        }

        if ($placeInfo['userStatus']) {
            $userVoted = true;
        } else {
            $userVoted = false;
        }

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
        
        //if ($placeInfo['userStatus']) { // if user voted for current store                
        return $this->render('BundlePlacesBundle:Page:details.html.twig', array(
                    'input' => $searchInputVal,
                    'places' => $places,
                    'place' => $placeDto,
                    'totalResults' => $totalResults,
                    'userId' => $userInfo['userId'],
                    'userName' => $userInfo['userName'],
                    'socialLogged' => $userInfo['socialLogged'],
                    'providerName' => $userInfo['providerName'],
                    'isowner' => $isowner,
                    'events' => $placeInfo['events'],
                    'placesList' => $placesList
        ));
        //}
//        return $this->render('BundlePlacesBundle:Page:details.html.twig', array(
//                    'input' => $searchInputVal,
//                    //'place' => $places,
//                    'places' => $places,
//                    'place' => $placeDto,
//                    'userId' => $userInfo['userId'],
//                    'userName' => $userInfo['userName'],
//                    'socialLogged' => $userInfo['socialLogged'],
//                    //   'socialLogged' => $userDet['socialLogged'],
//                    'isowner' => $isowner,
//                    'events' => $placeInfo['events'],
//                    'placesList' => $placesList 
//        ));
    }

// index
    // Demo showPlace
    public function indexShowPlaceAction($name) {
        $placeName = $name;

        $providerName = "";
        $userName = "";
        $userId = "";
        $socialLogged = false;

        $userInfoFromSession = $this->getUserInfo();
        if (!empty($userInfoFromSession)) {
            $providerName = $userInfoFromSession['providerName'];
            $userIdentifier = $userInfoFromSession['userIdentifier'];
            $userName = $userInfoFromSession['userName'];
            $userId = 1010;
            $socialLogged = true;
        } else {
            // check if current user is logged and get info
            $info = $this->getUser();

            if (!empty($info)) {
                $userName = $info->getTxtLogin();
                $userId = $info->getId();
                //exit();
            }
        }
        //exit();
        $this->em = $this->getDoctrine()->getManager();

        $namesArray = $this->em->getRepository('BundlePlacesBundle:Places')
                ->getAllNames();

        $randomName = $this->gen_random($namesArray);
        $randomSlug = $randomName['slug'];

        //$placeDetails = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
        //->getPlaceDetailsByName($placeName);
        $getPaceDetails = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                ->getPlaceDetailsBySlug($placeName);

        if (!$getPaceDetails) {
            return $this->render('BundlePlacesBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }

        $placeId = $getPaceDetails[0]['placeId'];
        $placeN = $getPaceDetails[0]['placeName'];
        $placeAddr = $getPaceDetails[0]['placeVicinity'];

        // reviews
        $getReviews = $this->em->getRepository('BundlePlacesBundle:Places')->find($placeId);

        $reviews = $this->em->getRepository('BundlePlacesBundle:PlaceReviews')
                ->getReviews($getReviews->getId());
//        var_dump($reviews);
//        exit();
        // photos
        $placePhoto = $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                ->getPlacePhotos($placeId, 1);

        // get all photos
        $placeAllPhotos = $this->em->getRepository('BundlePlacesBundle:PlacePhotos')
                ->getPlacePhotos($placeId);
//        var_dump($placeAllPhotos);
//        exit();
        // comm
        $placeShow = $this->em->getRepository('BundlePlacesBundle:Places')
                ->getPlacesById($placeId);
        $placeToShow = $this->em->getRepository('BundlePlacesBundle:Places')->find($placeId);


        if (!$placeToShow) {
            return $this->render('BundlePlacesBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }
        $comments = $this->em->getRepository('BundlePlacesBundle:Comment')
                ->getCommentsForPlace($placeToShow->getId());
//        exit();
//        var_dump($getPaceDetails);
//        exit();

        return $this->render('BundlePlacesBundle:Page:indexShowPlace.html.twig', array(
                    'name' => $placeN,
                    'slug' => $placeName,
                    'id' => $placeId,
                    'comments' => $comments,
                    'placeToShow' => $placeShow,
                    'placePhoto' => $placePhoto,
                    'placeAllPhotos' => $placeAllPhotos,
                    'reviews' => $reviews,
                    'randomPlace' => $randomSlug,
                    'placeAddress' => $placeAddr,
                    'userId' => $userId,
                    'userName' => $userName,
                    'socialLogged' => $socialLogged
        ));
    }

    // Place details
    public function placeDetailsAction($name) {
        return $this->render('BundlePlacesBundle:Page:placeDetails.html.twig', array(
                    'slug' => $name
        ));
    }

    // Use libs
    // generate slug
    protected function gen_slug($str) {
        # special accents
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $str)));
    }

    protected function gen_random($array) {
        $randomIndex = array_rand($array);
        return $randomValue = $array[$randomIndex];
    }

    // Get userInfo from auth session - sym2 login
    public function getUser() {
        if (!$this->container->has('security.context')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->container->get('security.context')->getToken()) {
            return null;
        }

        if (!is_object($user = $token->getUser())) {
            return false;
        }

        return $user;
    }

    // Get userInfo from auth session - social login
    public function getUserInfo() {
        //$session = new Session();
        $session = $this->get('session');

        if ($session->get('providerName')) {
            return array(
                'providerName' => $session->get('providerName'),
                'userIdentifier' => $session->get('identifier'),
                'userName' => $session->get('userName'),
                'userEmail' => $session->get('userEmail')
            );
        }
        return null;
    }

    function testAction() {
        $this->em = $this->getDoctrine()->getManager();
        $placedet = $this->em->getRepository('BundlePlacesBundle:PlaceEvents')->find(3);
        //$placedet->setPlaceRating("132rweafrgsegsrggwe");
        //var_dump($placedet);
        $validator = $this->container->get('validator');
        $errors = $validator->validate($placedet);
        $strerror = (string) $errors;
        if ($strerror) {
            echo "nu e bun";
        } else {
            echo "bun";
        }



        //var_dump($tags);

        $placedao = $this->get("placesDAO");
        var_dump($placedao->checkCurrentSlug("restaurant-havana"));
        $placeop = $this->get("placeOperation");
        var_dump($placeop->isPhoto(1595));

        $placeop = $this->get("userop");
        var_dump($placeop->getIp());
        //$placeop->getPlaceInfosBySlug("restaurant-havana");
        return $this->render("BundlePlacesBundle:About:about.html.twig");
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
    
    public function insertOwnershipAction()
    {
        $params = $this->getRequestJson();
        $manager = $this->getDoctrine()->getManager();
       
        if($params['name'] && $params['email'] && $params['tel'])
        {
            $owner = new Ownership() ;
            $owner->setName($params['name'])
                   ->setEmail($params['email'])
                   ->setTel($params['tel'])
                   ->setPlaceId($params['placeId']);
            $manager->persist($owner);
            $manager->flush();
        }
           $response = new Response(json_encode($params));
           $response->headers->set('Content-Type', 'application/json');
           
            return $response;
    }

}
