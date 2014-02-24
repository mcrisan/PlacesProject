<?php

/* BundleProjectBundle:Comment:index.html.twig */
class __TwigTemplate_f4336b4220917d1e1c2bc816d96213391544a6853ad9f6403775fac2da08508a extends Twig_Template
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
        // line 2
        echo "
";
        // line 4
        echo "
";
        // line 5
        if ((twig_length_filter($this->env, $this->getContext($context, "comments")) > 3)) {
            // line 6
            echo "    <div class=\"reviews-div\" style=\"padding-right: 3px;height: 350px; overflow: scroll; overflow-x: hidden; border-bottom: 0px;\">
";
        }
        // line 8
        echo "            
    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["key"] => $context["comment"]) {
            // line 10
            echo "        <div class=\"comment";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index0")), "html", null, true);
            echo "\" style=\"border:0px solid black; padding:10px;margin-bottom: 0px\">
            <h1><b>";
            // line 11
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "user")), "html", null, true);
            echo "</b> <span>- on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "created"), "l, F j, Y @ H:i"), "html", null, true);
            echo "</span></h1>
            <br />
            <p>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "comment"), "html", null, true);
            echo "</p>
        </div>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 16
            echo "        <p>No reviews for this place !</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    
";
        // line 19
        if ((twig_length_filter($this->env, $this->getContext($context, "comments")) > 3)) {
            // line 20
            echo "    </div>
";
        }
        // line 21
        echo " 
";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle:Comment:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 21,  90 => 19,  87 => 18,  80 => 16,  64 => 13,  57 => 11,  34 => 9,  27 => 6,  25 => 5,  22 => 4,  19 => 2,  202 => 95,  200 => 94,  197 => 93,  188 => 87,  180 => 81,  178 => 80,  170 => 74,  168 => 73,  160 => 67,  155 => 64,  152 => 63,  149 => 62,  140 => 60,  135 => 59,  131 => 57,  129 => 55,  120 => 53,  116 => 52,  113 => 51,  111 => 50,  106 => 49,  101 => 45,  98 => 44,  92 => 20,  83 => 35,  78 => 33,  75 => 32,  65 => 23,  59 => 19,  55 => 18,  52 => 10,  45 => 12,  40 => 10,  37 => 9,  31 => 8,);
    }
}
