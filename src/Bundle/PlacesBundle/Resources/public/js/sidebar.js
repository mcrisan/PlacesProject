/*scroll directive, sidebar controller for get left data, directive selected place in sidebar */

    homePage.directive('whenScrolled', function($http, $rootScope, $compile) {
    return function(scope, elm, attr) {
        var raw = elm[0];
        var i = 0;
        var searchvalue = $("#searchvalue").val();  
        elm.bind('scroll', function() {
            if (raw.scrollTop + raw.offsetHeight >= raw.scrollHeight) {
              i++; //scope.$apply(attr.whenScrolled);
               return $http({
                method: 'POST',
                url: "morePlacesRequest",
                data: {'pag':  i , 'searchval' : searchvalue},
                dataType: 'json',
                headers: {'Content-Type': 'application/json'}
            }).success(function(data){
                
                   $('.restaurant-list').append(    
                                $compile(data)($rootScope)              
                    );
                        nrplaces = $("#nrplaces").val();   
                        
                    if(!scope.$$phase){
                      $rootScope.$apply(function(data){
                          $rootScope.data = data;
                      });
                      } 
                    
                });      
             }
            });
        };

    });

   homePage.controller('sideBar',function($scope,$http,$rootScope,$compile){
          $scope.getLeftData = function(address){
              $http({
                  method: 'GET',
                  url: address
              }).success(function(data) {
                  $("#loadmap").html(
                    $compile(data)($scope)
                  );
                      if(!$scope.$$phase){
                      $scope.$apply(function(data){
                          $scope.data = data;
                      });
                      }
              });
              
          };

      });
   /* sidebar selected place directive */   
   homePage.directive('getSiblings', function ($compile) {
     return {
        scope: true,
        link: function (scope, element, attrs) {
            scope.clicked = function () {
                element.siblings('li').removeClass('item-active');
                element.addClass('item-active');
            }
        }
    };
    

    });

