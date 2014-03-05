<?php

/* BundlePlacesBundle:Page:index.html.twig */
class __TwigTemplate_78ed62e73680c5d144bf6113dc63fde0bfcdbafda9eebe8979d11f06ea435fe4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundlePlacesBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'session' => array($this, 'block_session'),
            'body' => array($this, 'block_body'),
            'aside' => array($this, 'block_aside'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundlePlacesBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $context["placeAddress"] = "";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Demo ";
    }

    // line 6
    public function block_session($context, array $blocks = array())
    {
        // line 7
        echo "<!-- Temp. vars. in flashbag -->
    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "session_test"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 9
            echo "            ";
            echo $this->getContext($context, "flashMessage");
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "<!-- Place container -->
<div id=\"place-container\">
    <article class=\"row\" style=\"border:0px solid black;\">
        <!-- Tabs content -->
        <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\" style=\"padding:0px;\">
            <div class=\"tabable\">
                <ul class=\"nav nav-tabs\">
                    <li><a href=\"#pane1\" data-toggle=\"tab\">Details</a></li>
                    <li class=\"active\"><a href=\"#pane2\" data-toggle=\"tab\">Photos</a></li>
                    <li><a href=\"#pane3\" data-toggle=\"tab\">Ratings</a></li>
                    <li><a href=\"#pane4\" data-toggle=\"tab\">Reviews</a></li>
                    <li><a href=\"#pane5\" data-toggle=\"tab\">Promotions</a></li>
                </ul>
                <div class=\"tab-content\" style=\"padding:0px;border: 0px\">
                ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeDetail"));
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
            // line 32
            echo "                ";
            $context["placeAddress"] = $this->getAttribute($this->getContext($context, "place"), "placevicinity");
            // line 33
            echo "                    <div id=\"pane1\" class=\"tab-pane\">
                    ";
            // line 35
            echo "                        <input id=\"name\" type=\"hidden\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "\" />
                        <input id=\"lat\" type=\"hidden\" value=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelat"), "html", null, true);
            echo "\" />
                        <input id=\"lng\" type=\"hidden\" value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelng"), "html", null, true);
            echo "\" />
                        <input id=\"placeId\" type=\"hidden\" value=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeid"), "html", null, true);
            echo "\" />
                        <input id=\"placeAddress\" type=\"hidden\" value=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placevicinity"), "html", null, true);
            echo "\" />

                        <h1>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                    ";
            // line 42
            if ((!twig_test_empty($this->getContext($context, "placePhotos")))) {
                // line 43
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 44
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
                    echo "\" width=\"160\" height=\"140\"/>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                echo "                    ";
            } else {
                // line 47
                echo "                        <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\"></span>
                    ";
            }
            // line 49
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeurl"), "html", null, true);
            echo "\" target=\"_blank\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeicon"), "html", null, true);
            echo "\"/></a>
                        <p><a href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_indexShowPlace", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename")), "html", null, true);
            echo "</a></p>
                        <p><a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_placeDetails", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">New - ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename")), "html", null, true);
            echo "</a></p>

                    ";
            // line 54
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placephonenumber")) > 1)) {
                // line 55
                echo "                        <p><b>Phone: </b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placephonenumber"), "html", null, true);
                echo "</p>
                    ";
            } else {
                // line 57
                echo "                        <p><b>Phone: </b>number not avaiable.</p>
                    ";
            }
            // line 58
            echo "   
                        <p><b>Type: </b>type - recode querys</p>
                        <p><b>Address: </b>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placevicinity"), "html", null, true);
            echo "</p>

                    ";
            // line 62
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placerating")) != 0)) {
                // line 63
                echo "                        <p><b>Ratings: <big><font color=\"green\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placerating"), "html", null, true);
                echo "</font></b></big> / 5 points.</p>
                    ";
            } else {
                // line 65
                echo "                        <p><b>Ratings: </b> Ratings are not available for this place.</p>
                    ";
            }
            // line 67
            echo "                        <p><b>Geo Location: </b><u>Lat. </u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelat"), "html", null, true);
            echo ". <u>Lng.</u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelng"), "html", null, true);
            echo ".</p>  

                    ";
            // line 69
            if ($this->getAttribute($this->getContext($context, "place"), "placeWebSite")) {
                // line 70
                echo "                        <p><b>WebSite: </b> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeWebSite"), "html", null, true);
                echo "\" target=\"_blank\"/>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeWebSite"), "html", null, true);
                echo "</a></p>
                    ";
            } else {
                // line 72
                echo "                        <p><b>WebSite: </b>website not avaiable</p>    
                    ";
            }
            // line 74
            echo "                    </div><!-- /.panel1 -->

                    <div id=\"pane2\" class=\"tab-pane active\">
                        <h1>";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>

                        <!-- SlideShow -->
                    ";
            // line 80
            if ((!twig_test_empty($this->getContext($context, "placeAllPhotos")))) {
                // line 81
                echo "                        ";
                if ((twig_length_filter($this->env, $this->getContext($context, "placeAllPhotos")) > 1)) {
                    // line 82
                    echo "                        <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
                            <!-- Indicators -->
                            <ol class=\"carousel-indicators\">
                                ";
                    // line 85
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                        // line 86
                        echo "                                    ";
                        if (($this->getContext($context, "key") == 0)) {
                            echo " 
                                <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            // line 87
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\" class=\"active\"></li>
                                    ";
                        } else {
                            // line 89
                            echo "                                <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\"></li>
                                    ";
                        }
                        // line 91
                        echo "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 92
                    echo "                            </ol>

                            <!-- Wrapper for slide -->
                            <div class=\"carousel-inner\">
                            ";
                    // line 96
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["photo"]) {
                        // line 97
                        echo "                                ";
                        if (($this->getContext($context, "key") == 0)) {
                            // line 98
                            echo "                                <div class=\"item active\" style=\"border:0px solid blue; height:350px;width:100%\">
                                    <img src=\"";
                            // line 99
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        ";
                            // line 101
                            echo "                                    <div class=\"carousel-caption\">
                                        Slide ";
                            // line 102
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                    </div>
                                </div>
                                ";
                        } else {
                            // line 106
                            echo "                                <div class=\"item\" style=\"border:0px solid blue;height:350px;width:100%\">
                                    <img src=\"";
                            // line 107
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        ";
                            // line 109
                            echo "                                    <div class=\"carousel-caption\">
                                        Slide ";
                            // line 110
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                    </div>
                                </div>
                                ";
                        }
                        // line 113
                        echo "    
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['photo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 115
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
                    // line 126
                    echo "                            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                    foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                        echo " 
                        <div class=\"item\" style=\"border:0px solid blue; width:100%;height:350px;\" >
                            <a href=\"";
                        // line 128
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                        echo "\" target=\"_blank\"><img src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                        echo "\" width=\"100%\" height=\"100%\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
                        echo "\"/></a>
                        </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 131
                    echo "                        ";
                }
                // line 132
                echo "                    ";
            } else {
                // line 133
                echo "                        <center>
                            ";
                // line 135
                echo "                            <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\" title=\"Image not found !\"></span>
                        </center>
                    ";
            }
            // line 137
            echo "           
                    </div><!-- /.panel2 -->

                    <div id=\"pane3\" class=\"tab-pane\">
                        <div id=\"voteSection\"> 
                            <h1>";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                        ";
            // line 143
            if (array_key_exists("bool", $context)) {
                echo " ";
                // line 144
                echo "                            <p><b>Total votes: </b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotesAllTime"), "html", null, true);
                echo " votes</p>
                            <p><b>Total votes for this place: </b>";
                // line 145
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotes"), "html", null, true);
                echo " votes</p>
                            <p><b>Points / Stars:</b> <font color=\"green\"><big>";
                // line 146
                echo twig_escape_filter($this->env, $this->getContext($context, "usersRating"), "html", null, true);
                echo "</big></font></p>

                            ";
                // line 148
                if (($this->getContext($context, "usersRating") < 2)) {
                    // line 149
                    echo "                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            ";
                } elseif (($this->getContext($context, "usersRating") < 3)) {
                    // line 155
                    echo "                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            ";
                } elseif (($this->getContext($context, "usersRating") < 4)) {
                    // line 161
                    echo "                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            ";
                } elseif (($this->getContext($context, "usersRating") < 5)) {
                    // line 167
                    echo "                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                            <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                            ";
                } elseif (($this->getContext($context, "usersRating") == 5)) {
                    // line 173
                    echo "                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span> 
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span> 
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span> 
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span> 
                            <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span> 
                            ";
                }
                // line 179
                echo "                        ";
            } else {
                echo " ";
                // line 180
                echo "                            <p>Select a star</p>
                            <form>
                                <br />1<input type=\"radio\" name=\"vote\" value=\"1\" onclick=\"setVote(this.value, '";
                // line 182
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\")>
                                2<input type=\"radio\" name=\"vote\" value=\"2\" onclick=\"setVote(this.value, '";
                // line 183
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                3<input type=\"radio\" name=\"vote\" value=\"3\" onclick=\"setVote(this.value, '";
                // line 184
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                4<input type=\"radio\" name=\"vote\" value=\"4\" onclick=\"setVote(this.value, '";
                // line 185
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                5<input type=\"radio\" name=\"vote\" value=\"5\" onclick=\"setVote(this.value, '";
                // line 186
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                            </form>
                        ";
            }
            // line 189
            echo "                        </div><!-- /.voteSection -->
                    </div><!-- /.panel3 -->

                    <div id=\"pane4\" class=\"tab-pane\">
                        <h1>";
            // line 193
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                     ";
            // line 194
            $this->env->loadTemplate("BundlePlacesBundle:Reviews:index.html.twig")->display(array_merge($context, array("reviews" => $this->getContext($context, "reviews"))));
            // line 195
            echo "                    </div><!-- /.panel4 -->

                    <div id=\"pane5\" class=\"tab-pane\">
                        <h1>Promotions</h1>
                        <p>promotions</p>
                    </div><!-- /.panel4 -->
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
        // line 202
        echo "                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </div><!-- /.tabs-div -->
        <!-- /Tabs content  -->
    </article>   

    <!-- Map and directions (nested) -->
    <article class=\"row\" style=\"border:0px solid red;\">
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
        // line 229
        echo "
                    ";
        // line 231
        echo "                    <form action=\"#\" onsubmit=\"setDirections(this.from.value, this.to.value);
                            return false;\">
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"fromAddress\" name=\"from\" value=\"Cluj-Napoca,Romania\" placeholder=\"location address\"/>
                        <a id=\"from-link\" href=\"#\">Get current position</a><img class=\"loader\" style=\"display:none;padding-left: 5px;\"src=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/load.gif"), "html", null, true);
        echo "\"/>
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"toAddress\" name=\"to\" value=\"";
        // line 235
        echo "\" placeholder=\"destination address\"/>                               
                        <button class=\"btn btn-default\" type=\"submit\" style=\"width:100px;margin-top: 2px;\"><img src=\"";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/icons/arrow_branch.png"), "html", null, true);
        echo "\" title=\"Get Directions\" alt=\"accept\" /></button>  <img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/icons/car.png"), "html", null, true);
        echo "\" title=\"By car\" alt=\"accept\" />
                    </form>
                </div><!-- /.form-group -->

                <div id=\"directions\" style=\"height: 310px;overflow: scroll;overflow-x: hidden;padding-top: 0px;padding-right: 3px;\" class=\"scroll-style11\">
                    <p><small>Directions</small></p>
                </div>
            </div> 
        </div><!-- /.nested cols -->  
    </article>
