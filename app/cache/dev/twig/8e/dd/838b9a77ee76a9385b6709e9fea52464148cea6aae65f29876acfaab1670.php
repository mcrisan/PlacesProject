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
            echo "\" class=\"list-group-item\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("renderPlace", array("param" => $this->getAttribute($this->getContext($context, "place"), "placeName"))), "html", null, true);
            echo "\">
                <p>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeName"), "html", null, true);
            echo "</p>
                <p>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "place"), "placeRating"), "html", null, true);
            echo "</p>
                
            </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
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
        return array (  44 => 43,  34 => 4,  30 => 3,  23 => 2,  19 => 1,);
    }
}
