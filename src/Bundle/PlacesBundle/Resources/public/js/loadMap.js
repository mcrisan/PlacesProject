$(function() {
    // get hidden 
    var placeName = $("#name").val();
    var lat = $("#lat").val();
    var lng = $("#lng").val();
    // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }
 
        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Unable to retrieve your address<br />");
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });
    $("#calculate-route").submit(function(event) {
          event.preventDefault();
          alert(1);
          calculateRoute($("#from").val(), $("#to").val(),lat,lng);
    });
    
    var myCenter = new google.maps.LatLng(lat, lng);

    var mapProp = {
        center: myCenter,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var marker = new google.maps.Marker({
        position: myCenter
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
        content: placeName
    });

    infowindow.open(map, marker);



    // Zoom to 9 when clicking on marker
    google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(18);
        map.setCenter(marker.getPosition());
    });
});

function calculateRoute(from, to,lat,lng) {
        // Center initialized to Naples, Italy
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(lat, lng),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("googleMap"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }

//google.maps.event.addDomListener(window, 'load', initialize);