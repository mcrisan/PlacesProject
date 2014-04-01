<?php

// src/Bundle/ProjectBundle/Controller/AuthController

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;

class AuthController extends Controller {

    // Login Action
    public function loginAction(Request $request) {
        //$session = new Session();
        $session = $this->get('session');
        $session->clear();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('BundlePlacesBundle:Login:index.html.twig');
    }

    public function startAction() {
        $user = $this->getUser();
        $userId = $user->getId();
        $userName = $user->getUsername();

        return $this->render('BundlePlacesBundle:Login:success.html.twig', array(
                    'userId' => $userId,
                    'userName' => $userName
        ));
    }

    public function loginCheckAction(Request $request) {
        return new Response('true');
    }

    public function logoutAction(Request $request) {
        return $this->loginAction($request);
    }

    // Social sign-in
    public function clearAction() {
        //$session = new Session();
        $session = $this->get('session');
        $session->clear();
        return $this->redirect($this->generateUrl('login'));
    }
    
    public function testTokenAction() {
        
        $userName = "";
        $userId = "";
        $apiKey = $this->container->getParameter('social_api_key');
        
        if (isset($_POST['token'])) {
            $token = $_POST['token'];

            if (!empty($_POST['token'])) {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://rpxnow.com/api/v2/auth_info');
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, array('token' => $token, 'apiKey' => $apiKey));
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_FAILONERROR, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $profileString = curl_exec($curl);
                if (!$profileString) {
                    //echo '<p>Curl error: ' . curl_error($curl);
                    //echo '<p>HTTP code: ' . curl_errno($curl);
                    return $this->redirect($this->generateUrl('login'));
                    exit();
                } else {
                    $profile = json_decode($profileString);
                    if (property_exists($profile, 'err')) {
                        echo '<p>Engage error: ' . $profile->err->msg;
                        exit();
                    } else {
                        //$session = new Session();
                        $session = $this->get('session');
                        if (property_exists($profile->profile, 'displayName')) {
                            $session->set('providerName', $profile->profile->providerName);
                            $session->set('userIdentifier', $profile->profile->identifier);
                            $session->set('userName', $profile->profile->displayName);
                            $session->set('userEmail', $profile->profile->email);
                            
                            //$userName = $profile->profile->displayName;
                            //$userId = $profile->profile->email;
                        } else {
                             $session->set('providerName','');
                            //$_SESSION['userName'] = '(Anonymous Coward)';
                            //$userName = '(Anonymous Coward)';
                        }
                    }
                }
                curl_close($curl);
            } else { //token !empty
                return $this->redirect($this->generateUrl('login'));
                //die('Empty token !');
            }
        } else { //token is not set
            return $this->redirect($this->generateUrl('login'));
            //die('Token is not set !');
        }
        
        //echo '<p>Hi there' . $userName . '!';exit();
        return $this->redirect($this->generateUrl('index'));
    }

}

?>
