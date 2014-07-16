/*angular module, go from event to homepage controller*/
      var homePage = angular.module('homePage',['ui.bootstrap']);

      homePage.config(function($interpolateProvider){
              $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
          }
      );

      homePage.controller('goController',['$scope', function($scope){

          $scope.slug = '';
          $scope.redirect = function(slug)
          {
              $scope.slug = slug;
              window.location.href = "http://"+window.location.hostname+"/placesproject/web/app_dev.php/home?slug=" + $scope.slug;
          };

      }]);