</div><!-- /#place-container -->

";
    }

    // line 251
    public function block_aside($context, array $blocks = array())
    {
        // line 252
        echo "    ";
        if (array_key_exists("input", $context)) {
            // line 253
            echo "    
<p class=\"results-header-msg\">
    Total results: ";
            // line 255
            echo twig_escape_filter($this->env, $this->getContext($context, "totalResults"), "html", null, true);
            echo "
    <br/>
    Search value: ";
            // line 257
            echo twig_escape_filter($this->env, $this->getContext($context, "input"), "html", null, true);
            echo "
</p>
<div class=\"row app-results-wrapper\"> 
    <div class=\"app-aside-div\">
        ";
            // line 261
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "places"));
            foreach ($context['_seq'] as $context["key"] => $context["place"]) {
                // line 262
                echo "            ";
                // line 263
                echo "            ";
                $context["active"] = ((($this->getContext($context, "key") == 0)) ? ("active") : (""));
                // line 264
                echo "        <a id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
                echo "\" class=\"list-group-item ";
                echo twig_escape_filter($this->env, $this->getContext($context, "active"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("renderPlace", array("param" => $this->getAttribute($this->getContext($context, "place"), "slug"))), "html", null, true);
                echo "\">
            <p>";
                // line 265
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
                echo "</p>
            <p>
                    ";
                // line 267
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating")) > 1)) {
                    // line 268
                    echo "                    ";
                    if (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 2)) {
                        // line 269
                        echo "                <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 270
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 271
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 272
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 273
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                ";
                    } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 3)) {
                        // line 275
                        echo "                <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 276
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 277
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 278
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 279
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                ";
                    } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 4)) {
                        // line 281
                        echo "                <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 282
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 283
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 284
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 285
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                ";
                    } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 5)) {
                        // line 287
                        echo "                <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 288
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 289
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 290
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 291
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                ";
                    } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") == 5)) {
                        // line 293
                        echo "                <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 294
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 295
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 296
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                        // line 297
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                ";
                    }
                    // line 299
                    echo "             ";
                } else {
                    // line 300
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 301
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 302
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 303
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />  
                <img src=\"";
                    // line 304
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />  
             ";
                }
                // line 306
                echo "            </p>
        </a>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['place'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 309
            echo "    ";
        } else {
            // line 310
            echo "        <p class=\"results-header-msg\" style=\"padding-left:10px;\">
            Invalid search input
        </p>
    ";
        }
        // line 314
        echo "    </div>
    
