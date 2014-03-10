var map;
var gdir;
var geocoder = null;
var addressMarker;
var setBool = false;
function initialize(from, to) {
    //alert(1);
    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("googleMap"));
        gdir = new GDirections(map, document.getElementById("directions"));
        GEvent.addListener(gdir, "addoverlay", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);

        setDirections(from, to);
    } else {
        alert(0);
    }
}

function setDirections(fromAddress, toAddress) {
    //alert("Loading map ...");
    //alert(fromAddress);
    //alert(toAddress);
    //gdir.load("from 46.7697930 23.5937010 to 46.766988 23.586917" ,{locale:"en_US"});
    if ("" !== fromAddress) {
       // handleErrors();
        gdir.load("from: " + fromAddress + " to: " + toAddress, {"locale": "en_US"});
    } else {
        alert("An error occurred ! Please insert location address and try again !");
    }
}

function handleErrors() {
    if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
        alert("No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.\nError code: " + gdir.getStatus().code);
    else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
        alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: " + gdir.getStatus().code);
    else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
        alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code);
    else if (gdir.getStatus().code == G_GEO_BAD_KEY)
        alert("The given key is either invalid or does not match the domain for which it was given. \n Error code: " + gdir.getStatus().code);
    else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
        alert("A directions request could not be successfully parsed.\n Error code: " + gdir.getStatus().code);
    else
        alert("An unknown error occurred.");
}

function onGDirectionsLoad() {
    var poly = gdir.getPolyline();
    if (poly.getVertexCount() > 100) {
        alert("This route has too many vertices");
        return;
    }
    var baseUrl = "http://maps.google.com/staticmap?";

    var params = [];
    var markersArray = [];
    markersArray.push(poly.getVertex(0).toUrlValue(5) + ",greena");
    markersArray.push(poly.getVertex(poly.getVertexCount() - 1).toUrlValue(5) + ",greenb");
    params.push("markers=" + markersArray.join("|"));

    var polyParams = "rgba:0x0000FF80,weight:5|";
    var polyLatLngs = [];
    for (var j = 0; j < poly.getVertexCount(); j++) {
        polyLatLngs.push(poly.getVertex(j).lat().toFixed(5) + "," + poly.getVertex(j).lng().toFixed(5));
    }
    params.push("path=" + polyParams + polyLatLngs.join("|"));
    params.push("size=300x300");
    params.push("key=AIzaSyBGEQqVNDD_xkI7j4viU-5qMa-SYUOX_6g");

    baseUrl += params.join("&");

    var extraParams = [];
    extraParams.push("center=" + map.getCenter().lat().toFixed(6) + "," + map.getCenter().lng().toFixed(6));
    extraParams.push("zoom=" + map.getZoom());
    addImg(baseUrl + "&" + extraParams.join("&"), "staticMapOverviewIMG");

    var extraParams = [];
    extraParams.push("center=" + poly.getVertex(0).toUrlValue(5));
    extraParams.push("zoom=" + 5);
    addImg(baseUrl + "&" + extraParams.join("&"), "staticMapStartIMG");

    var extraParams = [];
    extraParams.push("center=" + poly.getVertex(poly.getVertexCount() - 1).toUrlValue(5));
    extraParams.push("zoom=" + 5);
    addImg(baseUrl + "&" + extraParams.join("&"), "staticMapEndIMG");
}

function addImg(url, id) {
    var img = document.createElement("img");
    img.src = url;
    document.getElementById(id).innerHTML = "";
    document.getElementById(id).appendChild(img);
}

$(function() {
    
    var toAddrLatLng = $("#lat").val() + " " + $("#lng").val();
    var fromAddr = $("#fromAddress").val();
    var toAddr = $("#toAddress").val();
    //alert(toAddrLatLng);
    if ("" !== toAddr) {
        initialize(fromAddr, toAddrLatLng);
    } else {
        initialize(fromAddr, toAddrLatLng);
    }
    
    //alert(1);

    $("#from-link").click(function(event) {
        alert(1);
        event.preventDefault();
        $('.loader').show();
        var addressId = this.id.substring(0, this.id.indexOf("-"));

        navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK)
                {
                    //alert(results[0].formatted_address);
                    $("#fromAddress").val(results[0].formatted_address);
                    $('.loader').hide();
                } else {
                    $("#fromAddress").append("Unable to retrieve your address<br />");
                }
            });
        },
                function(positionError) {
                    $("#error").append("Error: " + positionError.message + "<br />");
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10 * 1000 // 10 seconds
                });
    });
});