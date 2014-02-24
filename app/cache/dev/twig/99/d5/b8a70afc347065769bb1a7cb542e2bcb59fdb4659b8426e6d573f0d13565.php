<?php

/* BundleProjectBundle:Page:placeDetails.html.twig */
class __TwigTemplate_99d5b8a70afc347065769bb1a7cb542e2bcb59fdb4659b8426e6d573f0d13565 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundleProjectBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'aside' => array($this, 'block_aside'),
            'navigation' => array($this, 'block_navigation'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundleProjectBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "slug")), "html", null, true);
        echo " ";
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
        // line 7
        echo "<style type=\"text/css\"> 
        body {
            padding-top: 0px;
        }
        /* CUSTOMIZE THE NAVBAR
-------------------------------------------------- */

        /* Special class on .container surrounding .navbar, used for positioning it into place. */
        .navbar-wrapper {
            border:0px solid red;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 20;
        }

        /* Flip around the padding for proper display in narrow viewports */
        .navbar-wrapper .container {
            padding-left: 0;
            padding-right: 0;
        }
        .navbar-wrapper .navbar {
            padding-left: 15px;
            padding-right: 15px;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            height: 500px;
            margin-bottom: 60px;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel .item {
            height: 500px;
            background-color: #777;
        }
        .carousel-inner > .item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 500px;
        }



        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Pad the edges of the mobile views a bit */
        .marketing {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .marketing h2 {
            font-weight: normal;
        }
        .marketing .col-lg-4 p {
            margin-left: 10px;
            margin-right: 10px;
        }


        /* Featurettes
        ------------------------- */

        .featurette-divider {
            margin: 80px 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -1px;
        }



        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 768px) {

            /* Remove the edge padding needed for mobile */
            .marketing {
                padding-left: 0;
                padding-right: 0;
            }

            /* Navbar positioning foo */
            .navbar-wrapper {
                margin-top: 20px;
            }
            .navbar-wrapper .container {
                padding-left:  15px;
                padding-right: 15px;
            }
            .navbar-wrapper .navbar {
                padding-left:  0;
                padding-right: 0;
            }

            /* The navbar becomes detached from the top, so we round the corners */
            .navbar-wrapper .navbar {
                border-radius: 4px;
            }

            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 20px;
                font-size: 21px;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }

        }

        @media (min-width: 992px) {
            .featurette-heading {
                margin-top: 120px;
            }
        }   
    </style>
