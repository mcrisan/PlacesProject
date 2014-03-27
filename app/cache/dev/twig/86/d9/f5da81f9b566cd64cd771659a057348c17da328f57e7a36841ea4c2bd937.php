<?php

/* BundlePlacesBundle:Page:home.html.twig */
class __TwigTemplate_86d9f5da81f9b566cd64cd771659a057348c17da328f57e7a36841ea4c2bd937 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundlePlacesBundle::base1.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundlePlacesBundle::base1.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        echo " 
\t";
        // line 3
        $context["counter"] = 0;
        // line 4
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 5
            echo "
\t\t<div>
\t\t \t";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                // line 8
                echo "\t\t\t \t";
                if (($this->getContext($context, "counter") > 19)) {
                    // line 9
                    echo "\t\t\t \t\t";
                    $context["counter"] = 0;
                    // line 10
                    echo "\t\t\t \t";
                } else {
                    // line 11
                    echo "\t\t\t \t\t";
                    $context["counter"] = ($this->getContext($context, "counter") + 1);
                    // line 12
                    echo "\t\t\t \t";
                }
                // line 13
                echo "\t\t \t\t";
                if (($this->getContext($context, "i") == 3)) {
                    // line 14
                    echo "\t\t \t\t\t<img id=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "counter"), "html", null, true);
                    echo "\" class=\"no-hovering\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/fast-food.jpg"), "html", null, true);
                    echo "\"/>
\t \t\t\t";
                } else {
                    // line 16
                    echo "\t\t\t \t\t<img id=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "counter"), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/images/fast-food.jpg"), "html", null, true);
                    echo "\"/>
\t\t\t \t";
                }
                // line 18
                echo "\t    \t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    \t</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 23
    public function block_javascript($context, array $blocks = array())
    {
        // line 24
        echo "\t<script>
    \tvar places = ";
        // line 25
        echo twig_jsonencode_filter($this->getContext($context, "places"));
        echo ";
\t</script>
";
    }

    // line 29
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 30
        echo "     <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleplaces/css/home.css"), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Page:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 30,  112 => 29,  105 => 25,  102 => 24,  99 => 23,  90 => 19,  84 => 18,  76 => 16,  68 => 14,  65 => 13,  62 => 12,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  46 => 7,  42 => 5,  37 => 4,  35 => 3,  30 => 2,);
    }
}
