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
        <script type=\"text/javascript\" src=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/searchautocomplete.js"), "html", null, true);
        echo "\"></script>



        ";
        // line 184
        echo "       <script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places\"></script>

        ";
        // line 186
        $this->displayBlock('javascript', $context, $blocks);
        // line 189
        echo "    </body>
</html>

                            ";
        // line 193
        echo "                                ";
        if (array_key_exists("userIp", $context)) {
            // line 194
            echo "<p>Adddr: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "userIp"), "html", null, true);
            echo ".</p>
                                ";
        }
        // line 196
        echo "
                                ";
        // line 197
        if (array_key_exists("userSiteHits", $context)) {
            // line 198
            echo "<p>You visit this site <b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "userSiteHits"), "html", null, true);
            echo "</b> time(s).</p>
                                ";
        }
        // line 200
        echo "
                                ";
        // line 201
        if (array_key_exists("browserName", $context)) {
            // line 202
            echo "                                    ";
            if (array_key_exists("browserVers", $context)) {
                // line 203
                echo "<p>Browser Name: ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "browserName")), "html", null, true);
                echo " <b>v.</b> ";
                echo twig_escape_filter($this->env, $this->getContext($context, "browserVers"), "html", null, true);
                echo "</p>
                                    ";
            }
            // line 205
            echo "                                ";
        }
        // line 206
        echo "
                                ";
        // line 207
        if (array_key_exists("allTimeUsers", $context)) {
            // line 208
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

    // line 186
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
            ";
        // line 188
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
        return array (  423 => 186,  397 => 136,  394 => 135,  388 => 126,  376 => 118,  356 => 95,  350 => 91,  341 => 85,  337 => 84,  333 => 82,  331 => 81,  326 => 78,  314 => 74,  312 => 73,  307 => 71,  297 => 66,  291 => 64,  285 => 62,  283 => 61,  276 => 58,  272 => 56,  265 => 52,  241 => 31,  235 => 22,  216 => 206,  213 => 205,  205 => 203,  202 => 202,  200 => 201,  197 => 200,  191 => 198,  189 => 197,  177 => 193,  172 => 189,  170 => 186,  166 => 184,  159 => 177,  144 => 171,  140 => 170,  134 => 167,  130 => 166,  121 => 159,  119 => 135,  109 => 127,  107 => 126,  102 => 123,  95 => 119,  93 => 118,  84 => 111,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 13,  45 => 12,  38 => 8,  32 => 5,  27 => 2,  871 => 403,  867 => 401,  862 => 399,  857 => 398,  851 => 393,  785 => 330,  778 => 321,  772 => 317,  766 => 313,  763 => 312,  755 => 309,  750 => 307,  746 => 306,  742 => 305,  738 => 304,  733 => 303,  730 => 302,  725 => 300,  721 => 299,  717 => 298,  713 => 297,  708 => 296,  703 => 294,  699 => 293,  695 => 292,  691 => 291,  686 => 290,  681 => 288,  677 => 287,  673 => 286,  669 => 285,  664 => 284,  659 => 282,  655 => 281,  651 => 280,  647 => 279,  642 => 278,  637 => 276,  633 => 275,  629 => 274,  625 => 273,  620 => 272,  617 => 271,  615 => 270,  610 => 268,  601 => 267,  598 => 266,  596 => 265,  592 => 264,  585 => 260,  580 => 258,  576 => 256,  573 => 255,  570 => 254,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 167,  428 => 188,  420 => 155,  412 => 149,  410 => 148,  405 => 146,  401 => 145,  396 => 144,  393 => 143,  389 => 142,  382 => 122,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 76,  317 => 109,  313 => 107,  310 => 106,  303 => 102,  300 => 67,  296 => 99,  293 => 98,  290 => 97,  286 => 96,  280 => 92,  274 => 57,  268 => 89,  263 => 87,  258 => 47,  254 => 85,  249 => 82,  246 => 81,  244 => 32,  238 => 77,  233 => 74,  229 => 8,  221 => 208,  219 => 207,  211 => 67,  207 => 65,  201 => 63,  199 => 62,  194 => 60,  190 => 58,  186 => 196,  180 => 194,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 175,  150 => 174,  147 => 46,  136 => 44,  131 => 43,  129 => 42,  125 => 41,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 122,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 14,);
    }
}
