<?php

/* BundlePlacesBundle::base.html.twig */
class __TwigTemplate_70db9cd17588a3d6f67eda4dba0f87c8db6c310843071c215a48e358e924dd69 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'navigation' => array($this, 'block_navigation'),
            'flashBag' => array($this, 'block_flashBag'),
            'body' => array($this, 'block_body'),
            'aside' => array($this, 'block_aside'),
            'footer' => array($this, 'block_footer'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!doctype html>
<html>
    <head>
        <link rel=\"shortcut icon\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/icons/glyph-icons-gradient/magnifying-glass.png"), "html", null, true);
        echo "\" type=\"image/x-icon\">
        <meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Places App | ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <!-- Stylesheets -->
        <!-- App css -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-core.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-homepage.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-typehead-styles.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-slide-navigation.css"), "html", null, true);
        echo "\" />

        <!-- Bootstrap css -->
        <!--<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/bootstrap.min.css"), "html", null, true);
        echo "\" />-->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"http://cdn.bootcss.com/twitter-bootstrap/3.0.1/css/bootstrap.css\" />

        <!-- Append css -->
        ";
        // line 22
        $this->displayBlock('css', $context, $blocks);
        // line 23
        echo "    </head>

    <body>
        <!-- Main wrapper -->
        <div id=\"main-box\">

            <!-- Header -->
            <header id=\"header-section\">
                ";
        // line 31
        $this->displayBlock('navigation', $context, $blocks);
        // line 111
        echo "            </header><!-- /header -->

            <!-- Main section -->
            <section id=\"main-section\">
                <!-- Main section content container --> 
                <div class=\"container main-container\">
                    <div class=\"row\" style=\"border-bottom: 3px solid #ccc; padding:5px;\">
                        ";
        // line 118
        $this->displayBlock('flashBag', $context, $blocks);
        // line 119
        echo "                        <!-- Mobile first xs,sm,md,lg -->
                        <div class=\"col-xs-12 col-sm-9 col-md-9 col-lg-9 app-left-content\">
                            <!-- Main section 'float left' content -->
                            ";
        // line 122
        $this->displayBlock('body', $context, $blocks);
        // line 123
        echo "                        </div>
                        <div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3 app-right-content\">
                            <!-- Main section 'float right' content -->
                            ";
        // line 126
        $this->displayBlock('aside', $context, $blocks);
        // line 127
        echo "                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class=\"footer\">
                <div class=\"container\" style=\"border-top:1px solid #ccc;\">
                    ";
        // line 135
        $this->displayBlock('footer', $context, $blocks);
        // line 159
        echo "                </div>
            </footer>
            <div id=\"map-canvas\"> </div>
        </div><!-- /main wrapper -->

        <!-- Javascripts -->
        <!-- jQuery -->
        <script type=\"text/javascript\" src=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/jquery-1.9.1.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/jquery-ui.js"), "html", null, true);
        echo "\"></script>

        <!-- Bootstrap js -->
        <script type=\"text/javascript\" src=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 171
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/typeahead.js"), "html", null, true);
        echo "\"></script>

        <!-- App js -->
        <script type=\"text/javascript\" src=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/app-social-signin.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/app-core.js"), "html", null, true);
        echo "\"></script>
        <!-- for autocomplete -->
        ";
        // line 178
        echo "


        ";
        // line 184
        echo "        <script>
            \$(function() {
                var geocoder = new google.maps.Geocoder();
                var data2;

                \$.ajax({
                    type: \"POST\",
                    url: \"placesnames\",
                    cache: false,
                    dataType: 'json',
                    success: function(data)
                    {
                        data2 = data;
                        //console.log(data[0].placeName);
                    }
                });

                // \$(\"#searchh\").autocomplete({
                //     source: availableTags
                // });






                \$(\".search\").keyup(function()
                {
                    //\$( \".search\" ).addClass( \"ui-autocomplete-loading\" );
                    \$(\"#autocomplete-result\").empty();
                    \$(\"#autocomplete-result\").append(\"<b>Places:</b> <br/>\");
                    var searchid = \$(this).val();
                    var dataString = 'search=' + searchid;
                    if (searchid.length > 0) {
                        //\$(\".search\").addClass(\"ui-autocomplete-loading\");
                    }
                    if (searchid != '')
                    {
                        // console.log(data2[0].placeName);
                        var nr = 0;
                        for (var i = 0; i < data2.length; i++) {
                            if (data2[i].placeName.toLowerCase().indexOf(searchid) != -1) {
                                nr++;
                                var span = \$('<span/>', {
                                    class: \"name\",
                                    text: data2[i].placeName
                                });
                                var div = \$('<div/>', {
                                    class: \"show\",
                                    align: \"left\",
                                    text: nr + \". \"
                                });
                                \$(div).append(span);
                                //var image = \$('<span/>', {class: \"bigimg\", text: \"s\"});
                                \$(\"#autocomplete-result\").append(div);
                                //\$(\"#autocomplete-result\").append(\"<br/>\" );
                                //console.log(data2[i].placeName);
                            }


                        }
                        getAddress(searchid);
                    }
                    return false;
                });

                function getAddress(name) {
                    \$(\"#autocomplete-result\").append(\"<b>Address:</b> <br/>\");
                    address = name + \" Cluj Napoca, Romania\";
                    var nr = 0;
                    geocoder.geocode({'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            for (var i = 0; i < results.length; i++) {
                                nr++;
                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                \$(\"#search-lat\").val(latitude);
                                \$(\"#search-lng\").val(longitude);
                                var addr = results[i].formatted_address;
                                //console.log(\"Geocode: \" + addr);
                                var span = \$('<span/>', {
                                    class: \"name\",
                                    text: addr
                                });
                                var div = \$('<div/>', {
                                    class: \"show\",
                                    align: \"left\",
                                    text: nr + \". \"
                                });
                                \$(div).append(span);
                                //var image = \$('<span/>', {class: \"bigimg\", text: \"s\"});
                                \$(\"#autocomplete-result\").append(div);

                            }
                        }
                    });
                }

                jQuery(\"#autocomplete-result\").on(\"click\", function(e) {
                    var \$clicked = \$(e.target);
                    //var \$name = \$clicked.parent().find('.name').html();
                    //alert(\$name);
                    var \$name = \$clicked.find('.name').html();
                    if (typeof \$name == 'undefined') {
                        \$name = \$clicked.parent().find('.name').html();
                    }
                    //alert(\$name);
                    var decoded = \$(\"<div/>\").html(\$name).text();
                    \$('#searchh').val(decoded);
                });
                jQuery(document).on(\"click\", function(e) {
                    var \$clicked = \$(e.target);
                    if (!\$clicked.hasClass(\"search\")) {
                        jQuery(\"#autocomplete-result\").fadeOut();
                    }
                });
                \$('#searchh').click(function() {
                    jQuery(\"#autocomplete-result\").fadeIn();
                });

                
            });
        </script>

        <script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places\"></script>

        ";
        // line 311
        echo "        <script>
            \$(function() {
                var geocoder = new google.maps.Geocoder();
                var address = \" Cluj Napoca, Romania\";
                geocoder.geocode({'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            for (var i = 0; i < results.length; i++) {                               
                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                \$(\"#search-lat\").val(latitude);
                                \$(\"#search-lng\").val(longitude);
                                

                            }
                        }
                    });
                //getAddress(\"traian\");
                latitude = \$(\"#search-lat\").val();
                longitude = \$(\"#search-lng\").val();
                //console.log(address);
               //console.log(\"11lat: \" + latitude + \" long: \" + longitude);
            });
            
            function initialize_index() {
                    latitude = \$(\"#search-lat\").val();
                    longitude = \$(\"#search-lng\").val();
                    var pyrmont = new google.maps.LatLng(latitude, longitude);
                    map = new google.maps.Map(document.getElementById('map-canvas'), {
                        center: pyrmont,
                        zoom: 15
                    });
                    var request = {
                        location: pyrmont,
                        radius: 500,
                        types: ['store']
                    };
                    infowindow = new google.maps.InfoWindow();
                    var service = new google.maps.places.PlacesService(map);
                    service.nearbySearch(request, callback_index);

                    //event.preventDefault();
                //})
            }

            function callback_index(results, status, pagination) {
                //alert(\"call\");
                var result = [];
                var name;
                var extId;
                var detref;
                var rating;
                var tags;
                var address;
                if (status != google.maps.places.PlacesServiceStatus.OK) {
                    return;
                } else {
                    for (var i = 0; i < results.length; i++) {
                        name = results[i].name;
                        extId = results[i].id;
                        detref = results[i].reference;
                        tags = results[i].types;
                        address = results[i].vicinity;
                        if (typeof results[i].rating !== 'undefined') {
                            rating = results[i].rating;
                            //console.log(rating);
                        } else {
                            rating = \"\";
                        }
                        //console.log(i + \" name: \" + name);
                        result[i] = {\"name\": name, \"extId\": extId, \"detref\": detref, \"rating\": rating, \"tags\": tags, \"address\": address};
                    }
                    var jsonString = JSON.stringify(result);
                    //alert(result[0][\"extId\"]);
                    \$.ajax({
                        type: \"POST\",
                        url: \"homepageplaces\",
                        data: 'search=' + jsonString,
                        cache: false,
                        success: function(html)
                        {
                            //\$(\"#autocomplete-result\").html(html).show();
                            //\$( \".search\" ).removeClass( \"ui-autocomplete-loading\" );
                        }
                    });
                    if (pagination.hasNextPage) {
                        //alert(\"pag\");
                        //pagination.nextPage();
                    }
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize_index);
        </script>


        ";
        // line 406
        echo "
        
        <script>
            var map;
            var infowindow;
            var geocoder2 = new google.maps.Geocoder();
            var address = \"cluj napoca\";
            var latitude;
            var longitude;

            function initialize() {
                //\$(\"#sbutton\").on('click', function(event) {
                \$(\"#autocomplete-result\").on('click', function(event) {
                    event.preventDefault();
                    address = \$(\"#searchh\").val();
                    latitude = \$(\"#search-lat\").val();
                    longitude = \$(\"#search-lng\").val();
                    console.log(address);
                    console.log(\"lat: \" + latitude + \" long: \" + longitude);
                    var pyrmont = new google.maps.LatLng(latitude, longitude);
                    //console.log(\"Geocode: \" + latitude);
                    map = new google.maps.Map(document.getElementById('map-canvas'), {
                        center: pyrmont,
                        zoom: 15
                    });
                    var request = {
                        location: pyrmont,
                        radius: 500,
                        types: ['store']
                    };
                    infowindow = new google.maps.InfoWindow();
                    var service = new google.maps.places.PlacesService(map);
                    service.nearbySearch(request, callback);

                    //event.preventDefault();
                })
            }

            function callback(results, status, pagination) {
                //alert(\"call\");
                var result = [];
                var name;
                var extId;
                var detref;
                var rating;
                if (status != google.maps.places.PlacesServiceStatus.OK) {
                    return;
                } else {
                    for (var i = 0; i < results.length; i++) {
                        name = results[i].name;
                        extId = results[i].id;
                        detref = results[i].reference;
                        if (typeof results[i].rating !== 'undefined') {
                            rating = results[i].rating;
                            console.log(rating);
                        } else {
                            rating = \"\";
                        }
                        console.log(i + \" name: \" + name);
                        result[i] = {\"name\": name, \"extId\": extId, \"detref\": detref, \"rating\": rating};
                    }
                    var jsonString = JSON.stringify(result);
                    //alert(result[0][\"extId\"]);
                    \$.ajax({
                        type: \"POST\",
                        url: \"insertplaces\",
                        data: 'search=' + jsonString + '&address=' + address,
                        cache: false,
                        success: function(html)
                        {
                            //\$(\"#autocomplete-result\").html(html).show();
                            //\$( \".search\" ).removeClass( \"ui-autocomplete-loading\" );
                        }
                    });
                    for (var i = 0; i < results.length; i++) {
                        //createMarker(results[i]);
                    }
                    if (pagination.hasNextPage) {
                        pagination.nextPage();
                    }
                }
            }
            
            function placeDetails(reference) {
                var request = {
                    reference: 'CnRkAAAAGnBVNFDeQoOQHzgdOpOqJNV7K9-c5IQrWFUYD9TNhUmz5-aHhfqyKH0zmAcUlkqVCrpaKcV8ZjGQKzB6GXxtzUYcP-muHafGsmW-1CwjTPBCmK43AZpAwW0FRtQDQADj3H2bzwwHVIXlQAiccm7r4xIQmjt_Oqm2FejWpBxLWs3L_RoUbharABi5FMnKnzmRL2TGju6UA4k'
                };

                service = new google.maps.places.PlacesService(map);
                service.getDetails(request, callback);

                function callback(place, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        createMarker(place);
                    }
                }
            }
            function createMarker(place) {
                var result = [];
                var name = place.name;
                var extId = place.id;
                var detref = place.reference;
                //alert(name);
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(place.name);
                    infowindow.open(map, this);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        </script>


        <!-- Social sign-in plugin -->
        <script type=\"text/javascript\">
            (function() {
                if (typeof window.janrain !== 'object')
                    window.janrain = {};
                if (typeof window.janrain.settings !== 'object')
                    window.janrain.settings = {};

                janrain.settings.tokenUrl = 'http://proiecte";
        // line 534
        echo $this->env->getExtension('routing')->getPath("testToken");
        echo "';
                function isReady() {
                    janrain.ready = true;
                }
                ;
                if (document.addEventListener) {
                    document.addEventListener(\"DOMContentLoaded\", isReady, false);
                } else {
                    window.attachEvent('onload', isReady);
                }

                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.id = 'janrainAuthWidget';

                if (document.location.protocol === 'https:') {
                    e.src = 'https://rpxnow.com/js/lib/placeapp/engage.js';
                } else {
                    e.src = 'http://widget-cdn.rpxnow.com/js/lib/placeapp/engage.js';
                }

                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(e, s);
            })();
        </script>

        ";
        // line 560
        $this->displayBlock('javascript', $context, $blocks);
        // line 563
        echo "    </body>
</html>

                            ";
        // line 567
        echo "                                ";
        if (array_key_exists("userIp", $context)) {
            // line 568
            echo "<p>Adddr: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "userIp"), "html", null, true);
            echo ".</p>
                                ";
        }
        // line 570
        echo "
                                ";
        // line 571
        if (array_key_exists("userSiteHits", $context)) {
            // line 572
            echo "<p>You visit this site <b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "userSiteHits"), "html", null, true);
            echo "</b> time(s).</p>
                                ";
        }
        // line 574
        echo "
                                ";
        // line 575
        if (array_key_exists("browserName", $context)) {
            // line 576
            echo "                                    ";
            if (array_key_exists("browserVers", $context)) {
                // line 577
                echo "<p>Browser Name: ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "browserName")), "html", null, true);
                echo " <b>v.</b> ";
                echo twig_escape_filter($this->env, $this->getContext($context, "browserVers"), "html", null, true);
                echo "</p>
                                    ";
            }
            // line 579
            echo "                                ";
        }
        // line 580
        echo "
                                ";
        // line 581
        if (array_key_exists("allTimeUsers", $context)) {
            // line 582
            echo "<p>Trafic: <b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "allTimeUsers"), "html", null, true);
            echo "</b> unique users all time.</p>
                                ";
        }
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "  ";
    }

    // line 22
    public function block_css($context, array $blocks = array())
    {
        echo " ";
    }

    // line 31
    public function block_navigation($context, array $blocks = array())
    {
        // line 32
        echo "                <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                    <!-- Navbar stuff container (.container - align center) -->
                    <div class=\"container\">
                        <!-- Navbar -->
                        <div class=\"navbar-header\">
                            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                            </button>
                            <span class=\"navbar-brand logo-header\">Places App</span>  
                            ";
        // line 47
        echo "                        </div>

                        <!-- Navbar collapse -->
                        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                <li id=\"li-home\"><a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getUrl("index");
        echo "\" title=\"Home\"><span class=\"glyphicon glyphicon-home icon-font-size-smalll\"></span></a></li>

                                <!-- Dropdown menu -->
                                <li id=\"li-dropdown\" class=\"dropdown\">
                                    ";
        // line 56
        if ((array_key_exists("userName", $context) && (!twig_test_empty($this->getContext($context, "userName"))))) {
            // line 57
            echo "                                        ";
            // line 58
            echo "                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\"><span class=\"glyphicon glyphicon-user icon-font-size-smalll\"></span>     ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "userName")), "html", null, true);
            echo "  <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">

                                            ";
            // line 61
            if ((array_key_exists("socialLogged", $context) && (!twig_test_empty($this->getContext($context, "socialLogged"))))) {
                // line 62
                echo "                                        <li id=\"li-admin\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("index");
                echo "\">Admin area</a></li>
                                            ";
            } else {
                // line 64
                echo "                                        <li id=\"li-admin\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_start");
                echo "\">Admin area</a></li>
                                            ";
            }
            // line 66
            echo "
                                        <li id=\"li-about\"><a href=\"";
            // line 67
            echo $this->env->getExtension('routing')->getPath("about");
            echo "\">About</a></li>
                                        <li><a href=\"#\">Facebook</a></li>
                                        <li><a href=\"#\">Google+</a></li>
                                        <li><a href=\"#\">Twitter</a></li>
                                        <li><a href=\"#\">Id: ";
            // line 71
            echo twig_escape_filter($this->env, $this->getContext($context, "userId"), "html", null, true);
            echo "</a></li>

                                            ";
            // line 73
            if ((array_key_exists("socialLogged", $context) && (!twig_test_empty($this->getContext($context, "socialLogged"))))) {
                // line 74
                echo "                                        <li id=\"li-logout\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("clear");
                echo "\"><span class=\"glyphicon glyphicon-log-out\"></span> Sign Out</a></li>
                                            ";
            } else {
                // line 76
                echo "                                        <li id=\"li-logout\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("logout");
                echo "\"><span class=\"glyphicon glyphicon-log-out\"></span> Sign Out</a></li>
                                            ";
            }
            // line 78
            echo "
                                    </ul>
                                    ";
        } else {
            // line 81
            echo "                                        ";
            // line 82
            echo "                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\">Drowdown   <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">
                                        <li id=\"li-about\"><a href=\"";
            // line 84
            echo $this->env->getExtension('routing')->getPath("about");
            echo "\">About</a></li>
                                        <li id=\"li-login\"><a href=\"";
            // line 85
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><span class=\"glyphicon glyphicon-log-in\"></span> Sign In</a></li>
                                        <li><a href=\"#\">Google+</a></li>
                                        <li><a href=\"#\">Facebook</a></li>
                                        <li><a href=\"#\">Twitter</a></li>
                                    </ul>
                                    ";
        }
        // line 91
        echo "                                </li>
                            </ul>

                            <!-- Search form -->
                            <form class=\"navbar-form navbar-left\" action=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("demoSearch");
        echo "\" method=\"post\">
                                <div class=\"form-group\">
                                    <input id=\"searchh\" class=\"search typeahead1 form-control\" type=\"text\" name=\"input\" placeholder=\"Search..\" size=\"47\" autocomplete=\"off\" />
                                    <input id=\"search-lat\" type=\"hidden\" name=\"input-lat\" />
                                    <input id=\"search-lng\" type=\"hidden\" name=\"input-lng\" />
                                </div>
                                <button id=\"sbutton\" class=\"btn btn-default\" type=\"submit\"><span class=\"glyphicon glyphicon-search\"></span></button>
                                <div id=\"autocomplete-result\">                                                                    
                                </div>
                            </form>  

                        </div><!-- /navbar-collapse -->

                    </div> <!-- /container -->
                </nav><!-- /navbar -->
                ";
    }

    // line 118
    public function block_flashBag($context, array $blocks = array())
    {
        echo "  ";
    }

    // line 122
    public function block_body($context, array $blocks = array())
    {
        echo " ";
    }

    // line 126
    public function block_aside($context, array $blocks = array())
    {
        echo " ";
    }

    // line 135
    public function block_footer($context, array $blocks = array())
    {
        // line 136
        echo "                    <div class=\"row\">
                        <!-- ex,sm,md,lg -->
                        <div class=\"col-xs-12\">
                            <!-- Nested -->
                            <div class=\"visible-xs\">
                                Extra small screens - Phones
                                <p>&copy Penatalog Cluj-Napoca 2013.</p>
                            </div>
                            <div class=\"visible-sm\">
                                Small screens - Tablets
                                <p>&copy Penatalog Cluj-Napoca 2013.</p>
                            </div>
                            <div class=\"visible-md\">
                                Medium screens - Pc,Laptop,Notebook
                                <p>&copy Penatalog Cluj-Napoca 2013.</p>
                            </div>
                            <div class=\"visible-lg\">
                                Large screens - Pc
                                <p>&copy Penatalog Cluj-Napoca 2013.</p>
                            </div>
                        </div>
                    </div>
                    ";
    }

    // line 560
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
            ";
        // line 562
        echo "        ";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  805 => 562,  800 => 560,  774 => 136,  771 => 135,  765 => 126,  759 => 122,  753 => 118,  733 => 95,  727 => 91,  718 => 85,  714 => 84,  710 => 82,  708 => 81,  703 => 78,  697 => 76,  691 => 74,  689 => 73,  684 => 71,  677 => 67,  674 => 66,  668 => 64,  662 => 62,  660 => 61,  653 => 58,  651 => 57,  649 => 56,  642 => 52,  635 => 47,  621 => 32,  618 => 31,  612 => 22,  606 => 8,  598 => 582,  596 => 581,  593 => 580,  590 => 579,  582 => 577,  579 => 576,  577 => 575,  574 => 574,  568 => 572,  566 => 571,  563 => 570,  557 => 568,  554 => 567,  549 => 563,  547 => 560,  518 => 534,  388 => 406,  292 => 311,  164 => 184,  159 => 178,  154 => 175,  150 => 174,  144 => 171,  140 => 170,  134 => 167,  130 => 166,  121 => 159,  119 => 135,  109 => 127,  107 => 126,  102 => 123,  100 => 122,  95 => 119,  93 => 118,  84 => 111,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 13,  45 => 12,  38 => 8,  32 => 5,  27 => 2,);
    }
}
