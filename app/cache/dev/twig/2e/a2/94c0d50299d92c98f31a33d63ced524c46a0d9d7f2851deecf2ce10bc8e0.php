<?php

/* BundlePlacesBundle:Places:autocomplete.html.twig */
class __TwigTemplate_2ea294c0d50299d92c98f31a33d63ced524c46a0d9d7f2851deecf2ce10bc8e0 extends Twig_Template
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
        echo "<b>Places:</b>
";
        // line 2
        if (twig_test_empty($this->getContext($context, "place"))) {
            // line 3
            echo "    -
    <br/>
";
        } else {
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "place"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 7
                echo "<div class=\"show\" align=\"left\">
";
                // line 8
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo ".&nbsp;<span class=\"name\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "placeName"), "html", null, true);
                echo "</span><br/>
</div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 11
        echo " 
<b>Address:</b>

<div class=\"show\" align=\"left\">
<span class=\"name\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "placesAdd"), "name"), "html", null, true);
        echo "</span><br/>
</div>

";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Places:autocomplete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 15,  69 => 11,  49 => 8,  46 => 7,  29 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
