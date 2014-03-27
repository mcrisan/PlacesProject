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
        echo "      ";
        // line 185
        echo "
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
        return array (  429 => 188,  398 => 136,  395 => 135,  389 => 126,  383 => 122,  377 => 118,  357 => 95,  342 => 85,  334 => 82,  332 => 81,  327 => 78,  315 => 74,  313 => 73,  308 => 71,  301 => 67,  298 => 66,  292 => 64,  286 => 62,  277 => 58,  275 => 57,  273 => 56,  266 => 52,  259 => 47,  245 => 32,  236 => 22,  230 => 8,  222 => 208,  220 => 207,  217 => 206,  214 => 205,  206 => 203,  201 => 201,  192 => 198,  187 => 196,  181 => 194,  178 => 193,  173 => 189,  171 => 186,  168 => 185,  166 => 184,  159 => 177,  150 => 174,  144 => 171,  134 => 167,  130 => 166,  121 => 159,  119 => 135,  109 => 127,  107 => 126,  102 => 123,  95 => 119,  93 => 118,  84 => 111,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 13,  45 => 12,  38 => 8,  27 => 2,  42 => 13,  39 => 12,  32 => 5,  747 => 357,  743 => 355,  738 => 353,  733 => 352,  652 => 274,  645 => 265,  639 => 261,  633 => 257,  630 => 256,  622 => 253,  616 => 252,  610 => 250,  604 => 248,  601 => 247,  597 => 246,  592 => 244,  583 => 243,  580 => 242,  578 => 241,  574 => 240,  567 => 236,  562 => 234,  558 => 232,  555 => 231,  552 => 230,  530 => 212,  527 => 211,  523 => 210,  518 => 207,  515 => 205,  496 => 178,  476 => 171,  474 => 170,  470 => 169,  464 => 165,  458 => 162,  454 => 161,  450 => 160,  446 => 159,  442 => 158,  438 => 156,  434 => 155,  428 => 154,  424 => 186,  420 => 150,  417 => 149,  413 => 148,  409 => 147,  405 => 146,  400 => 145,  397 => 144,  393 => 143,  386 => 138,  381 => 136,  378 => 134,  375 => 133,  372 => 132,  359 => 129,  351 => 91,  338 => 84,  331 => 114,  324 => 111,  321 => 76,  317 => 108,  314 => 107,  307 => 103,  304 => 102,  300 => 100,  297 => 99,  294 => 98,  290 => 97,  284 => 61,  278 => 92,  272 => 90,  267 => 88,  262 => 87,  258 => 86,  253 => 83,  250 => 82,  248 => 81,  242 => 31,  237 => 75,  233 => 73,  225 => 71,  223 => 70,  215 => 68,  211 => 66,  205 => 64,  203 => 202,  198 => 200,  194 => 59,  190 => 197,  184 => 56,  182 => 55,  175 => 53,  169 => 52,  165 => 51,  158 => 50,  154 => 175,  151 => 47,  140 => 170,  135 => 44,  133 => 43,  129 => 42,  124 => 40,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 122,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
