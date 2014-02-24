<?php

/* BundleProjectBundle::base.html.twig */
class __TwigTemplate_42ce4fb6479591e47fdd66987e39c3573d45bb2337c103ef32c916839582c251 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/images/icons/glyph-icons-gradient/magnifying-glass.png"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/css/app-core.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/css/app-homepage.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/css/app-typehead-styles.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/css/app-slide-navigation.css"), "html", null, true);
        echo "\" />
        
        <!-- Bootstrap css -->
        <!--<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/css/bootstrap.min.css"), "html", null, true);
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
        // line 105
        echo "            </header><!-- /header -->
               
            <!-- Main section -->
            <section id=\"main-section\">
                <!-- Main section content container --> 
                <div class=\"container main-container\">
                    <div class=\"row\" style=\"border-bottom: 3px solid #ccc; padding:5px;\">
                        ";
        // line 112
        $this->displayBlock('flashBag', $context, $blocks);
        // line 113
        echo "                        <!-- Mobile first xs,sm,md,lg -->
                        <div class=\"col-xs-12 col-sm-9 col-md-9 col-lg-9 app-left-content\">
                            <!-- Main section 'float left' content -->
                            ";
        // line 116
        $this->displayBlock('body', $context, $blocks);
        // line 117
        echo "                        </div>
                        <div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3 app-right-content\">
                            <!-- Main section 'float right' content -->
                            ";
        // line 120
        $this->displayBlock('aside', $context, $blocks);
        // line 121
        echo "                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Footer -->
            <footer class=\"footer\">
                <div class=\"container\" style=\"border-top:1px solid #ccc;\">
                    ";
        // line 129
        $this->displayBlock('footer', $context, $blocks);
        // line 153
        echo "                </div>
            </footer>
        </div><!-- /main wrapper -->
        
        <!-- Javascripts -->
        <!-- jQuery -->
        <script type=\"text/javascript\" src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/jquery-1.9.1.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/jquery-ui.js"), "html", null, true);
        echo "\"></script>
        
        <!-- Bootstrap js -->
        <script type=\"text/javascript\" src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/typeahead.js"), "html", null, true);
        echo "\"></script>
        
        <!-- App js -->
        <script type=\"text/javascript\" src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/app-social-signin.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 168
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/app-core.js"), "html", null, true);
        echo "\"></script>
        
        <!-- Social sign-in plugin -->
        <script type=\"text/javascript\">
            (function() {
                if (typeof window.janrain !== 'object') window.janrain = {};
                if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};

                janrain.settings.tokenUrl = 'http://proiecte";
        // line 176
        echo $this->env->getExtension('routing')->getPath("testToken");
        echo "';
                function isReady() { janrain.ready = true; };
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
        // line 198
        $this->displayBlock('javascript', $context, $blocks);
        // line 201
        echo "    </body>
</html>

                            ";
        // line 205
        echo "                                ";
        if (array_key_exists("userIp", $context)) {
            // line 206
            echo "                                    <p>Adddr: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "userIp"), "html", null, true);
            echo ".</p>
                                ";
        }
        // line 208
        echo "
                                ";
        // line 209
        if (array_key_exists("userSiteHits", $context)) {
            // line 210
            echo "                                    <p>You visit this site <b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "userSiteHits"), "html", null, true);
            echo "</b> time(s).</p>
                                ";
        }
        // line 212
        echo "                        
                                ";
        // line 213
        if (array_key_exists("browserName", $context)) {
            // line 214
            echo "                                    ";
            if (array_key_exists("browserVers", $context)) {
                // line 215
                echo "                                        <p>Browser Name: ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "browserName")), "html", null, true);
                echo " <b>v.</b> ";
                echo twig_escape_filter($this->env, $this->getContext($context, "browserVers"), "html", null, true);
                echo "</p>
                                    ";
            }
            // line 217
            echo "                                ";
        }
        // line 218
        echo "
                                ";
        // line 219
        if (array_key_exists("allTimeUsers", $context)) {
            // line 220
            echo "                                    <p>Trafic: <b>";
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
        echo "                    <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
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
            echo "                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\"><span class=\"glyphicon glyphicon-user icon-font-size-smalll\"></span>     ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "userName")), "html", null, true);
            echo "  <b class=\"caret\"></b></a>
                                        <ul class=\"dropdown-menu\">
                                            
                                            ";
            // line 61
            if ((array_key_exists("socialLogged", $context) && (!twig_test_empty($this->getContext($context, "socialLogged"))))) {
                // line 62
                echo "                                                <li id=\"li-admin\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("index");
                echo "\">Admin area</a></li>
                                            ";
            } else {
                // line 64
                echo "                                                <li id=\"li-admin\"><a href=\"";
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
                echo "                                                <li id=\"li-logout\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("clear");
                echo "\"><span class=\"glyphicon glyphicon-log-out\"></span> Sign Out</a></li>
                                            ";
            } else {
                // line 76
                echo "                                                <li id=\"li-logout\"><a href=\"";
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
            echo "                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\">Drowdown   <b class=\"caret\"></b></a>
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
                                    <input id=\"searchh\" class=\"typeahead form-control\" type=\"text\" name=\"input\" placeholder=\"Search..\" size=\"47\"/>
                                </div>
                                <button class=\"btn btn-default\" type=\"submit\"><span class=\"glyphicon glyphicon-search\"></span></button>
                             </form>                   
                        </div><!-- /navbar-collapse -->
                    </div> <!-- /container -->
                    </nav><!-- /navbar -->
                ";
    }

    // line 112
    public function block_flashBag($context, array $blocks = array())
    {
        echo "  ";
    }

    // line 116
    public function block_body($context, array $blocks = array())
    {
        echo " ";
    }

    // line 120
    public function block_aside($context, array $blocks = array())
    {
        echo " ";
    }

    // line 129
    public function block_footer($context, array $blocks = array())
    {
        // line 130
        echo "                        <div class=\"row\">
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

    // line 198
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
            ";
        // line 200
        echo "        ";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  441 => 200,  407 => 129,  395 => 116,  375 => 95,  369 => 91,  360 => 85,  356 => 84,  352 => 82,  350 => 81,  345 => 78,  339 => 76,  333 => 74,  331 => 73,  326 => 71,  319 => 67,  316 => 66,  304 => 62,  302 => 61,  295 => 58,  291 => 56,  284 => 52,  277 => 47,  260 => 31,  248 => 8,  240 => 220,  235 => 218,  232 => 217,  224 => 215,  216 => 212,  210 => 210,  208 => 209,  205 => 208,  196 => 205,  191 => 201,  189 => 198,  164 => 176,  153 => 168,  149 => 167,  143 => 164,  139 => 163,  133 => 160,  121 => 153,  119 => 129,  109 => 121,  107 => 120,  102 => 117,  95 => 113,  93 => 112,  84 => 105,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 13,  45 => 12,  38 => 8,  27 => 2,  42 => 13,  39 => 12,  32 => 5,  835 => 369,  830 => 367,  825 => 366,  819 => 361,  782 => 327,  775 => 318,  769 => 314,  763 => 310,  760 => 309,  752 => 306,  747 => 304,  743 => 303,  739 => 302,  735 => 301,  730 => 300,  727 => 299,  722 => 297,  718 => 296,  714 => 295,  710 => 294,  705 => 293,  700 => 291,  696 => 290,  692 => 289,  688 => 288,  683 => 287,  678 => 285,  674 => 284,  670 => 283,  666 => 282,  661 => 281,  656 => 279,  652 => 278,  648 => 277,  644 => 276,  639 => 275,  634 => 273,  630 => 272,  626 => 271,  622 => 270,  617 => 269,  614 => 268,  612 => 267,  607 => 265,  598 => 264,  595 => 263,  593 => 262,  589 => 261,  582 => 257,  577 => 255,  573 => 253,  570 => 252,  567 => 251,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 198,  428 => 161,  420 => 155,  412 => 149,  410 => 130,  405 => 146,  401 => 120,  396 => 144,  393 => 143,  389 => 112,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 64,  303 => 102,  300 => 101,  296 => 99,  293 => 57,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 32,  258 => 86,  254 => 22,  249 => 82,  246 => 81,  244 => 80,  238 => 219,  233 => 74,  229 => 72,  221 => 214,  219 => 213,  211 => 67,  207 => 65,  201 => 63,  199 => 206,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 159,  125 => 41,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 116,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
