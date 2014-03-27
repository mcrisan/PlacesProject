<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),),
        '_profiler_import' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:importAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/import',    ),  ),  4 =>   array (  ),),
        '_profiler_export' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:exportAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.txt',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler/export',    ),  ),  4 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login',    ),  ),  4 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/logout',    ),  ),  4 =>   array (  ),),
        'admin_start' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::startAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/start',    ),  ),  4 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::loginCheckAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login_check',    ),  ),  4 =>   array (  ),),
        'testToken' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::testTokenAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/testToken',    ),  ),  4 =>   array (  ),),
        'clear' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\AuthController::clearAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/clear',    ),  ),  4 =>   array (  ),),
        'preLoad' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::preLoadAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/home',    ),  ),  4 =>   array (  ),),
        'index_indexShowPlace' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::indexShowPlaceAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/home',    ),  ),  4 =>   array (  ),),
        'index_placeDetails' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::placeDetailsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/home/details',    ),  ),  4 =>   array (  ),),
        'about' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::aboutAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/about',    ),  ),  4 =>   array (  ),),
        'about_test' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\PageController::testAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/about/test',    ),  ),  4 =>   array (  ),),
        'renderPlace' => array (  0 =>   array (    0 => 'param',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::renderPlaceAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'param',    ),    1 =>     array (      0 => 'text',      1 => '/renderPlace',    ),  ),  4 =>   array (  ),),
        'comment_create' => array (  0 =>   array (    0 => 'place_id',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\CommentController::createAction',  ),  2 =>   array (    '_method' => 'POST',    'store_id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'place_id',    ),    1 =>     array (      0 => 'text',      1 => '/comment',    ),  ),  4 =>   array (  ),),
        'votee' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::voteeAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/votee',    ),  ),  4 =>   array (  ),),
        'setVote' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::setVoteAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/setVote',    ),  ),  4 =>   array (  ),),
        'morePlacesRequest' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::morePlacesRequestAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/morePlacesRequest',    ),  ),  4 =>   array (  ),),
        'demoSearch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::demoSearchAction',  ),  2 =>   array (    '_method' => 'POST|GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demoSearch',    ),  ),  4 =>   array (  ),),
        'autocom_ac' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::doAutocomAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/autocomaction',    ),  ),  4 =>   array (  ),),
        'autocom_places' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::getPlacesNamesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/placesnames',    ),  ),  4 =>   array (  ),),
        'insert_places' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::insertPlacesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/insertplaces',    ),  ),  4 =>   array (  ),),
        'insert_homepage_places' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\FormsController::homepagePlacesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/homepageplaces',    ),  ),  4 =>   array (  ),),
        'search_name' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByNameAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/searchname',    ),  ),  4 =>   array (  ),),
        'search_address' => array (  0 =>   array (    0 => 'address',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByAddressAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'address',    ),    1 =>     array (      0 => 'text',      1 => '/searchaddress',    ),  ),  4 =>   array (  ),),
        'search_tag' => array (  0 =>   array (    0 => 'tag',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByTagAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'tag',    ),    1 =>     array (      0 => 'text',      1 => '/searchtag',    ),  ),  4 =>   array (  ),),
        'search_tag_addr' => array (  0 =>   array (    0 => 'tag',    1 => 'address',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchByTagAndAddressAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'address',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'tag',    ),    2 =>     array (      0 => 'text',      1 => '/searchtagaddr',    ),  ),  4 =>   array (  ),),
        'search' => array (  0 =>   array (    0 => 'input',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'input',    ),    1 =>     array (      0 => 'text',      1 => '/searchplace',    ),  ),  4 =>   array (  ),),
        'homepage_places' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::homepagePlacesAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/homeplace',    ),  ),  4 =>   array (  ),),
        'search_add' => array (  0 =>   array (    0 => 'input',  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::searchAddressAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'input',    ),    1 =>     array (      0 => 'text',      1 => '/searchaddress',    ),  ),  4 =>   array (  ),),
        'test_search_name' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::testServiceAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/testsearchname',    ),  ),  4 =>   array (  ),),
        'autocom' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\PlacesBundle\\Controller\\ServiceController::autocomAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/autocom',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
