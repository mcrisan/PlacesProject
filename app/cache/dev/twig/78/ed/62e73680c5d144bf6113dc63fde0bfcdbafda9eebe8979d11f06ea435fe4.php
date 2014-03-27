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
                        <input id=\"searchvalue\" type=\"hidden\" value=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getContext($context, "input"), "html", null, true);
            echo "\" />
                        <input id=\"lat\" type=\"hidden\" value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelat"), "html", null, true);
            echo "\" />
                        <input id=\"lng\" type=\"hidden\" value=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelng"), "html", null, true);
            echo "\" />
                        <input id=\"placeId\" type=\"hidden\" value=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeid"), "html", null, true);
            echo "\" />
                        <input id=\"placeAddress\" type=\"hidden\" value=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placevicinity"), "html", null, true);
            echo "\" />

                        <h1>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                    ";
            // line 43
            if ((!twig_test_empty($this->getContext($context, "placePhotos")))) {
                // line 44
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 45
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
                // line 47
                echo "                    ";
            } else {
                // line 48
                echo "                        <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\"></span>
                    ";
            }
            // line 50
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeurl"), "html", null, true);
            echo "\" target=\"_blank\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeicon"), "html", null, true);
            echo "\"/></a>
                        <p><a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_indexShowPlace", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename")), "html", null, true);
            echo "</a></p>
                        <p><a href=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_placeDetails", array("name" => $this->getContext($context, "placeSlug"))), "html", null, true);
            echo "\">New - ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename")), "html", null, true);
            echo "</a></p>

                    ";
            // line 55
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placephonenumber")) > 1)) {
                // line 56
                echo "                        <p><b>Phone: </b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placephonenumber"), "html", null, true);
                echo "</p>
                    ";
            } else {
                // line 58
                echo "                        <p><b>Phone: </b>number not avaiable.</p>
                    ";
            }
            // line 59
            echo "   
                        <p><b>Type: </b>type - recode querys</p>
                        <p><b>Address: </b>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placevicinity"), "html", null, true);
            echo "</p>

                    ";
            // line 63
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placerating")) != 0)) {
                // line 64
                echo "                        <p><b>Ratings: <big><font color=\"green\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placerating"), "html", null, true);
                echo "</font></b></big> / 5 points.</p>
                    ";
            } else {
                // line 66
                echo "                        <p><b>Ratings: </b> Ratings are not available for this place.</p>
                    ";
            }
            // line 68
            echo "                        <p><b>Geo Location: </b><u>Lat. </u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelat"), "html", null, true);
            echo ". <u>Lng.</u>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placelng"), "html", null, true);
            echo ".</p>  

                    ";
            // line 70
            if ($this->getAttribute($this->getContext($context, "place"), "placeWebSite")) {
                // line 71
                echo "                        <p><b>WebSite: </b> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeWebSite"), "html", null, true);
                echo "\" target=\"_blank\"/>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeWebSite"), "html", null, true);
                echo "</a></p>
                    ";
            } else {
                // line 73
                echo "                        <p><b>WebSite: </b>website not avaiable</p>    
                    ";
            }
            // line 75
            echo "                    </div><!-- /.panel1 -->

                    <div id=\"pane2\" class=\"tab-pane active\">
                        <h1>";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>

                        <!-- SlideShow -->
                    ";
            // line 81
            if ((!twig_test_empty($this->getContext($context, "placeAllPhotos")))) {
                // line 82
                echo "                        ";
                if ((twig_length_filter($this->env, $this->getContext($context, "placeAllPhotos")) > 1)) {
                    // line 83
                    echo "                        <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
                            <!-- Indicators -->
                            <ol class=\"carousel-indicators\">
                                ";
                    // line 86
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                        // line 87
                        echo "                                    ";
                        if (($this->getContext($context, "key") == 0)) {
                            echo " 
                                <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            // line 88
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\" class=\"active\"></li>
                                    ";
                        } else {
                            // line 90
                            echo "                                <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "\"></li>
                                    ";
                        }
                        // line 92
                        echo "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 93
                    echo "                            </ol>

                            <!-- Wrapper for slide -->
                            <div class=\"carousel-inner\">
                            ";
                    // line 97
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                    foreach ($context['_seq'] as $context["key"] => $context["photo"]) {
                        // line 98
                        echo "                                ";
                        if (($this->getContext($context, "key") == 0)) {
                            // line 99
                            echo "                                <div class=\"item active\" style=\"border:0px solid blue; height:350px;width:100%\">
                                    <img src=\"";
                            // line 100
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        ";
                            // line 102
                            echo "                                    <div class=\"carousel-caption\">
                                        Slide ";
                            // line 103
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                    </div>
                                </div>
                                ";
                        } else {
                            // line 107
                            echo "                                <div class=\"item\" style=\"border:0px solid blue;height:350px;width:100%\">
                                    <img src=\"";
                            // line 108
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                            echo "\" width=\"100%\"/>
                                        ";
                            // line 110
                            echo "                                    <div class=\"carousel-caption\">
                                        Slide ";
                            // line 111
                            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                            echo "
                                    </div>
                                </div>
                                ";
                        }
                        // line 114
                        echo "    
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['photo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 116
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
                    // line 127
                    echo "                            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhotos"));
                    foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                        echo " 
                        <div class=\"item\" style=\"border:0px solid blue; width:100%;height:350px;\" >
                            <a href=\"";
                        // line 129
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
                    // line 132
                    echo "                        ";
                }
                // line 133
                echo "                    ";
            } else {
                // line 134
                echo "                        <center>
                            ";
                // line 136
                echo "                            <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\" title=\"Image not found !\"></span>
                        </center>
                    ";
            }
            // line 138
            echo "           
                    </div><!-- /.panel2 -->

                    <div id=\"pane3\" class=\"tab-pane\">
                        <div id=\"voteSection\"> 
                            <h1>";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                        ";
            // line 144
            if (array_key_exists("bool", $context)) {
                echo " ";
                // line 145
                echo "                            <p><b>Total votes: </b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotesAllTime"), "html", null, true);
                echo " votes</p>
                            <p><b>Total votes for this place: </b>";
                // line 146
                echo twig_escape_filter($this->env, $this->getContext($context, "totalVotes"), "html", null, true);
                echo " votes</p>
                            <p><b>Points / Stars:</b> <font color=\"green\"><big>";
                // line 147
                echo twig_escape_filter($this->env, $this->getContext($context, "usersRating"), "html", null, true);
                echo "</big></font></p>
                            ";
                // line 148
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 149
                    echo "                                ";
                    if (($this->getContext($context, "i") <= $this->getContext($context, "usersRating"))) {
                        // line 150
                        echo "                                    <span class=\"glyphicon glyphicon-star icon-font-size-large\"></span>
                                ";
                    } else {
                        // line 152
                        echo "                                    <span class=\"glyphicon glyphicon-star-empty icon-font-size-large\"></span>
                                ";
                    }
                    // line 154
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 155
                echo "                        ";
            } else {
                echo " ";
                // line 156
                echo "                            <p>Select a star</p>
                            <form>
                                <br />1<input type=\"radio\" name=\"vote\" value=\"1\" onclick=\"setVote(this.value, '";
                // line 158
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\")>
                                2<input type=\"radio\" name=\"vote\" value=\"2\" onclick=\"setVote(this.value, '";
                // line 159
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                3<input type=\"radio\" name=\"vote\" value=\"3\" onclick=\"setVote(this.value, '";
                // line 160
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                4<input type=\"radio\" name=\"vote\" value=\"4\" onclick=\"setVote(this.value, '";
                // line 161
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                                5<input type=\"radio\" name=\"vote\" value=\"5\" onclick=\"setVote(this.value, '";
                // line 162
                echo $this->env->getExtension('routing')->getPath("setVote");
                echo "');\">
                            </form>
                        ";
            }
            // line 165
            echo "                        </div><!-- /.voteSection -->
                    </div><!-- /.panel3 -->

                    <div id=\"pane4\" class=\"tab-pane\">
                        <h1>";
            // line 169
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placename"), "html", null, true);
            echo "</h1>
                     ";
            // line 170
            $this->env->loadTemplate("BundlePlacesBundle:Reviews:index.html.twig")->display(array_merge($context, array("reviews" => $this->getContext($context, "reviews"))));
            // line 171
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
        // line 178
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
        // line 205
        echo "
                    ";
        // line 207
        echo "                    <form action=\"#\" onsubmit=\"setDirections(this.from.value, this.to.value);
                            return false;\">
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"fromAddress\" name=\"from\" value=\"Cluj-Napoca,Romania\" placeholder=\"location address\"/>
                        <a id=\"from-link\" href=\"#\">Get current position</a><img class=\"loader\" style=\"display:none;padding-left: 5px;\"src=\"";
        // line 210
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/load.gif"), "html", null, true);
        echo "\"/>
                        <input class=\"form-control\" type=\"text\" size=\"25\" id=\"toAddress\" name=\"to\" value=\"";
        // line 211
        echo "\" placeholder=\"destination address\"/>                               
                        <button class=\"btn btn-default\" type=\"submit\" style=\"width:100px;margin-top: 2px;\"><img src=\"";
        // line 212
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

        <div id=\"map\" class=\"map\"></div>

    </article>
