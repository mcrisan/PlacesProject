$(function() {
    console.log("in");
    function getLocationByIp() {
        $.get("http://ipinfo.io", function(response) {
            console.log(response.city);
            console.log(response.country);
            //$("#ip").html("IP: " + response.ip);
            // $("#address").html("Location: " + response.city + ", " + response.region);
            // $("#details").html(JSON.stringify(response, null, 4));
        }, "jsonp");
    }

    var x = document.getElementById("map-canvas");
    function getLocationHtml5()
    {
        console.log("html5");
        if (navigator.geolocation)
        {
            console.log("position22");
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else {
            console.log("position else");
            //x.innerHTML = "Geolocation is not supported by this browser.";
            console.log("Geolocation is not supported by this browser.");
        }
    }
    function showPosition(position)
    {
        console.log("position");
        x.innerHTML = "Latitude: " + position.coords.latitude;
        console.log( "Latitude: " + position.coords.latitude +
                "Longitude: " + position.coords.longitude);
    }
    getLocationByIp();
    //getLocationHtml5();
});