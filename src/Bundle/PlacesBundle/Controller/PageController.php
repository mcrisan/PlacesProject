<?php

// src/Bundle/PlacesBundle/Controller/PageController

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

class PageController extends Controller {

    private $em;
    private $ip;

    function __construct() {
        
    }

    // Preload method - insert/update in/the users_ip table and redirect to homePage
    function preLoadAction() {

             return $this->redirect($this->generateUrl('index'));
    }

    // Home page
    function indexxAction() {
        $this->em = $this->getDoctrine()->getManager();

        $userBrowser = new ClientBrowser();
        $browserName = $userBrowser->Name;
        $browserVers = $userBrowser->Version;

        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        $userHits = $this->em->getRepository('BundlePlacesBundle:UsersIp')
                ->getUserHits($currentIp);
        $allTimeUsers = $this->em->getRepository('BundlePlacesBundle:UsersIp')
                ->getTotalUniqueUsers();

        return $this->render('BundlePlacesBundle:Page:index.html.twig', array(
                    'userIp' => $currentIp,
                    'userSiteHits' => $userHits,
                    'browserName' => $browserName,
                    'browserVers' => $browserVers,
                    'allTimeUsers' => $allTimeUsers
        ));
    }

    // About page
    function aboutAction() {
        $this->em = $this->getDoctrine()->getManager();

        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();

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

    // Demo page - main (New homepage)
    public function indexAction() {
        $this->em = $this->getDoctrine()->getManager();
        //$request = $this->getRequest();
        $search = $this->get('search');
        $request = Request::createFromGlobals();
        $userDet = $search->getUserDetails();
        $providerName = $userDet['providerName'];
        $userName = $userDet['userName'];
        $userId = $userDet['userId'];
        $socialLogged = $userDet['socialLogged'];

        // set searchInput - show default results (" places containing 'ma' ")
        $searchInput = "ma";
        $searchInputVal = $request->query->get('input');
        if (!empty($searchInputVal)) {
            $searchInput = $searchInputVal;
        }
        $placeToShow = $this->em->getRepository('BundlePlacesBundle:PlaceRatings')
                ->getPlaceMaxRating();
        if (!empty($placeToShow)) {
            $placeToShowId = $placeToShow[0]['placeId'];
        } else {
            // default place to show if 0 votes - user a query to select first place in tb - id's may change..
            $placeToShowId = 1595;
        }

        // If search input !empty
        if (!empty($searchInput) && is_string($searchInput)) {
            //output the results: place_id,place_name,places.slug;
            $places = $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNamesAndIds($searchInput);
            if (!empty($places)) {
                $showThisPlace = $places[0]['placeId']; // #1 place from search results..
            } else {
                $showThisPlace = $placeToShowId; // default place to show if the search return 0 results
            }
            $totalResults = count($places);
            $placeInfo = $search->getPlaceInfos($showThisPlace);

            if (!isset($placeInfo['totalVotesForPlace'][0]['votesCount'])) {
                $placeInfo['totalVotesForPlace'][0]['votesCount'] = 0;
            }
            if (!isset($placeInfo['total'][0]['totalVotes'])) {
                $placeInfo['total'][0]['totalVotes'] = 0;
            }
            if (!isset($placeInfo['totalCounts'][0]['votesCount'])) {
                $placeInfo['totalCounts'][0]['votesCount'] = 1;
            }
            if ($placeInfo['userStatus']) { // if user voted for current store                
                return $this->render('BundlePlacesBundle:Page:index.html.twig', array(
                            'input' => $searchInput,
                            'places' => $places,
                            'placeDetail' => array($placeInfo['place']),
                            'placePhotos' => $placeInfo['placePhotos'],
                            'placeAllPhotos' => $placeInfo['placeAllPhotos'],
                            'totalVotesAllTime' => $placeInfo['totalVotesAllTime'],
                            'totalVotes' => $placeInfo['totalVotesForPlace'][0]['votesCount'],
                            'usersRating' => round(
                                    $placeInfo['total'][0]['totalVotes'] / $placeInfo['totalCounts'][0]['votesCount'], 2),
                            'bool' => true,
                            'totalResults' => $totalResults,
                            'placeSlug' => $placeInfo['placeSlug'],
                            'reviews' => $placeInfo['placeReviews'],
                            'userId' => $userId,
                            'userName' => $userName,
                            'socialLogged' => $socialLogged,
                            'providerName' => $providerName
                ));
            }
            return $this->render('BundlePlacesBundle:Page:index.html.twig', array(
                        'input' => $searchInput,
                        'places' => $places,
                        'placeDetail' => array($placeInfo['place']),
                        'placePhotos' => $placeInfo['placePhotos'],
                        'placeAllPhotos' => $placeInfo['placeAllPhotos'],
                        'totalResults' => $totalResults,
                        'placeSlug' => $placeInfo['placeSlug'],
                        'reviews' => $placeInfo['placeReviews'],
                        'userId' => $userId,
                        'userName' => $userName,
                        'socialLogged' => $socialLogged
            ));
        } else {

            $placeInfo = $search->getPlaceInfos($placeToShowId);

            if ($placeInfo['userStatus']) {
                return $this->render('BundlePlacesBundle:Page:index.html.twig', array(
                            'placeDetail' => array($placeInfo['place']),
                            'placePhotos' => $placeInfo['placePhotos'],
                            'placeAllPhotos' => $placeInfo['placeAllPhotos'],
                            'totalVotesAllTime' => $placeInfo['totalVotesAllTime'],
                            'totalVotes' => $placeInfo['totalVotesForPlace'][0]['votesCount'],
                            'usersRating' => round(
                                    $placeInfo['total'][0]['totalVotes'] / $placeInfo['totalCounts'][0]['votesCount'], 2),
                            'bool' => true,
                            'placeSlug' => $placeInfo['placeSlug'],
                            'reviews' => $placeInfo['placeReviews'],
                            'userId' => $userId,
                            'userName' => $userName,
                            'socialLogged' => $socialLogged
                ));
            }

            return $this->render('BundlePlacesBundle:Page:index.html.twig', array(
                        'placeDetail' => array($placeInfo['place']),
                        'placePhotos' => $placeInfo['placePhotos'],
                        'placeAllPhotos' => $placeInfo['placeAllPhotos'],
                        'placeSlug' => $placeInfo['placeSlug'],
                        'reviews' => $placeInfo['placeReviews'],
                        'userId' => $userId,
                        'userName' => $userName,
                        'socialLogged' => $socialLogged
            ));
        }
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

}

?>
