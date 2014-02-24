<?php

/* BundleProjectBundle:Places:renderPlace.html.twig */
class __TwigTemplate_acaed97caf7b5334690ec380dc8dd4b00984a7f4d735896b7fbaca2259baccfc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["placeAddress"] = "";
        // line 4
        echo "<article class=\"row\" style=\"border:0px solid black;\">
<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\" style=\"padding:0px;\">
        <div class=\"tabbable\">
            <ul class=\"nav nav-tabs\">
              <li><a href=\"#pane1\" data-toggle=\"tab\">Details</a></li>
              <li class=\"active\"><a href=\"#pane2\" data-toggle=\"tab\">Photos</a></li>
              <li><a href=\"#pane3\" data-toggle=\"tab\">Ratings</a></li>
              <li><a href=\"#pane4\" data-toggle=\"tab\">Reviews</a></li>
              <li><a href=\"#pane5\" data-toggle=\"tab\">Promotions</a></li>
            </ul>
            <div class=\"tab-content\" style=\"padding:0px; border:0px\">
                ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeDetails"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["place"]) {
            // line 16
            echo "                    ";
            $context["placeAddress"] = $this->getAttribute($this->getContext($context, "place"), "placeVicinity");
            // line 17
            echo "                <div id=\"pane1\" class=\"tab-pane\">
                        <input id=\"name\" type=\"hidden\" value=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "\" />
                        <input id=\"lat\" type=\"hidden\" value=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeLat"), "html", null, true);
            echo "\" />
                        <input id=\"lng\" type=\"hidden\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeLng"), "html", null, true);
            echo "\" />
                        <input id=\"placeId\" type=\"hidden\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
            echo "\" />
                        <input id=\"ip\" type=\"hidden\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getContext($context, "ip"), "html", null, true);
            echo "\" />
                        
                        <h1>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</h1>
                        <p>Place id: ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
            echo "</p>
                        ";
            // line 26
            if ((!twig_test_empty($this->getContext($context, "placePhotos")))) {
                // line 27
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 28
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
                    echo "\" width=\"160\" height=\"140\"/>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "                        ";
            } else {
                // line 31
                echo "                              <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\"></span>
                        ";
            }
            // line 33
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeUrl"), "html", null, true);
            echo "\" target=\"_blank\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "\">
                        <img src=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeIcon"), "html", null, true);
            echo "\"/></a>
                        <p><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_indexShowPlace", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName")), "html", null, true);
            echo "</a></p>
                        <p><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_placeDetails", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">New - ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName")), "html", null, true);
            echo "</a></p>

                        ";
            // line 38
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placePhonenumber")) > 1)) {
                // line 39
                echo "                            <p><b>Phone: </b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placePhonenumber"), "html", null, true);
                echo "</p>
                        ";
            } else {
                // line 41
                echo "                            <p><b>Phone: </b>number not avaiable.</p>
                        ";
            }
            // line 43
            echo "
                        <p><b>Type: </b>type - recode querys</p>
                        <p><b>Address: </b>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeVicinity"), "html", null, true);
            echo "</p>

                        ";
            // line 47
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating")) != 0)) {
                // line 48
                echo "                            <p><b>Ratings: <big><font color=\"green\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating"), "html", null, true);
                echo "</font></b></big> / 5 points.</p>
                        ";
            } else {
                // line 50
                echo "                            <p><b>Ratings: </b> Ratings are not available for this place.</p>
                        ";
            }
            // line 52
            echo "                        <p><b>Geo Location: </b><u>Lat. </u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeLat"), "html", null, true);
            echo ". <u>Lng.</u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeLng"), "html", null, true);
            echo ".</p>  

                        ";
            // line 54
            if ($this->getAttribute($this->getContext($context, "place"), "placeWebsite")) {
                // line 55
                echo "                            <p><b>WebSite: </b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeWebsite"), "html", null, true);
                echo "</p>
                        ";
            } else {
                // line 57
                echo "                            <p><b>WebSite: </b>website not avaiable</p>    
                        ";
            }
            // line 59
            echo "                </div><!-- /.panel1 -->
                
                <!-- Photos section -->
                <div id=\"pane2\" class=\"tab-pane active\">
                    <h1>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</h1>
                    <!-- SlideShow -->
                    ";
            // line 65
            if ((!twig_test_empty($this->getContext($context, "placeAllPhotos")))) {
                // line 66
                echo "                        ";
                if ((twig_length_filter($this->env, $this->getContext($context, "placeAllPhotos")) > 1)) {
                    // line 67
                    echo "                            <div id=\"carousel-example-generic\" class=\"carousel slide\">
                            <!-- Indicators -->
                            <ol class=\"carousel-indicators\">
                                ";
                    // line 70
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                        // line 71
                        echo "                                    ";
                        if (($this->getContext($context, "key") == 0)) {
                            // line 72
                            echo "                                        <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\" class=\"active\"></li>
                                    ";
                        } else {
                            // line 74
                            echo "                                         <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\"></li>
                                    ";
                        }
                        // line 76
                        echo "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "                            </ol>

                            <!-- Wrapper for slides -->
                            <div class=\"carousel-inner\">
                            ";
                    // line 81
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["photo"]) {
                        // line 82
                        echo "                                ";
                        if (($this->getContext($context, "key") == 0)) {
                            // line 83
                            echo "                                    <div class=\"item active\" style=\"border:0px solid blue; height: 350px; width:100%\">
                                    <img src=\"";
                            // line 84
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        <div class=\"carousel-caption\">
                                            Slide ";
                            // line 86
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                        </div>
                                    </div>
                                ";
                        } else {
                            // line 90
                            echo "                                    <div class=\"item\" style=\"border:0px solid blue; height: 350px; width:100%\">
                                        <img src=\"";
                            // line 91
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        ";
                            // line 93
                            echo "                                        <div class=\"carousel-caption\">
                                            Slide ";
                            // line 94
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                        </div>
                                    </div>
                                ";
                        }
                        // line 98
                        echo "                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['photo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 99
                    echo "                            </div><!-- /carousel-inner -->

                            <!-- Controls -->
                            <a class=\"left carousel-control\" href=\"#carousel-example-generic\" data-slide=\"prev\">
                                <span class=\"glyphicon glyphicon-chevron-left\"></span>
                            </a>
                            <a class=\"right carousel-control\" href=\"#carousel-example-generic\" data-slide=\"next\">
                                <span class=\"glyphicon glyphicon-chevron-right\"></span>
                            </a>
                        </div><!-- /carousel-example-generic -->
                        ";
                } else {
                    // line 110
                    echo "                            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                    foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                        // line 111
                        echo "                                <div class=\"item\" style=\"border:0px solid blue; width:100%;height:350px;\" >
                                    <a href=\"";
                        // line 112
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                        echo "\" target=\"_blank\"><img src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                        echo "\" width=\"100%\" height=\"100%\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
                        echo "\"/></a>
                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 115
                    echo "                        ";
                }
                // line 116
                echo "                    ";
            } else {
                // line 117
                echo "                        <center>
                            ";
                // line 119
                echo "                            <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\" title=\"Image not found !\"></span>
                        </center>
                    ";
            }
            // line 122
            echo "                </div><!-- /.pane2 -->
                
                <!-- Vote section -->
                <div id=\"pane3\" class=\"tab-pane\">
                    <div id=\"voteSection\"> 
                <h1>";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</h1>
                ";
            // line 128
            if (array_key_exists("bool", $context)) {
                echo " ";
                // line 129
                echo "                    <p><b>Total votes: </b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotesAllTime"), "html", null, true);
                echo " votes</p>
                    <p><b>Total votes for this place: </b>";
                // line 130
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotes"), "html", null, true);
                echo " votes</p>
                    <p><b>Points / Stars:</b> <font color=\"green\"><big>";
                // line 131
                echo twig_escape_filter($this->env, $this->getContext($context, "usersRating"), "html", null, true);
                echo "</big></font></p>

                    ";
                // line 133
                if (($this->getContext($context, "usersRating") < 2)) {
                    // line 134
                    echo "                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                    ";
                } elseif (($this->getContext($context, "usersRating") < 3)) {
                    // line 140
                    echo "                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                    ";
                } elseif (($this->getContext($context, "usersRating") < 4)) {
                    // line 146
                    echo "                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                    ";
                } elseif (($this->getContext($context, "usersRating") < 5)) {
                    // line 152
                    echo "                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                    ";
                } elseif (($this->getContext($context, "usersRating") == 5)) {
                    // line 158
                    echo "                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                        <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                    ";
                }
                // line 164
                echo "                ";
            } else {
                echo " ";
                // line 165
                echo "                <p>Select a star</p>
                    <form>
                        <br />1<input type=\"radio\" name=\"vote\" value=\"1\" onclick=\"setVote(this.value,'";
                // line 167
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                        2<input type=\"radio\" name=\"vote\" value=\"2\" onclick=\"setVote(this.value,'";
                // line 168
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                        3<input type=\"radio\" name=\"vote\" value=\"3\" onclick=\"setVote(this.value,'";
                // line 169
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                        4<input type=\"radio\" name=\"vote\" value=\"4\" onclick=\"setVote(this.value,'";
                // line 170
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                        5<input type=\"radio\" name=\"vote\" value=\"5\" onclick=\"setVote(this.value,'";
                // line 171
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                    </form>
                ";
            }
            // line 174
            echo "                    </div><!-- /.voteSection -->
                </div><!-- /.pane3 -->
                
                <div id=\"pane4\" class=\"tab-pane\">
                    <h1>";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</h1>
                     ";
            // line 179
            $this->env->loadTemplate("BundleProjectBundle:Reviews:index.html.twig")->display(array_merge($context, array("reviews" => $this->getContext($context, "reviews"))));
            // line 180
            echo "                </div><!-- /.panel4 -->
                
                <div id=\"pane5\" class=\"tab-pane\">
                    <h1>Promotions</h1>
                    <p>reviews</p>
                </div><!-- /.panel5 -->
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "<!-- /place details -->    
            </div><!-- /.tab-content -->
        </div><!-- /.tabbable -->
    </div><!-- /.tabs-div -->
    <!-- /Tabs content  -->
    </article>   
    <br />
    
    <!-- Map and directions (nested) -->
    <article class=\"row\" style=\"border:1px solid red;\">
        <div class=\"col-xs-12 col-sm-8 col-md-8 col-lg-8\" style=\"padding:2px;border:0px solid black;margin-bottom: 2px;\">
            <!--col-xs-12 col-sm-8 col-md-8 col-lg-8<br/>-->
            <div id=\"googleMap\" class=\"place-map\"></div>
        </div>
        <div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\" style=\"padding:2px;border:0px solid black;\">
            <!--col-xs-12 col-sm,md,lg-4 <br />-->
            <div class=\"get-directions\">
                <h1>Directions</h1>
                <div class=\"form-group\">
                    ";
        // line 215
        echo "                            
                    ";
        // line 217
        echo "                    <form action=\"#\" onsubmit=\"setDirections(this.from.value, this.to.value); return false;\">
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"fromAddress\" name=\"from\" value=\"Cluj-Napoca,Romania\" placeholder=\"location address\"/>
                        <a id=\"from-link\" href=\"#\">Get current position</a><img class=\"loader\" style=\"display:none;padding-left: 5px;\"src=\"";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/images/load.gif"), "html", null, true);
        echo "\"/>
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"toAddress\" name=\"to\" value=\"";
        // line 220
        echo "\" placeholder=\"destination address\"/>                               
                        <button class=\"btn btn-default\" type=\"submit\" style=\"width:100px;margin-top: 2px;\"><img src=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/images/icons/arrow_branch.png"), "html", null, true);
        echo "\" title=\"Get Directions\" alt=\"accept\" /></button>  <img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/images/icons/car.png"), "html", null, true);
        echo "\" title=\"By car\" alt=\"accept\" />
                    </form>
                </div><!-- /.form-group -->
                
                <div id=\"directions\" style=\"height: 310px;overflow: scroll;overflow-x: hidden;padding-top: 0px;padding-right: 3px;\" class=\"scroll-style11\">
                    <p><small>Directions</small></p>
                </div>
            </div> 
        </div><!-- /.nested cols -->
    </article><!-- /.map-directions-div --> 
    
    <!-- Js to load map and directions -->
    <script type=\"text/javascript\" src=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/google-map-get-directions.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 235
        echo "    ";
        // line 236
        echo "    ";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle:Places:renderPlace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  523 => 236,  521 => 235,  517 => 233,  500 => 221,  497 => 220,  493 => 219,  489 => 217,  486 => 215,  465 => 186,  445 => 180,  443 => 179,  439 => 178,  433 => 174,  427 => 171,  423 => 170,  419 => 169,  415 => 168,  411 => 167,  407 => 165,  403 => 164,  395 => 158,  387 => 152,  379 => 146,  371 => 140,  363 => 134,  361 => 133,  356 => 131,  352 => 130,  347 => 129,  344 => 128,  340 => 127,  333 => 122,  328 => 119,  325 => 117,  322 => 116,  319 => 115,  306 => 112,  303 => 111,  298 => 110,  285 => 99,  279 => 98,  272 => 94,  269 => 93,  265 => 91,  262 => 90,  255 => 86,  250 => 84,  247 => 83,  244 => 82,  240 => 81,  234 => 77,  228 => 76,  222 => 74,  216 => 72,  213 => 71,  209 => 70,  204 => 67,  201 => 66,  199 => 65,  194 => 63,  188 => 59,  184 => 57,  178 => 55,  176 => 54,  168 => 52,  164 => 50,  158 => 48,  156 => 47,  151 => 45,  147 => 43,  143 => 41,  137 => 39,  135 => 38,  128 => 36,  122 => 35,  118 => 34,  111 => 33,  107 => 31,  104 => 30,  93 => 28,  88 => 27,  86 => 26,  82 => 25,  78 => 24,  73 => 22,  69 => 21,  65 => 20,  61 => 19,  57 => 18,  54 => 17,  51 => 16,  34 => 15,  21 => 4,  19 => 3,);
    }
}
