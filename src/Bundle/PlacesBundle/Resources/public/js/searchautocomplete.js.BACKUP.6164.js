$(function() {
    var geocoder = new google.maps.Geocoder();
    var data2;

    $.ajax({
        type: "POST",
        url: "placesnames",
        cache: false,
        dataType: 'json',
        success: function(data) {
            data2 = data;
            $(".search").keyup(function() {
                //$( ".search" ).addClass( "ui-autocomplete-loading" );
                $("#autocomplete-result").empty();
                var searchid = $(this).val();
                if (searchid != '') {
                    getPlaces(searchid);
                    getAddress(searchid);
                }
                return false;
            });
        }
    });

<<<<<<< HEAD
    function getPlaces(name) {
=======
    function getPlaces(name){
        var checkedFood = $("#food-checkbox").is(":checked");
        var checkedDrink = $("#drink-checkbox").is(":checked");
        var checkedAll = checkedFood ^ checkedDrink;
>>>>>>> 2d4c9a75c3921eceec6a3dee1e1d17e837afb4bc
        for (var i = 0; i < data2.length; i++) {
            if (data2[i].placeName.toLowerCase().indexOf(name) != -1) {
                var category = data2[i].category.toLowerCase();
                if(checkedFood && category != "food" && checkedAll){                    
                    continue;
                } 
                if(checkedDrink && category != "drink" && checkedAll){                    
                    continue;
                }
                var div = $('<div/>', {
                    class: "show",
                    align: "left"
                });
                var span = $('<span/>', {
                    class: "name",
                    text: data2[i].placeName
                });
                var category = data2[i].category ? data2[i].category : "food";
                var icon = $('<div/>', {
                    class: category.toLowerCase() + " category",
                });
                $(div).append(icon);
                $(div).append(span);
                $("#autocomplete-result").append(div);
            }
        }
    }

    function getAddress(name) {
        var addr = $('<div/>', {
            id: "addr-auto"
        });
        $("#autocomplete-result").append(addr);
        address = name + ", Cluj Napoca, Romania";
        geocoder.geocode({'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latitude = results[0].geometry.location.lat();
                longitude = results[0].geometry.location.lng();
                $("#search-lat").val(latitude);
                $("#search-lng").val(longitude);
                var addr = results[0].formatted_address;
                var span = $('<span/>', {
                    class: "name",
                    text: addr
                });
                var div = $('<div/>', {
                    class: "show",
                    align: "left",
                });
                var icon = $('<div/>', {
                    class: "address-marker",
                });
                $(div).append(icon);
                $(div).append(span);
                $("#addr-auto").append(div);
            }
        });

    }

    jQuery("#autocomplete-result").on("click", function(e) {
        var $clicked = $(e.target);
        //var $name = $clicked.parent().find('.name').html();
        //alert($name);
        var $name = $clicked.find('.name').html();
        if (typeof $name == 'undefined') {
            $name = $clicked.parent().find('.name').html();
        }
        //alert($name);
        var decoded = $("<div/>").html($name).text();
        $('#searchh').val(decoded);
    });
    jQuery(document).on("click", function(e) {
        var $clicked = $(e.target);
        if (!$clicked.hasClass("search")) {
            jQuery("#autocomplete-result").fadeOut();
        }
    });
    $('#searchh').click(function() {
        jQuery("#autocomplete-result").fadeIn();
    });

});
