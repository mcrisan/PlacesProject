<?php

/* BundlePlacesBundle:Page:indexShowPlace.html.twig */
class __TwigTemplate_378ef91bd315de7aff1fa4d0bd6ccb8470fb33a0dffb96746d12ef18ee05225e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundlePlacesBundle::layout.html.twig");

        $this->blocks = array(
            'aside' => array($this, 'block_aside'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundlePlacesBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_aside($context, array $blocks = array())
    {
        echo " 
    <div class=\"list-group\">
        ";
        // line 9
        echo "        <div class=\"list-group-item\">
            <h1 class=\"sideHeader\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "</h1>
            <h2>Details</h2>
            <p>Address: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "placeAddress"), "html", null, true);
        echo "</p>
        </div>

        <br />
        <br />";
        // line 17
        echo "        <div class=\"list-group-item\">
            <p>Place slug: ";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "slug"), "html", null, true);
        echo "</p>
            <p>Palce id: ";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "</p>
        </div>
        
        <br />";
        // line 23
        echo "        <div class=\"list-group-item\">
            <h1 class=\"sideHeader\">More info</h1>
            <h2>More info</h2>
        
            <p>tags,comercials,menus,etc</p>
        </div>
        
        <br />
        <br />";
        // line 32
        echo "        <div class=\"list-group-item\">
            <h1 class=\"sideHeader\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "</h1>
            <h2>Details</h2>
            <p>Address: ";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, "placeAddress"), "html", null, true);
        echo "</p>
        </div>
        
    </div>
";
    }

    // line 41
    public function block_title($context, array $blocks = array())
    {
        echo " Place details ";
    }

    // line 44
    public function block_body($context, array $blocks = array())
    {
        // line 45
        echo "
<article class=\"page-article\" style=\"padding:0px;border:0px;\">
     <div class=\"panel-bodyy\">
        ";
        // line 49
        echo "        ";
        if ((!twig_test_empty($this->getContext($context, "placeAllPhotos")))) {
            echo " 
            ";
            // line 50
            if ((twig_length_filter($this->env, $this->getContext($context, "placeAllPhotos")) > 1)) {
                // line 51
                echo "                <div id=\"slides\">
                    ";
                // line 52
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placeAllPhotos"));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 53
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                    echo "\" width=\"100%\"/>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                echo "                    ";
                // line 57
                echo "                </div>
            ";
            } else {
                // line 59
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "placePhoto"));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 60
                    echo "                    <p><img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "photo"), "imgUrl"), "html", null, true);
                    echo "\" width=\"100%\"</p>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "            ";
            }
            // line 63
            echo "        ";
        } else {
            // line 64
            echo "            <p>Image not found !</p>
            <span class=\"glyphicon glyphicon-picture icon-font-size-verylarge\"></span>
        ";
        }
        // line 67
        echo "    </div>
</article>

<article class=\"page-article\">
    <div class=\"reviews-comm-div\" style=\"border-bottom: 0xp;\">
        <h1>Reviews from google</h1>
        ";
        // line 73
        $this->env->loadTemplate("BundlePlacesBundle:Reviews:index.html.twig")->display(array_merge($context, array("reviews" => $this->getContext($context, "reviews"))));
        // line 74
        echo "    </div>
</article>

<article class=\"page-article\">
    <div class=\"reviews-comm-div\" style=\"border-bottom: 0xp; height:auto;\">
        <h1>Comments</h1>
        ";
        // line 80
        $this->env->loadTemplate("BundlePlacesBundle:Comment:index.html.twig")->display(array_merge($context, array("comments" => $this->getContext($context, "comments"))));
        // line 81
        echo "    </div>
</article>

<article class=\"page-article\">
    <div class=\"panel-body\" style=\"padding:0px;border:1px solid green;\">
        <h4>From</h4>
        ";
        // line 87
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BundlePlacesBundle:Comment:new", array("place_id" => $this->getContext($context, "id"))));
        echo "
    </div>
</article>

";
    }

    // line 93
    public function block_javascript($context, array $blocks = array())
    {
        // line 94
        echo "    ";
        // line 95
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/js/jquery.slides.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        \$(function() {
            \$('#slides').slidesjs({
                width: 500,
                height: 250,
                //navigation: false
                play: {
                    active: true,
                    auto: true,
                    interval: 4000,
                    swap: true
                }
            });
        });
    </script>   
";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Page:indexShowPlace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 95,  200 => 94,  197 => 93,  188 => 87,  180 => 81,  178 => 80,  170 => 74,  168 => 73,  160 => 67,  155 => 64,  152 => 63,  149 => 62,  140 => 60,  135 => 59,  131 => 57,  129 => 55,  120 => 53,  116 => 52,  113 => 51,  111 => 50,  106 => 49,  101 => 45,  98 => 44,  92 => 41,  83 => 35,  78 => 33,  75 => 32,  65 => 23,  59 => 19,  55 => 18,  52 => 17,  45 => 12,  40 => 10,  37 => 9,  31 => 6,);
    }
}
