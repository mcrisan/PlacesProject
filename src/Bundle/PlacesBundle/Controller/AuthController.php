<?php

// src/Bundle/ProjectBundle/Controller/AuthController

namespace Bundle\PlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\DependencyInjection\ContainerAware;

use Bundle\PlacesBundle\lib\ApiKey;

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

        return $this->render('BundlePlacesBundle:Login:index.html.twig',array('error'=>$error));
    }

    public function startAction() {
        $user = $this->getUser();
//        $userId = $user->getId();
        $role = $user->getRole();
//        $userName = $user->getUsername();
//       
//            return $this->render('BundlePlacesBundle:Login:success.html.twig', array(
//                        'userId' => $userId,
//                        'userName' => $userName,
//                        'role' => $role
//            ));
       
        if($role=="ROLE_ADMIN"){
//            echo $this->generateUrl('admin_start');
//            die;
            return new RedirectResponse($this->generateUrl('admin_start'));
        }else{
            return new RedirectResponse($this->generateUrl('owner_start'));
        }
        
    }
    public function adminAction() {
        $user = $this->getUser();
        $userId = $user->getId();
        $role = $user->getRole();
        $userName = $user->getUsername();
       
            return $this->render('BundlePlacesBundle:Login:admin.html.twig', array(
                        'userId' => $userId,
                        'userName' => $userName,
                        'role' => $role
            ));
        
    }

    public function ownerAction() {
        $user = $this->getUser();
        $userId = $user->getId();
        $role = $user->getRole();
        $userName = $user->getUsername();
        
        return $this->render('BundlePlacesBundle:Login:owner.html.twig', array(
                        'userId' => $userId,
                        'userName' => $userName,
                        'role' => $role
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
        $key = new ApiKey();
        
        $userName = "";
        $userId = "";
        $apiKey = $key->getKey();
        
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
