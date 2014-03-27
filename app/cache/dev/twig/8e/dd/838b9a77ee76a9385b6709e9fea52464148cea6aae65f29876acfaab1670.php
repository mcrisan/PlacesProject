<?php

/* BundlePlacesBundle:Places:morePlaces.html.twig */
class __TwigTemplate_8edd838b9a77ee76a9385b6709e9fea52464148cea6aae65f29876acfaab1670 extends Twig_Template
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
        // line 1
        echo "
<input id=\"nrplaces\" type=\"hidden\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getContext($context, "nrplaces"), "html", null, true);
        echo "\" />
<input id=\"pagplaces\" type=\"hidden\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "pag"), "html", null, true);
        echo "\" />
";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "places"));
        foreach ($context['_seq'] as $context["_key"] => $context["place"]) {
            // line 5
            echo "<a id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
            echo "\" class=\"list-group-item it";
            echo twig_escape_filter($this->env, $this->getContext($context, "pag"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("renderPlace", array("param" => $this->getAttribute($this->getContext($context, "place"), "placeName"))), "html", null, true);
            echo "\">
                <p>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</p>
                <p>
                    ";
            // line 8
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating")) > 1)) {
                // line 9
                echo "                    ";
                if (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 2)) {
                    // line 10
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 12
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 13
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 3)) {
                    // line 16
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 17
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 18
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 19
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 20
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 4)) {
                    // line 22
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 24
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 25
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 26
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 5)) {
                    // line 28
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 29
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 30
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 31
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 32
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") == 5)) {
                    // line 34
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 36
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 37
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                }
                // line 40
                echo "             ";
            } else {
                // line 41
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />  
                <img src=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />  
             ";
            }
            // line 47
            echo "            </p>
                
            </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo " 

";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Places:morePlaces.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 130,  188 => 47,  183 => 45,  179 => 44,  175 => 43,  171 => 42,  166 => 41,  163 => 40,  158 => 38,  154 => 37,  150 => 36,  146 => 35,  141 => 34,  136 => 32,  132 => 31,  128 => 30,  124 => 29,  119 => 28,  114 => 26,  110 => 25,  106 => 24,  102 => 23,  97 => 22,  92 => 20,  88 => 19,  84 => 18,  80 => 17,  75 => 16,  70 => 14,  66 => 13,  62 => 12,  58 => 11,  53 => 10,  50 => 9,  48 => 8,  43 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
