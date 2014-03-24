<?php

/* BundlePlacesBundle::layout.html.twig */
class __TwigTemplate_059a3117e990c385fbb6cb54ee579639b7ad89c66843a69d1e9e877064bdf690 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundlePlacesBundle::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundlePlacesBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 12
    public function block_aside($context, array $blocks = array())
    {
        // line 13
        echo "
<!-- Aside bar -->

<div class=\"list-group\">        
    <a href=\"#\" class=\"list-group-item active\">
        <h4 class=\"list-group-item-text\">Global aside</h4>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
    </a>
    <a href=\"#\" class=\"list-group-item\">
        <h4 class=\"list-group-item-text\">Global aside</h4>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
    </a>
    <a href=\"#\" class=\"list-group-item\">
        <h4 class=\"list-group-item-text\">Global aside</h4>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
    </a>
</div>

<div class=\"list-group\">        
    <a href=\"#\" class=\"list-group-item\">
        <h4 class=\"list-group-item-text\">Global aside</h4>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
        <p class=\"list-group-item-text\">aside content</p>
    </a>
    
</div>

";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  39 => 12,  32 => 8,  29 => 7,  74 => 31,  71 => 30,  58 => 20,  55 => 19,  40 => 6,  37 => 5,  31 => 3,);
    }
}
