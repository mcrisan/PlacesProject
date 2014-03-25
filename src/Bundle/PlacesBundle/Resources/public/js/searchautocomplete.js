            $(function() {
                var geocoder = new google.maps.Geocoder();
                var data2;

                $.ajax({
                    type: "POST",
                    url: "placesnames",
                    cache: false,
                    dataType: 'json',
                    success: function(data)
                    {
                        data2 = data;
                        //console.log(data[0].placeName);
                    }
                });

                $(".search").keyup(function()
                {
                    //$( ".search" ).addClass( "ui-autocomplete-loading" );
                    $("#autocomplete-result").empty();
                    var searchid = $(this).val();
                    if (searchid.length > 0) {
                    }
                    if (searchid != '')
                    {;
                        var nr = 0;
                        var nr2 = 0;
                        nr2 = getAddress(searchid);
                        //nr2 = $("#search-lat").val();
                        //alert(nr2);
                        $("#autocomplete-result").append("<b>Places:</b> <br/>");
                        for (var i = 0; i < data2.length; i++) {
                            if (data2[i].placeName.toLowerCase().indexOf(searchid) != -1) {
                                nr++;
                                var span = $('<span/>', {
                                    class: "name",
                                    text: data2[i].placeName
                                });
                                var div = $('<div/>', {
                                    class: "show",
                                    align: "left",
                                    text: nr + ". "
                                });
                                $(div).append(span);
                                $("#autocomplete-result").append(div);
                                if(nr==15){
                                    break;
                                }
                            }


                        }

                    }
                    return false;
                });

                function getAddress(name) {
                    var bold = $('<b/>', {
                        text: "Address:"
                    });
                    var addr = $('<div/>', {
                        id: "addr-auto"
                    });
                    $(addr).append(bold);
                    $("#autocomplete-result").append(addr);
                    address = name + " Cluj Napoca, Romania";
                    var nr = 0;
                    geocoder.geocode({'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            res = results[0].formatted_address;
                            for (var i = 0; i < results.length; i++) {
                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                $("#search-lat").val(latitude);
                                $("#search-lng").val(longitude);
                                var addr = results[i].formatted_address;
                                if (i > 0) {
                                    res2 = results[i].formatted_address;
                                } else {
                                    res2 = "";
                                }
                                if (res != res2) {
                                    nr++;
                                    var span = $('<span/>', {
                                        class: "name",
                                        text: addr
                                    });
                                    var div = $('<div/>', {
                                        class: "show",
                                        align: "left",
                                        text: nr + ". "
                                    });
                                    $(div).append(span);
                                    $("#addr-auto").append(div);
                                }
                            }
                            //alert(nr);
                            $("#search-lat").val(nr);
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