";
    }

    // line 156
    public function block_aside($context, array $blocks = array())
    {
        echo " ";
    }

    // line 159
    public function block_navigation($context, array $blocks = array())
    {
        // line 160
        echo "    <div class=\"navbar-wrapper\">
        <div class=\"container\">

            <div class=\"navbar navbar-inverse navbar-static-top\" role=\"navigation\">
                <div class=\"container\">
                    ";
        // line 166
        echo "                        <div class=\"navbar-header\">
                            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                              <span class=\"sr-only\">Toggle navigation</span>
                              <span class=\"icon-bar\"></span>
                              <span class=\"icon-bar\"></span>
                              <span class=\"icon-bar\"></span>
                            </button>
                            <span class=\"navbar-brand logo-header\">Places App</span>  
                            ";
        // line 177
        echo "                        </div>
                    <!-- Navbar collapse -->
                        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                <li id=\"li-home\"><a href=\"";
        // line 181
        echo $this->env->getExtension('routing')->getUrl("index");
        echo "\" title=\"Home\"><span class=\"glyphicon glyphicon-home icon-font-size-smalll\"></span></a></li>
                                
                                ";
        // line 184
        echo "                                <li id=\"li-dropdown\" class=\"dropdown\">
                                    ";
        // line 185
        if ((array_key_exists("userName", $context) && (!twig_test_empty($this->getContext($context, "userName"))))) {
            // line 186
            echo "                                        ";
            // line 187
            echo "                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\"><span class=\"glyphicon glyphicon-user icon-font-size-smalll\"></span>     ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getContext($context, "userName")), "html", null, true);
            echo "  <b class=\"caret\"></b></a>
                                        <ul class=\"dropdown-menu\">
                                            
                                            ";
            // line 190
            if ((array_key_exists("socialLogged", $context) && (!twig_test_empty($this->getContext($context, "socialLogged"))))) {
                // line 191
                echo "                                                <li id=\"li-admin\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("index");
                echo "\">Admin area</a></li>
                                            ";
            } else {
                // line 193
                echo "                                                <li id=\"li-admin\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_start");
                echo "\">Admin area</a></li>
                                            ";
            }
            // line 195
            echo "                                            
                                            <li id=\"li-about\"><a href=\"";
            // line 196
            echo $this->env->getExtension('routing')->getPath("about");
            echo "\">About</a></li>
                                            <li><a href=\"#\">Facebook</a></li>
                                            <li><a href=\"#\">Google+</a></li>
                                            <li><a href=\"#\">Twitter</a></li>
                                            <li><a href=\"#\">Id: ";
            // line 200
            echo twig_escape_filter($this->env, $this->getContext($context, "userId"), "html", null, true);
            echo "</a></li>
                                            
                                            ";
            // line 202
            if ((array_key_exists("socialLogged", $context) && (!twig_test_empty($this->getContext($context, "socialLogged"))))) {
                // line 203
                echo "                                                <li id=\"li-logout\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("clear");
                echo "\"><span class=\"glyphicon glyphicon-log-out\"></span> Sign Out</a></li>
                                            ";
            } else {
                // line 205
                echo "                                                <li id=\"li-logout\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("logout");
                echo "\"><span class=\"glyphicon glyphicon-log-out\"></span> Sign Out</a></li>
                                            ";
            }
            // line 207
            echo "                                        
                                        </ul>
                                    ";
        } else {
            // line 210
            echo "                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" title=\"Menu\">Drowdown   <b class=\"caret\"></b></a>
                                        <ul class=\"dropdown-menu\">
                                           <li id=\"li-about\"><a href=\"";
            // line 212
            echo $this->env->getExtension('routing')->getPath("about");
            echo "\">About</a></li>
                                           <li id=\"li-login\"><a href=\"";
            // line 213
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><span class=\"glyphicon glyphicon-log-in\"></span> Sign In</a></li>
                                           <li><a href=\"#\">Google+</a></li>
                                           <li><a href=\"#\">Twitter</a></li>
                                           ";
            // line 217
            echo "                                        </ul>
                                    ";
        }
        // line 219
        echo "                                </li>
                             </ul>
                             
                             ";
        // line 223
        echo "                             <form class=\"navbar-form navbar-left\" action=\"";
        echo $this->env->getExtension('routing')->getPath("demoSearch");
        echo "\" method=\"post\">
                                <div class=\"form-group\">
                                    <input id=\"searchh\" class=\"typeahead form-control\" type=\"text\" name=\"input\" placeholder=\"Search..\" size=\"47\"/>
                                </div>
                                <button class=\"btn btn-default\" type=\"submit\"><span class=\"glyphicon glyphicon-search\"></span></button>
                                ";
        // line 232
        echo "                             </form>                   
                        </div><!-- /navbar-collapse -->
                </div>
            </div>

        </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\" style=\"border:0px solid blue;\">
        <!-- Indicators -->
        <ol class=\"carousel-indicators\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
        </ol>
        <div class=\"carousel-inner\">
            <div class=\"item active\">
                <img src=\"http://upload.wikimedia.org/wikipedia/commons/a/a2/BadHogastein-Winter.jpg\" alt=\"First slide\">
                <div class=\"container\">
                    <div class=\"carousel-caption\">
                        <h1>Example headline.</h1>
                        <p>Note: If you're viewing this page via a <code>file://</code> URL, the \"next\" and \"previous\" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                        <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class=\"item\">
                <img src=\"http://www.hdwallpapers.in/walls/windows_7_winter_hdtv-HD.jpg\" alt=\"First slide\">
                <div class=\"container\">
                    <div class=\"carousel-caption\">
                        <h1>Another example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class=\"item\">
                <img src=\"http://upload.wikimedia.org/wikipedia/commons/a/a2/BadHogastein-Winter.jpg\" alt=\"First slide\">
                <div class=\"container\">
                    <div class=\"carousel-caption\">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a>
        <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>
    </div><!-- /.carousel -->
";
    }

    // line 287
    public function block_body($context, array $blocks = array())
    {
        // line 288
        echo "    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class=\"container marketing\">

      <!-- Three columns of text below the carousel -->
      <div class=\"row\">
        <div class=\"col-lg-4\">
          ";
        // line 297
        echo twig_escape_filter($this->env, $this->getContext($context, "slug"), "html", null, true);
        echo "
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
          ";
        // line 303
        echo twig_escape_filter($this->env, $this->getContext($context, "slug"), "html", null, true);
        echo "
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
          ";
        // line 309
        echo twig_escape_filter($this->env, $this->getContext($context, "slug"), "html", null, true);
        echo "
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div>
      <!-- /END THE FEATURETTES -->
";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle:Page:placeDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  409 => 309,  400 => 303,  391 => 297,  380 => 288,  377 => 287,  321 => 232,  312 => 223,  307 => 219,  303 => 217,  297 => 213,  293 => 212,  289 => 210,  284 => 207,  278 => 205,  272 => 203,  270 => 202,  265 => 200,  258 => 196,  255 => 195,  249 => 193,  243 => 191,  241 => 190,  234 => 187,  232 => 186,  230 => 185,  227 => 184,  222 => 181,  216 => 177,  206 => 166,  199 => 160,  196 => 159,  190 => 156,  43 => 7,  40 => 6,  32 => 3,);
    }
}
