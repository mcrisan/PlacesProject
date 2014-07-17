

    homePage.service('getPlaces', function($http) {
        this.getAllPlaces = function(){
            return $http({
                url: "http://"+window.location.hostname+"/placesproject/web/app_dev.php/placesnames",
                method: 'get'
            }).success(function(data){
                return data;
            });
        };
    });

    homePage.controller('SearchForm',['$scope', 'getPlaces','$filter',function($scope,getPlaces,$filter){
        $scope.location = '';
        $scope.allPlaces = {};
        $scope.name = '';
        $scope.address = '';
        $scope.selected = false;
        

        $scope.showdetails = function(name) {
            var found = $filter('filter')($scope.allPlaces, {placeName: name}, true);
            if (found.length) {
                $scope.selected = true;
            } else {
                $scope.selected = false;
            }
    };

    getPlaces.getAllPlaces().then(function(response){
        $scope.allPlaces =  response.data;
    });

    $scope.doSearch = function(){
        if($scope.name === ''){
        } else {
            $scope.showdetails($scope.name);

            if($scope.selected)
            {
                window.location.href = "http://"+window.location.hostname+"/placesproject/web/app_dev.php/home?input=" + $scope.name;
            }
            else
            {
                window.location.href = "http://"+window.location.hostname+"/placesproject/web/app_dev.php/home?input=" + $scope.link;
            }
        }
    };

}]);
 

/* Directive google places */
    homePage.directive('googlePlaces', function(){
        return {
            restrict:'E',
            replace:true,
            transclude:true,
            template: '<input style="height: 90px; width: 94%; border-top: solid 15px red; border-bottom: solid 15px red; border-left: solid 25px red; font-size: 32px; color: rgb(119,119,119); padding-left: 25px;"  id="google_places_ac" name="google_places_ac" type="text"  />',
            link: function($scope, element, attrs, model){
                var autocomplete = new google.maps.places.Autocomplete($("#google_places_ac")[0], {});
                var componentRestrictions = {country: 'ro'};
                                     autocomplete.setComponentRestrictions(componentRestrictions);

                    
                $scope.secondClick = false;

        $scope.clickEvent = function(){

                if(!$scope.secondClick){
                     var types = ['establishment'];          
                     autocomplete.setTypes(types);
                     $scope.secondClick = true;              
                         console.log(types);  
                }
                                     
                else{
                    $scope.secondClick = false;              
                     var componentRestrictions = {country: 'ro'};
                     var types = []; 
                     autocomplete.setTypes(types);
                     autocomplete.setComponentRestrictions(componentRestrictions);
                         console.log(componentRestrictions);
       
                }
                
        }
                               
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    console.log(place);
                    var name = place.name;//encodeURIComponent(place.name).replace(/%20/g,'+');
                    var address = encodeURIComponent(place.formatted_address).replace(/%20/g,'+');
                    $scope.name = name;
                    $scope.link = encodeURIComponent(place.name).replace(/%20/g,'+')+"+"+address;
                    $scope.address = address;
                   // $scope.location = place.geometry.location.lat() + ',' + place.geometry.location.lng();
                    $scope.$apply();
                });
            }
            
            
        }
    
    });
    
    
   
//var map;
//var infowindow;
//
//function initialize() {
//  var pyrmont = new google.maps.LatLng(46.766667, 23.583333);
//
//  map = new google.maps.Map(document.getElementById('drink-checkbox'), {
//    center: pyrmont,
//    zoom: 15
//  });
//
//  var request = {
//    location: pyrmont,
//    radius: 5000,
//    types: ['cafe']
//  };
//  infowindow = new google.maps.InfoWindow();
//  var service = new google.maps.places.PlacesService(map);
//  service.nearbySearch(request, callback);
//}
//
//function callback(results, status) {
//  if (status == google.maps.places.PlacesServiceStatus.OK) {
//  console.log(results[0]);
//    for (var i = 0; i < results.length; i++) {
//
//    if (results[i].name.toLowerCase().indexOf("Bulgakov Cafe".toLowerCase()) >= 0){
//    console.log(results[i]);
//    window.placesfilter = results[i];
//    console.log(window.placesfilter);
//      
//     } 
//  }
//}
//}
//
//google.maps.event.addDomListener(window, 'load', initialize);
//