</div><!-- /#place-container -->

";
    }

    // line 230
    public function block_aside($context, array $blocks = array())
    {
        // line 231
        echo "    ";
        if (array_key_exists("input", $context)) {
            // line 232
            echo "
<p class=\"results-header-msg\">
    Total results: ";
            // line 234
            echo twig_escape_filter($this->env, $this->getContext($context, "totalResults"), "html", null, true);
            echo "
    <br/>
    Search value: ";
            // line 236
            echo twig_escape_filter($this->env, $this->getContext($context, "input"), "html", null, true);
            echo "
</p>
<div class=\"row app-results-wrapper\"> 
    <div class=\"app-aside-div\">
        ";
            // line 240
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "places"));
            foreach ($context['_seq'] as $context["key"] => $context["place"]) {
                // line 241
                echo "            ";
                // line 242
                echo "            ";
                $context["active"] = ((($this->getContext($context, "key") == 0)) ? ("active") : (""));
                // line 243
                echo "        <a id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
                echo "\" class=\"list-group-item it ";
                echo twig_escape_filter($this->env, $this->getContext($context, "active"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("renderPlace", array("param" => $this->getAttribute($this->getContext($context, "place"), "slug"))), "html", null, true);
                echo "\">
            <p>";
                // line 244
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
                echo "</p>
            <p>
               ";
                // line 246
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 247
                    echo "                    ";
                    if (($this->getContext($context, "i") <= $this->getAttribute($this->getContext($context, "place"), "placeRating"))) {
                        // line 248
                        echo "                        <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                    ";
                    } else {
                        // line 250
                        echo "                        <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                        echo "\" width=\"15\" height=\"15\" />
                    ";
                    }
                    // line 252
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 253
                echo "            </p>
        </a>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['place'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 256
            echo "    ";
        } else {
            // line 257
            echo "        <p class=\"results-header-msg\" style=\"padding-left:10px;\">
            Invalid search input
        </p>
    ";
        }
        // line 261
        echo "    </div>

</div>
<div id=\"gif-loader\" style=\"display:none;width:100%\">
    <center><img src=\"";
        // line 265
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/load.gif"), "html", null, true);
        echo "\"></center>
</div>
";
    }

    // line 274
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
<script type=\"text/javascript\">
    \$(document).ready(function() {

        //var i = 1;
        var array = \"\";
        var i = 0;
        var searchvalue = \$(\"#searchvalue\").val();
        var nrplaces;
        // store current places in list
        \$('.app-aside-div').children('a').each(function() {
            var arrHref = (\$(this).attr('id'));
            array += arrHref + ',';
        });
        \$('.app-results-wrapper').scroll(function() {
            if (\$(this)[0].scrollHeight - \$(this).scrollTop() == \$(this).outerHeight()) {
                i++;
                console.log(i);
                console.log(searchvalue);
                \$.ajax({
                    url: \"morePlacesRequest\",
                    type: \"POST\",
                    data: 'pag=' + i + '&searchval=' + searchvalue,
                    success: function(data) {
//                alert(data);
                        if (data) {
                            \$('#gif-loader').hide();
                            //console.log(data);
                            \$('.app-aside-div').append(data);
                            nrplaces = \$(\"#nrplaces\").val();
                            console.log(nrplaces);
                            //\$('#gif-loader').hide();
                           // alert(i);
                            \$(\".it\"+i).on('click', function() {


                                param = \$(this).attr('href');
                                //alert(param);
                                \$(this).addClass('active').siblings().removeClass('active');
                                \$.ajax({
//            url: \"/MyProject/web/app_dev.php/renderPlace/\" + param,
                                    url: param,
                                    type: \"GET\",
                                    success: function(data) {
//                alert(data);
                                        if (data) {
                                            console.log('1');
                                            \$('#place-container').html(data);
                                        }
                                    }
                                });
                                // alert(param);
                                return false;
                                //alert(22);
                                event.preventDefault();

                            });





                        }
                    },
                    beforeSend: function() {
                        \$('#gif-loader').show();
                    },
                    complete: function() {
                        \$('#gif-loader').hide();
                    }

                });
            }
        });

    });
</script>
    ";
        // line 352
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/renderPlace.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 353
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/processingVote.js"), "html", null, true);
        echo "\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places\"></script>
<script type=\"text/javascript\" src=\"";
        // line 355
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/google-map-get-directions.js"), "html", null, true);
        echo "\"></script>
";
        // line 357
        echo "

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
        return array (  747 => 357,  743 => 355,  738 => 353,  733 => 352,  652 => 274,  645 => 265,  639 => 261,  633 => 257,  630 => 256,  622 => 253,  616 => 252,  610 => 250,  604 => 248,  601 => 247,  597 => 246,  592 => 244,  583 => 243,  580 => 242,  578 => 241,  574 => 240,  567 => 236,  562 => 234,  558 => 232,  555 => 231,  552 => 230,  530 => 212,  527 => 211,  523 => 210,  518 => 207,  515 => 205,  496 => 178,  476 => 171,  474 => 170,  470 => 169,  464 => 165,  458 => 162,  454 => 161,  450 => 160,  446 => 159,  442 => 158,  438 => 156,  434 => 155,  428 => 154,  424 => 152,  420 => 150,  417 => 149,  413 => 148,  409 => 147,  405 => 146,  400 => 145,  397 => 144,  393 => 143,  386 => 138,  381 => 136,  378 => 134,  375 => 133,  372 => 132,  359 => 129,  351 => 127,  338 => 116,  331 => 114,  324 => 111,  321 => 110,  317 => 108,  314 => 107,  307 => 103,  304 => 102,  300 => 100,  297 => 99,  294 => 98,  290 => 97,  284 => 93,  278 => 92,  272 => 90,  267 => 88,  262 => 87,  258 => 86,  253 => 83,  250 => 82,  248 => 81,  242 => 78,  237 => 75,  233 => 73,  225 => 71,  223 => 70,  215 => 68,  211 => 66,  205 => 64,  203 => 63,  198 => 61,  194 => 59,  190 => 58,  184 => 56,  182 => 55,  175 => 53,  169 => 52,  165 => 51,  158 => 50,  154 => 48,  151 => 47,  140 => 45,  135 => 44,  133 => 43,  129 => 42,  124 => 40,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 33,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 14,);
    }
}
