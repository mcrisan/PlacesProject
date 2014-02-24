<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_start' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::startAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/start',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::loginCheckAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'testToken' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::testTokenAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/testToken',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'clear' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\AuthController::clearAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/clear',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'preLoad' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::preLoadAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/home',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'index_indexShowPlace' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::indexShowPlaceAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/home',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'index_placeDetails' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::placeDetailsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/home/details',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'about' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::aboutAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/about',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'about_test' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\PageController::testAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/about/test',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'renderPlace' => array (  0 =>   array (    0 => 'param',  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::renderPlaceAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'param',    ),    1 =>     array (      0 => 'text',      1 => '/renderPlace',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'comment_create' => array (  0 =>   array (    0 => 'place_id',  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\CommentController::createAction',  ),  2 =>   array (    '_method' => 'POST',    'store_id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'place_id',    ),    1 =>     array (      0 => 'text',      1 => '/comment',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::searchAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/places/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'votee' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::voteeAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/votee',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'setVote' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::setVoteAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/setVote',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'morePlacesRequest' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::morePlacesRequestAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/morePlacesRequest',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'demoSearch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bundle\\ProjectBundle\\Controller\\FormsController::demoSearchAction',  ),  2 =>   array (    '_method' => 'POST|GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demoSearch',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
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

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
