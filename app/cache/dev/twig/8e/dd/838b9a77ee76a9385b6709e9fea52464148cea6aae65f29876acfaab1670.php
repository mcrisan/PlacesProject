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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "places"));
        foreach ($context['_seq'] as $context["_key"] => $context["place"]) {
            // line 2
            echo "<a id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeId"), "html", null, true);
            echo "\" class=\"list-group-item it2\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("renderPlace", array("param" => $this->getAttribute($this->getContext($context, "place"), "placeName"))), "html", null, true);
            echo "\">
                <p>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</p>
                <p>
                    ";
            // line 5
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating")) > 1)) {
                // line 6
                echo "                    ";
                if (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 2)) {
                    // line 7
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 8
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 9
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 10
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 3)) {
                    // line 13
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 15
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 17
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 4)) {
                    // line 19
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 20
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 21
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") < 5)) {
                    // line 25
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 26
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 27
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 28
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 29
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                } elseif (($this->getAttribute($this->getContext($context, "place"), "placeRating") == 5)) {
                    // line 31
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 32
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 34
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/star.png"), "html", null, true);
                    echo "\" width=\"15\" height=\"15\" />
                ";
                }
                // line 37
                echo "             ";
            } else {
                // line 38
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />
                <img src=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />  
                <img src=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/blank_star.png"), "html", null, true);
                echo "\" width=\"15\" height=\"15\" />  
             ";
            }
            // line 44
            echo "            </p>
                
            </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo " ";
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
        return array (  184 => 127,  175 => 44,  170 => 42,  166 => 41,  162 => 40,  158 => 39,  153 => 38,  150 => 37,  145 => 35,  141 => 34,  137 => 33,  133 => 32,  128 => 31,  123 => 29,  119 => 28,  115 => 27,  111 => 26,  106 => 25,  101 => 23,  97 => 22,  93 => 21,  89 => 20,  84 => 19,  79 => 17,  75 => 16,  71 => 15,  67 => 14,  62 => 13,  57 => 11,  53 => 10,  49 => 9,  45 => 8,  40 => 7,  37 => 6,  35 => 5,  30 => 3,  23 => 2,  19 => 1,);
    }
}
