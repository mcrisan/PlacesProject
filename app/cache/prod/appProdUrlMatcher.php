<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                // login
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::loginAction',  '_route' => 'login',);
                }

                // logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::logoutAction',  '_route' => 'logout',);
                }

            }

            // admin_start
            if ($pathinfo === '/admin/start') {
                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::startAction',  '_route' => 'admin_start',);
            }

            // login_check
            if ($pathinfo === '/admin/login_check') {
                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::loginCheckAction',  '_route' => 'login_check',);
            }

        }

        // testToken
        if ($pathinfo === '/testToken') {
            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::testTokenAction',  '_route' => 'testToken',);
        }

        // clear
        if ($pathinfo === '/clear') {
            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::clearAction',  '_route' => 'clear',);
        }

        // preLoad
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'preLoad');
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::preLoadAction',  '_route' => 'preLoad',);
        }

        if (0 === strpos($pathinfo, '/home')) {
            // index
            if ($pathinfo === '/home') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_index;
                }

                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::indexAction',  '_route' => 'index',);
            }
            not_index:

            // index_indexShowPlace
            if (preg_match('#^/home/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_index_indexShowPlace;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_indexShowPlace')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::indexShowPlaceAction',));
            }
            not_index_indexShowPlace:

            // index_placeDetails
            if (0 === strpos($pathinfo, '/home/details') && preg_match('#^/home/details/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_placeDetails')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::placeDetailsAction',));
            }

        }

        if (0 === strpos($pathinfo, '/about')) {
            // about
            if ($pathinfo === '/about') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_about;
                }

                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::aboutAction',  '_route' => 'about',);
            }
            not_about:

            // about_test
            if ($pathinfo === '/about/test') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_about_test;
                }

                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::testAction',  '_route' => 'about_test',);
            }
            not_about_test:

        }

        // renderPlace
        if (0 === strpos($pathinfo, '/renderPlace') && preg_match('#^/renderPlace/(?P<param>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_renderPlace;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'renderPlace')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::renderPlaceAction',));
        }
        not_renderPlace:

        // comment_create
        if (0 === strpos($pathinfo, '/comment') && preg_match('#^/comment/(?P<place_id>[^/]++)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_comment_create;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comment_create')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\CommentController::createAction',));
        }
        not_comment_create:

        // search
        if ($pathinfo === '/places/search') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_search;
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::searchAction',  '_route' => 'search',);
        }
        not_search:

        // votee
        if ($pathinfo === '/votee') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_votee;
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::voteeAction',  '_route' => 'votee',);
        }
        not_votee:

        // setVote
        if ($pathinfo === '/setVote') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_setVote;
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::setVoteAction',  '_route' => 'setVote',);
        }
        not_setVote:

        // morePlacesRequest
        if ($pathinfo === '/morePlacesRequest') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_morePlacesRequest;
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::morePlacesRequestAction',  '_route' => 'morePlacesRequest',);
        }
        not_morePlacesRequest:

        // demoSearch
        if ($pathinfo === '/demoSearch') {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                goto not_demoSearch;
            }

            return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::demoSearchAction',  '_route' => 'demoSearch',);
        }
        not_demoSearch:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
