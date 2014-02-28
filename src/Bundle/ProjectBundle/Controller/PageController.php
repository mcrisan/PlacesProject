<?php

// src/Bundle/ProjectBundle/Controller/PageController

namespace Bundle\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Bundle\ProjectBundle\lib\GetUserIp;
use Bundle\ProjectBundle\lib\ClientBrowser;
use Bundle\ProjectBundle\Entity\UsersIp;
use Bundle\ProjectBundle\Entity\Rating;
use Bundle\ProjectBundle\Entity\Tags;
use Bundle\ProjectBundle\Entity\PlaceDetails;
use Bundle\ProjectBundle\Entity\AppUsers;
use Bundle\ProjectBundle\lib\UserIp;

class PageController extends Controller {

    private $em;
    private $ip;

    function __construct() {
        
    }

    // Preload method - insert/update in/the users_ip table and redirect to homePage
    function preLoadAction() {


        //$mailer->send('ryan@foobar.net', ...);
        $this->em = $this->getDoctrine()->getManager();
//        $p1 = $this->em->getRepository('BundleProjectBundle:AppUsers')
//                ->find(1);
//        $p1->setTxtEmail("a");
//        var_dump($p1);
//////        $p2= new AppUsers();
//        $validator = $this->get('validator');
//       $errors = $validator->validate($p1, array('registration'));
//////    $errors = $validator->validate($p2);
//     var_dump($errors);
//     
//     $p2 = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
//                ->findOneBy(array('placeId'=> 2004));
//     var_dump($p2);
//     //$errors = $validator->validate($p2);
//     //var_dump($errors);
//     $placeop = $this->get('placeop');
//     $placeop->insertPlacePhotos($p2);
    $detailsRef = $this->em->getRepository('BundleProjectBundle:Places')->getPlacesDetailsRef();
    //var_dump($detailsRef);
    $apiKey = $this->container->getParameter('api_key');
//    //$detailsRef = $placeop->getPlacesDetailsRef();
//        //loop in all places
//        foreach ($detailsRef as $place) {
//            $placeId = $place['id'];
//            $placeName = $place['slug'];
//            $detailsRef = $place['detailsRef'];
//            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
//
//            $placeDetails = simplexml_load_file($url);
//            var_dump($placeDetails);
//            $detailsResults = $placeDetails->result;
//            var_dump($detailsResults);
//            //var_dump($detailsResults);
//            $url2 = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
//            $json = file_get_contents($url2);
//            $data = json_decode($json, TRUE);
//            //print_r($data);
//            //$detailsResults2 = $data[0]->result;
//            $detailsResults2 = $data['result'];
//            echo "json";
//            var_dump($detailsResults2);
//            var_dump($data);
//            
//            echo "xml 2";
//            foreach ($detailsResults as $detailResult) {
//                    var_dump($detailResult);
//                    $photos = $detailResult->review;
//                    var_dump($photos);
////                    foreach ($photos as $photo) {
////                        $photoRef = $photo->photo_reference;
////                        var_dump($photoRef);
////                        echo $photoRef;
////                    }
//                }
//                echo " ghgh tot json";
//                //foreach ($detailsResults2 as $detailResult) {
//                   // $type=$detailsResults2['types'];
//                $types = $detailsResults2['types'];
//                $geoGeometry = $detailsResults2['geometry'];
//                $geoLocation = $geoGeometry['location'];
//                $placeUrl = $detailsResults2['url'];;
//
//                // root->el
//                $placeName = $detailsResults2['name'];
//                $placeAddr = $detailsResults2['formatted_address'];
//                $placePhoneNumber = $detailsResults2['formatted_phone_number'];
//                if (isset($detailsResults2['rating'])) {
//                $placeRating = $detailsResults2['rating'];
//                }
//                if (isset($detailsResults2['website'])) {
//                $placeWebSite = $detailsResults2['website'];
//                }
//                $placeIcon = $detailsResults2['icon'];
//                
//                foreach ($types as $innerType) {
//                    $tag = new Tags();
//                    $tag->setTag($innerType);
//                    echo $innerType;
//                    //$placeop->checkTag($tag);
//                }
//                
//                //foreach ($geoLocation as $loc) {
//                    $placeLat = $geoLocation['lat'];
//                    $placeLng = $geoLocation['lng'];
//                    echo $placeLat . "si". $placeLng;
//                //}
//
//               // }
//            
//        }
        $radius = 1011; // 1011 m
        $x = 46.7680370;
        $y = 23.5899400;
        $latLng = $x.','.$y;
        $type = 'establishment';
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $latLng . "&radius=" . $radius . "&types=" . $type . "&sensor=false&key=" . $apiKey;
        
        $places = simplexml_load_file($url);
        $placeItems = $places->result;
        var_dump($placeItems);
        $pageToken = $places->next_page_token;
        var_dump($pageToken[0]);
        if ($pageToken[0] != "") {
            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $latLng . "&radius=" . $radius . "&types=" . $type . "&sensor=false&key=" . $apiKey . "&pagetoken=" . $pageToken[0];
        }
        $places = simplexml_load_file($url);
        $placeItems = $places->result;
        var_dump($placeItems);
        $pageToken = $places->next_page_token;
        
        
        echo "json";
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $latLng . "&radius=" . $radius . "&types=" . $type . "&sensor=false&key=" . $apiKey;
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        var_dump($data);
        $placeItems = $data['results'];
        var_dump($placeItems);
        $pageToken = $data['next_page_token'];
        var_dump($pageToken);
        echo $pageToken;
        foreach ($placeItems as $item) {
            $extId = $item['id'];
            $name = $item['name'];
            //$slug = $this->gen_slug($name);
            $origin = "google";
            $detailsRef = $item['reference'];
            if (!empty($detailsRef)) {
                    $detailsRef = $item['reference'];
                } else {
                    $detailsRef = "no ref";
                }
               echo "$name \r\n";
        }
        
        echo "place";
        $extId = 'b8968c7ecf0926b7f8c13c3dabc898ed160b71ce';
        $place = $this->em->getRepository('BundleProjectBundle:Places')
                ->findOneBy(array("extId" => $extId));
        var_dump($place);
        $place->setExtId("23");
        var_dump($place);
        //var_dump($pageToken[0]);
 //   var_dump($p2);
//         $p1 = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
//                ->find(2004); // return true or false
//         var_dump($p1);
//         $p2 = $this->em1->getRepository('BundleProjectBundle:PlaceDetails');
//                ->find(20040); // return true or false
//                if($p2){
//                echo "este";
//    }else{
//        echo "nu este";
//    }
//         var_dump($p2);
//         
//         if($p1==$p2){
//             echo "egale";
//         }else{
//             echo "diferite";
//         }
        // sd
//        try {
//            file_put_contents( 'c:/er.txt', "as", FILE_APPEND);
//            throw new \Exception("Value must be 1 or below");
 //       $this->em1->getRepository('BundleProjectBundle:PlaceDetails');
        
//        
//        }catch ( Exception $e ) {
//       $this->error = $e->getMessage();
//       echo "ex232323";
//       // do your log writing stuff here
//       file_put_contents( 'c:/er.txt', $error, FILE_APPEND); 
//    }
//        $p2 = $this->em->getRepository('BundleProjectBundle:Places')
//                ->find(2004);
//        
//        var_dump($p2->getPlaceDetails());
      return $this->render("BundleProjectBundle:About:about.html.twig");  
  //      return $this->redirect($this->generateUrl('index'));
    }

