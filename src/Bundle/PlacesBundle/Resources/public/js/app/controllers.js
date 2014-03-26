'use strict';

/* Controllers */

angular.module('laMatusica.controllers', []).
  controller('HomeController', ['$scope', function($scope) {
  		$scope.stylesheets = [
  			{href: 'css/style.css'},
  			{href: 'css/home.css'},
  			{href: 'css/bootstrap.css'}
  		]
  		console.log($scope.stylesheets);
  }])
  .controller('DetailsController', ['$scope', function($scope) {
      var map;
        function initialize() {
          var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(46.774003, 23.608803)
          };
          map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
        }
      google.maps.event.addDomListener(window, 'load', initialize);
      
      $("button.location-button").on('click', function(e){
          if($($("div.address label")[0]).is(':visible')){
              $("div.address label").hide();
              $("div.address input").show().val("Dorobantilor 48, CLUJ NAPOCA");
          }        
      })
  }])
  .controller('TypeaheadCtrl', ['$scope', '$http', function($scope, $http){

      $scope.getLocation = function(val) {
          return $http.get('http://maps.googleapis.com/maps/api/geocode/json', {
            params: {
              address: val,
              sensor: false
            }
          }).then(function(res){
              var addresses = [];
              angular.forEach(res.data.results, function(item){
                addresses.push(item.formatted_address);
              });
              return addresses;
          });
      };
  }]);