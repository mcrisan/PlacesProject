<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                // login
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::loginAction',  '_route' => 'login',);
                }

                // logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::logoutAction',  '_route' => 'logout',);
                }

            }

            // admin_start
            if ($pathinfo === '/admin/start') {
                return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::startAction',  '_route' => 'admin_start',);
            }

            // login_check
            if ($pathinfo === '/admin/login_check') {
                return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::loginCheckAction',  '_route' => 'login_check',);
            }

        }

        // testToken
        if ($pathinfo === '/testToken') {
            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::testTokenAction',  '_route' => 'testToken',);
        }

        // clear
        if ($pathinfo === '/clear') {
            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::clearAction',  '_route' => 'clear',);
        }

        // preLoad
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'preLoad');
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::preLoadAction',  '_route' => 'preLoad',);
        }

        if (0 === strpos($pathinfo, '/home')) {
            // index
            if ($pathinfo === '/home') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_index;
                }

                return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::indexAction',  '_route' => 'index',);
            }
            not_index:

            // index_indexShowPlace
            if (preg_match('#^/home/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_index_indexShowPlace;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_indexShowPlace')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::indexShowPlaceAction',));
            }
            not_index_indexShowPlace:

            // index_placeDetails
            if (0 === strpos($pathinfo, '/home/details') && preg_match('#^/home/details/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_placeDetails')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::placeDetailsAction',));
            }

        }

        if (0 === strpos($pathinfo, '/about')) {
            // about
            if ($pathinfo === '/about') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_about;
                }

                return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::aboutAction',  '_route' => 'about',);
            }
            not_about:

            // about_test
            if ($pathinfo === '/about/test') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_about_test;
                }

                return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::testAction',  '_route' => 'about_test',);
            }
            not_about_test:

        }

        // renderPlace
        if (0 === strpos($pathinfo, '/renderPlace') && preg_match('#^/renderPlace/(?P<param>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_renderPlace;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'renderPlace')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::renderPlaceAction',));
        }
        not_renderPlace:

        // comment_create
        if (0 === strpos($pathinfo, '/comment') && preg_match('#^/comment/(?P<place_id>[^/]++)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_comment_create;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comment_create')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\CommentController::createAction',));
        }
        not_comment_create:

        // votee
        if ($pathinfo === '/votee') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_votee;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::voteeAction',  '_route' => 'votee',);
        }
        not_votee:

        // setVote
        if ($pathinfo === '/setVote') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_setVote;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::setVoteAction',  '_route' => 'setVote',);
        }
        not_setVote:

        // morePlacesRequest
        if ($pathinfo === '/morePlacesRequest') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_morePlacesRequest;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::morePlacesRequestAction',  '_route' => 'morePlacesRequest',);
        }
        not_morePlacesRequest:

        // demoSearch
        if ($pathinfo === '/demoSearch') {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                goto not_demoSearch;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::demoSearchAction',  '_route' => 'demoSearch',);
        }
        not_demoSearch:

        // autocom_ac
        if ($pathinfo === '/autocomaction') {
            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::doAutocomAction',  '_route' => 'autocom_ac',);
        }

        if (0 === strpos($pathinfo, '/search')) {
            // search_name
            if (0 === strpos($pathinfo, '/searchname') && preg_match('#^/searchname/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_search_name;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_name')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByNameAction',));
            }
            not_search_name:

            // search_address
            if (0 === strpos($pathinfo, '/searchaddress') && preg_match('#^/searchaddress/(?P<address>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_search_address;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_address')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByAddressAction',));
            }
            not_search_address:

            if (0 === strpos($pathinfo, '/searchtag')) {
                // search_tag
                if (preg_match('#^/searchtag/(?P<tag>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_search_tag;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_tag')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByTagAction',));
                }
                not_search_tag:

                // search_tag_addr
                if (0 === strpos($pathinfo, '/searchtagaddr') && preg_match('#^/searchtagaddr/(?P<tag>[^/]++)/(?P<address>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_search_tag_addr;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_tag_addr')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByTagAndAddressAction',));
                }
                not_search_tag_addr:

            }

            // search
            if (0 === strpos($pathinfo, '/searchplace') && preg_match('#^/searchplace/(?P<input>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_search;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search')), array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchAction',));
            }
            not_search:

        }

        // test_search_name
        if ($pathinfo === '/testsearchname') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_test_search_name;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::testServiceAction',  '_route' => 'test_search_name',);
        }
        not_test_search_name:

        // autocom
        if ($pathinfo === '/autocom') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_autocom;
            }

            return array (  '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::autocomAction',  '_route' => 'autocom',);
        }
        not_autocom:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