    // Home page
    function indexxAction() {
        $this->em = $this->getDoctrine()->getManager();

        $userBrowser = new ClientBrowser();
        $browserName = $userBrowser->Name;
        $browserVers = $userBrowser->Version;

        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        $userHits = $this->em->getRepository('BundleProjectBundle:UsersIp')
                ->getUserHits($currentIp);
        $allTimeUsers = $this->em->getRepository('BundleProjectBundle:UsersIp')
                ->getTotalUniqueUsers();

        return $this->render('BundleProjectBundle:Page:index.html.twig', array(
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
        $isUser = $this->em->getRepository('BundleProjectBundle:UsersIp')
                ->isUser($currentIp); // return true or false
        // get the vote results
        //get content of poll_result.txt
        $filename = "bundles/bundleproject/txt/poll_result.txt";
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
            return $this->render("BundleProjectBundle:About:about.html.twig", array(
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
        return $this->render("BundleProjectBundle:About:about.html.twig");
    }

    // Demo page - main (New homepage)
    public function indexAction() {
        $this->em = $this->getDoctrine()->getManager();
        //$request = $this->getRequest();
        $request = Request::createFromGlobals();

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
        // set searchInput - show default results (" places containing 'a' ")
        $searchInput = "ma";
        $searchInputVal = $request->query->get('input');
        if (!empty($searchInputVal)) {
            $searchInput = $searchInputVal;
        }
        $placeToShow = $this->em->getRepository('BundleProjectBundle:PlaceRatings')
                ->getPlaceMaxRating();
        if (!empty($placeToShow)) {
            $placeToShowId = $placeToShow[0]['placeId'];
        } else {
            // default place to show if 0 votes - user a query to select first place in tb - id's may change..
            $placeToShowId = 1595;
        }

        // default place to show
        // reviews
        $getDefaultPlaceReviews = $this->em->getRepository('BundleProjectBundle:Places')->find($placeToShowId);
        $placeReviews = $this->em->getRepository('BundleProjectBundle:PlaceReviews')
                ->getReviews($getDefaultPlaceReviews->getId());

        $getPlaceSlug = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getPlacesSlug($placeToShowId);
        $placeSlug = $getPlaceSlug[0]['slug'];

        $place = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getPlacesDetails($placeToShowId, 1); // start from place / with a limit of
        $placePhotos = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                ->getPlacePhotos($placeToShowId, 1);

        $placeAllPhotos = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                ->getPlacePhotos($placeToShowId);

        $userStatus = $this->em->getRepository('BundleProjectBundle:VoteStatus')
                ->getUserStatus($placeToShowId, $currentIp);

//        var_dump($userStatus);
//        exit();
        // place(s) ratings status

        $totalVotesForPlace = $this->em->getRepository('BundleProjectBundle:PlaceRatings')
                ->getCurrentCounts($placeToShowId);
        $totalVotesAllTime = $this->em->getRepository('BundleProjectBundle:VoteStatus')
                ->getTotalVotes();
        $total = $this->em->getRepository('BundleProjectBundle:PlaceRatings')
                ->getCurrentVotes($placeToShowId);
        $totalCounts = $this->em->getRepository('BundleProjectBundle:PlaceRatings')
                ->getCurrentCounts($placeToShowId);

//        print_r($placePhotos);
//        exit();
        // If search input !empty
        if (!empty($searchInput) && is_string($searchInput)) {
            //output the results: place_id,place_name,places.slug;
            $places = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                    ->getPlacesNamesAndIds($searchInput);
//            var_dump($places);
//            exit();
            if (!empty($places)) {
                $showThisPlace = $places[0]['placeId']; // #1 place from search results..
                $getPlaceSlug = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                        ->getPlacesSlug($showThisPlace);
//                print_r($getPlaceSlug);
//                exit();
                $placeSlug = $getPlaceSlug[0]['slug'];
            } else {
                $showThisPlace = $placeToShowId; // default place to show if the search return 0 results
            }

            //show default place
            $getDefaultPlaceReviews = $this->em->getRepository('BundleProjectBundle:Places')->find($showThisPlace);

            $placeReviews = $this->em->getRepository('BundleProjectBundle:PlaceReviews')
                    ->getReviews($getDefaultPlaceReviews->getId());

            $place = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                    ->getPlacesDetails($showThisPlace, 1);
            $placePhotos = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                    ->getPlacePhotos($showThisPlace, 1);
            $placeAllPhotos = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                    ->getPlacePhotos($showThisPlace);
            $userStatus = $this->em->getRepository('BundleProjectBundle:VoteStatus')
                    ->getUserStatus($showThisPlace, $currentIp);

            $totalResults = count($places);
            if ($userStatus) { // if user voted for current store
                return $this->render('BundleProjectBundle:Page:index.html.twig', array(
                            'input' => $searchInput,
                            'places' => $places,
                            'placeDetail' => $place,
                            'placePhotos' => $placePhotos,
                            'placeAllPhotos' => $placeAllPhotos,
                            'totalVotesAllTime' => $totalVotesAllTime,
                            'totalVotes' => $totalVotesForPlace[0]['votesCount'],
                            'usersRating' => round(
                                    $total[0]['totalVotes'] / $totalCounts[0]['votesCount'], 2),
                            'bool' => true,
                            'totalResults' => $totalResults,
                            'placeSlug' => $placeSlug,
                            'reviews' => $placeReviews,
                            'userId' => $userId,
                            'userName' => $userName,
                            'socialLogged' => $socialLogged,
                            'providerName' => $providerName
                ));
            }
            return $this->render('BundleProjectBundle:Page:index.html.twig', array(
                        'input' => $searchInput,
                        'places' => $places,
                        'placeDetail' => $place,
                        'placePhotos' => $placePhotos,
                        'placeAllPhotos' => $placeAllPhotos,
                        'totalResults' => $totalResults,
                        'placeSlug' => $placeSlug,
                        'reviews' => $placeReviews,
                        'userId' => $userId,
                        'userName' => $userName,
                        'socialLogged' => $socialLogged
            ));
        }

        if ($userStatus) {
            return $this->render('BundleProjectBundle:Page:index.html.twig', array(
                        'placeDetail' => $place,
                        'placePhotos' => $placePhotos,
                        'placeAllPhotos' => $placeAllPhotos,
                        'totalVotesAllTime' => $totalVotesAllTime,
                        'totalVotes' => $totalVotesForPlace[0]['votesCount'],
                        'usersRating' => round(
                                $total[0]['totalVotes'] / $totalCounts[0]['votesCount'], 2),
                        'bool' => true,
                        'placeSlug' => $placeSlug,
                        'reviews' => $placeReviews,
                        'userId' => $userId,
                        'userName' => $userName,
                        'socialLogged' => $socialLogged
            ));
        }

        return $this->render('BundleProjectBundle:Page:index.html.twig', array(
                    'placeDetail' => $place,
                    'placePhotos' => $placePhotos,
                    'placeAllPhotos' => $placeAllPhotos,
                    'placeSlug' => $placeSlug,
                    'reviews' => $placeReviews,
                    'userId' => $userId,
                    'userName' => $userName,
                    'socialLogged' => $socialLogged
        ));
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

        $namesArray = $this->em->getRepository('BundleProjectBundle:Places')
                ->getAllNames();

        $randomName = $this->gen_random($namesArray);
        $randomSlug = $randomName['slug'];

        //$placeDetails = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
        //->getPlaceDetailsByName($placeName);
        $getPaceDetails = $this->em->getRepository('BundleProjectBundle:PlaceDetails')
                ->getPlaceDetailsBySlug($placeName);

        if (!$getPaceDetails) {
            return $this->render('BundleProjectBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }

        $placeId = $getPaceDetails[0]['placeId'];
        $placeN = $getPaceDetails[0]['placeName'];
        $placeAddr = $getPaceDetails[0]['placeVicinity'];

        // reviews
        $getReviews = $this->em->getRepository('BundleProjectBundle:Places')->find($placeId);

        $reviews = $this->em->getRepository('BundleProjectBundle:PlaceReviews')
                ->getReviews($getReviews->getId());
//        var_dump($reviews);
//        exit();
        // photos
        $placePhoto = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                ->getPlacePhotos($placeId, 1);

        // get all photos
        $placeAllPhotos = $this->em->getRepository('BundleProjectBundle:PlacePhotos')
                ->getPlacePhotos($placeId);
//        var_dump($placeAllPhotos);
//        exit();
        // comm
        $placeShow = $this->em->getRepository('BundleProjectBundle:Places')
                ->getPlacesById($placeId);
        $placeToShow = $this->em->getRepository('BundleProjectBundle:Places')->find($placeId);


        if (!$placeToShow) {
            return $this->render('BundleProjectBundle:Error:errorPage.html.twig');
            //throw $this->createNotFoundException('Unable to find store post.');
        }
        $comments = $this->em->getRepository('BundleProjectBundle:Comment')
                ->getCommentsForPlace($placeToShow->getId());
//        exit();
//        var_dump($getPaceDetails);
//        exit();

        return $this->render('BundleProjectBundle:Page:indexShowPlace.html.twig', array(
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
        return $this->render('BundleProjectBundle:Page:placeDetails.html.twig', array(
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
