<?php

/* BundlePlacesBundle::base1.html.twig */
class __TwigTemplate_dff6d66e470d0bb8dbd0e355173eaf97cfc6b325c6e246fd750186fa5900e599 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'sidebar' => array($this, 'block_sidebar'),
            'footer' => array($this, 'block_footer'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
    <head>
        <link rel=\"shortcut icon\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/icons/glyph-icons-gradient/magnifying-glass.png"), "html", null, true);
        echo "\" type=\"image/x-icon\">
        <meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Places App | ";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <!-- Stylesheets -->
        <!-- App css -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/style.css"), "html", null, true);
        echo "\" />
<!--    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-homepage.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-typehead-styles.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/app-slide-navigation.css"), "html", null, true);
        echo "\" /> -->

        <!-- Bootstrap css -->
        <!--<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/bootstrap.min.css"), "html", null, true);
        echo "\" />-->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"http://cdn.bootcss.com/twitter-bootstrap/3.0.1/css/bootstrap.css\" />

        <!-- Append css -->
        ";
        // line 21
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "    </head>
    <body>
        <header id=\"header-section\">
            ";
        // line 25
        $this->displayBlock('header', $context, $blocks);
        // line 69
        echo "        </header>
        <section id=\"main-container\">
            ";
        // line 71
        $this->displayBlock('content', $context, $blocks);
        // line 72
        echo "            ";
        $this->displayBlock('sidebar', $context, $blocks);
        // line 73
        echo "        </section>
        <footer class=\"footer\">
            <div class=\"container\" style=\"border-top:1px solid #ccc;\">
                ";
        // line 76
        $this->displayBlock('footer', $context, $blocks);
        // line 78
        echo "            </div>
        </footer>

        <!-- Javascripts -->
        <!-- jQuery -->
        <script type=\"text/javascript\" src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/jquery-1.9.1.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/jquery-ui.js"), "html", null, true);
        echo "\"></script>

        <!-- Bootstrap js -->
        <script type=\"text/javascript\" src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/typeahead.js"), "html", null, true);
        echo "\"></script>
        <script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places\"></script>
        <!-- App js -->
        <script type=\"text/javascript\" src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/image-hover.js"), "html", null, true);
        echo "\"></script>
        <!-- for autocomplete -->
        <script type=\"text/javascript\" src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/searchautocomplete.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 94
        $this->displayBlock('javascript', $context, $blocks);
        // line 97
        echo "    </body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "  ";
    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        echo " ";
    }

    // line 25
    public function block_header($context, array $blocks = array())
    {
        // line 26
        echo "            <div id =\"search\" class=\"search-bar\">
                <div class=\"search-bar-header\">
                    <label>Yummy</label>
                    <ul class=\"social-bar\">
                        <li><a href=\"#\"></a></li>
                        <li><a href=\"#\"></a></li>
                        <li><a href=\"#\"></a></li>
                    </ul>
                    <ul class=\"menu-bar\">
                        <li class=\"menu-button\">
                            <a href=\"#\">CONTACT</a>
                        </li>
                        <li class=\"menu-button\">
                            <a href=\"#\">ABOUT</a>
                        </li>
                    </ul>
                </div>
                <form action=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("demoSearch");
        echo "\" method=\"post\">
                    <div class=\"search-input\">                        
                       ";
        // line 46
        echo "                        <div class=\"divider\"></div>
                        <input id=\"searchh\" class=\"search typeahead1\" type=\"text\" name=\"input\" placeholder=\"Search..\" autocomplete=\"off\" />
                        <input id=\"search-lat\" type=\"hidden\" name=\"input-lat\" />
                        <input id=\"search-lng\" type=\"hidden\" name=\"input-lng\" />                            
                        <button type=\"submit\"></button>
                        <div id=\"autocomplete-result\"></div>
                       ";
        // line 52
        echo "                         
                    </div>
                    <div class=\"search-bar-footer\">
                        <ul class=\"search-filters\">
                            <li>
                                <input type=\"checkbox\" class=\"css-checkbox\" name=\"drink-checkbox\" id=\"drink-checkbox\"></input>
                                <label for=\"drink-checkbox\" class=\"css-label\">DRINK</label>
                            </li>
                            <li>
                                <input type=\"checkbox\" class=\"css-checkbox\" name=\"food-checkbox\" id=\"food-checkbox\"></input>
                                <label for=\"food-checkbox\" class=\"css-label\">FOOD</label>
                            </li>
                        </ul>
                    </div> 
                </form>
            </div><!--end search bar--> 
            ";
    }

    // line 71
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    // line 72
    public function block_sidebar($context, array $blocks = array())
    {
        echo " ";
    }

    // line 76
    public function block_footer($context, array $blocks = array())
    {
        // line 77
        echo "                ";
    }

    // line 94
    public function block_javascript($context, array $blocks = array())
    {
        echo " 
            ";
        // line 96
        echo "        ";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle::base1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 96,  223 => 94,  219 => 77,  216 => 76,  210 => 72,  204 => 71,  184 => 52,  176 => 46,  171 => 43,  152 => 26,  149 => 25,  143 => 21,  137 => 7,  132 => 97,  130 => 94,  126 => 93,  121 => 91,  115 => 88,  111 => 87,  105 => 84,  101 => 83,  94 => 78,  92 => 76,  87 => 73,  84 => 72,  82 => 71,  78 => 69,  76 => 25,  71 => 22,  69 => 21,  62 => 17,  56 => 14,  52 => 13,  48 => 12,  44 => 11,  37 => 7,  31 => 4,  26 => 1,);
    }
}
