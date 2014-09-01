    homePage.directive('mapTest', function () {
    'use strict';

    var directionsDisplay = new google.maps.DirectionsRenderer(),
        directionsService = new google.maps.DirectionsService(),
        geocoder = new google.maps.Geocoder(),
        map,
        marker,
        mapObj,
        infowindow;

    mapObj = {
        restrict: 'EAC',
        scope: {
            destination: '@',
            lat: '@',
            long: '@',
            latlong: '@',
            markerContent: '@',
            zoom: '=',
            type: '@',
            directions: '@'
        },
        replace: true,
        link: function (scope, element, attrs) {

            scope.init = function () {
                var mapOptions = {
                    zoom: scope.zoom !== undefined ? scope.zoom : 15,
                    mapTypeId: scope.type.toLowerCase(),
                    streetViewControl: true
                };
                map = new google.maps.Map(document.getElementById('theMap'), mapOptions);
                scope.endPoint = scope.destination !== undefined ? scope.destination : 'Dorobantilor 48, CLUJ NAPOCA';

                geocoder.geocode({
                    address: scope.endPoint
                }, function (results, status) {
                    var location = results[0].geometry.location;
                    if (status === google.maps.GeocoderStatus.OK) {
                        map.setCenter(location);
                        infowindow = new google.maps.InfoWindow({
                            content: scope.markerContent !== undefined ? scope.markerContent : 'Google HQ'
                        });

                    } else {
                        alert('Cannot Geocode');
                    }
                    scope.getDirections();

                });

            };

            scope.init();
            
            scope.getDirections = function () {
                scope.latlong =  new google.maps.LatLng(parseFloat(scope.lat),parseFloat(scope.long));
                var request = {
                    origin: scope.latlong,
                    destination: scope.endPoint,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
                directionsService.route(request, function (response, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response)
                        document.getElementById('wrongAddress').style.display = "none";
                    } else {
                        document.getElementById('wrongAddress').style.display = "block";
                    }
                });
                directionsDisplay.setMap(map);

            };

            scope.clearDirections = function () {
                scope.init();
                directionsDisplay.setPanel(null);
                scope.origin = '';
            };
        }
    };

    return mapObj;

});
