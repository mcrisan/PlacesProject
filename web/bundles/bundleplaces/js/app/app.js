'use strict';


// Declare app level module which depends on filters, and services
angular.module('laMatusica', [
  'ngRoute',
  'ui.bootstrap',
  'laMatusica.filters',
  'laMatusica.services',
  'laMatusica.directives',
  'laMatusica.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {templateUrl: 'partials/home.html', controller: 'HomeController', css:['css/home.css']});
  $routeProvider.when('/details', {templateUrl: 'partials/details.html', controller: 'DetailsController', css:['css/details.css']});
  $routeProvider.otherwise({redirectTo: '/'});
}]);