</div>
<div id=\"gif-loader\" style=\"display:none;width:100%\">
            <center><img src=\"";
        // line 318
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/load.gif"), "html", null, true);
        echo "\"></center>
        </div>
";
    }

    // line 327
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
<script type=\"text/javascript\">
    \$(document).ready(function() {
        //var i = 1;
        var array = \"\"; 
         // store current places in list
                \$('.app-aside-div').children('a').each(function(){
                    var arrHref = ( \$(this).attr('id') );
                    array+=arrHref+',';
                });
        \$('.app-results-wrapper').scroll(function() {
            if (\$(this)[0].scrollHeight - \$(this).scrollTop() == \$(this).outerHeight()) {
                \$.ajax({
                    url: \"/PlacesProject/web/app_dev.php/morePlacesRequest\",
                    type: \"POST\",
                    data: 'input=1643',
                    success: function(data) {
//                alert(data);
                        if (data) {
                            \$('#gif-loader').hide();
                            console.log(data);
                            \$('.app-aside-div').append(data);
                            //\$('#gif-loader').hide();
                        }
                    },
                    beforeSend: function() {
                        \$('#gif-loader').show();
                    },
                    complete: function() {
                        \$('#gif-loader').hide();
                    }
                    
                });
";
        // line 361
        echo "            }
        });
    });
</script>
    ";
        // line 366
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/renderPlace.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 367
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/processingVote.js"), "html", null, true);
        echo "\"></script>

<script type=\"text/javascript\" src=\"";
        // line 369
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/google-map-get-directions.js"), "html", null, true);
        echo "\"></script>
<script src=\" http://maps.google.com/?file=api&amp;v=2&amp;key=AIzaSyBGEQqVNDD_xkI7j4viU-5qMa-SYUOX_6g\" type=\"text/javascript\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Page:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  835 => 369,  830 => 367,  825 => 366,  819 => 361,  782 => 327,  775 => 318,  769 => 314,  763 => 310,  760 => 309,  752 => 306,  747 => 304,  743 => 303,  739 => 302,  735 => 301,  730 => 300,  727 => 299,  722 => 297,  718 => 296,  714 => 295,  710 => 294,  705 => 293,  700 => 291,  696 => 290,  692 => 289,  688 => 288,  683 => 287,  678 => 285,  674 => 284,  670 => 283,  666 => 282,  661 => 281,  656 => 279,  652 => 278,  648 => 277,  644 => 276,  639 => 275,  634 => 273,  630 => 272,  626 => 271,  622 => 270,  617 => 269,  614 => 268,  612 => 267,  607 => 265,  598 => 264,  595 => 263,  593 => 262,  589 => 261,  582 => 257,  577 => 255,  573 => 253,  570 => 252,  567 => 251,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 167,  428 => 161,  420 => 155,  412 => 149,  410 => 148,  405 => 146,  401 => 145,  396 => 144,  393 => 143,  389 => 142,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 106,  303 => 102,  300 => 101,  296 => 99,  293 => 98,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 87,  258 => 86,  254 => 85,  249 => 82,  246 => 81,  244 => 80,  238 => 77,  233 => 74,  229 => 72,  221 => 70,  219 => 69,  211 => 67,  207 => 65,  201 => 63,  199 => 62,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 42,  125 => 41,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 33,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 14,);
    }
}
