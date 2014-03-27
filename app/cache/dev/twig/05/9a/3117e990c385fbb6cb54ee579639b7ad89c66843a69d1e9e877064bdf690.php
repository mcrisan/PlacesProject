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
        return array (  42 => 13,  39 => 12,  32 => 8,  747 => 357,  743 => 355,  738 => 353,  733 => 352,  652 => 274,  645 => 265,  639 => 261,  633 => 257,  630 => 256,  622 => 253,  616 => 252,  610 => 250,  604 => 248,  601 => 247,  597 => 246,  592 => 244,  583 => 243,  580 => 242,  578 => 241,  574 => 240,  567 => 236,  562 => 234,  558 => 232,  555 => 231,  552 => 230,  530 => 212,  527 => 211,  523 => 210,  518 => 207,  515 => 205,  496 => 178,  476 => 171,  474 => 170,  470 => 169,  464 => 165,  458 => 162,  454 => 161,  450 => 160,  446 => 159,  442 => 158,  438 => 156,  434 => 155,  428 => 154,  424 => 152,  420 => 150,  417 => 149,  413 => 148,  409 => 147,  405 => 146,  400 => 145,  397 => 144,  393 => 143,  386 => 138,  381 => 136,  378 => 134,  375 => 133,  372 => 132,  359 => 129,  351 => 127,  338 => 116,  331 => 114,  324 => 111,  321 => 110,  317 => 108,  314 => 107,  307 => 103,  304 => 102,  300 => 100,  297 => 99,  294 => 98,  290 => 97,  284 => 93,  278 => 92,  272 => 90,  267 => 88,  262 => 87,  258 => 86,  253 => 83,  250 => 82,  248 => 81,  242 => 78,  237 => 75,  233 => 73,  225 => 71,  223 => 70,  215 => 68,  211 => 66,  205 => 64,  203 => 63,  198 => 61,  194 => 59,  190 => 58,  184 => 56,  182 => 55,  175 => 53,  169 => 52,  165 => 51,  158 => 50,  154 => 48,  151 => 47,  140 => 45,  135 => 44,  133 => 43,  129 => 42,  124 => 40,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 33,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
