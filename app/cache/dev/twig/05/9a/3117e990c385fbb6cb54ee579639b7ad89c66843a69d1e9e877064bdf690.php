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
        return array (  42 => 13,  39 => 12,  32 => 8,  835 => 369,  830 => 367,  825 => 366,  819 => 361,  782 => 327,  775 => 318,  769 => 314,  763 => 310,  760 => 309,  752 => 306,  747 => 304,  743 => 303,  739 => 302,  735 => 301,  730 => 300,  727 => 299,  722 => 297,  718 => 296,  714 => 295,  710 => 294,  705 => 293,  700 => 291,  696 => 290,  692 => 289,  688 => 288,  683 => 287,  678 => 285,  674 => 284,  670 => 283,  666 => 282,  661 => 281,  656 => 279,  652 => 278,  648 => 277,  644 => 276,  639 => 275,  634 => 273,  630 => 272,  626 => 271,  622 => 270,  617 => 269,  614 => 268,  612 => 267,  607 => 265,  598 => 264,  595 => 263,  593 => 262,  589 => 261,  582 => 257,  577 => 255,  573 => 253,  570 => 252,  567 => 251,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 167,  428 => 161,  420 => 155,  412 => 149,  410 => 148,  405 => 146,  401 => 145,  396 => 144,  393 => 143,  389 => 142,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 106,  303 => 102,  300 => 101,  296 => 99,  293 => 98,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 87,  258 => 86,  254 => 85,  249 => 82,  246 => 81,  244 => 80,  238 => 77,  233 => 74,  229 => 72,  221 => 70,  219 => 69,  211 => 67,  207 => 65,  201 => 63,  199 => 62,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 42,  125 => 41,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  103 => 35,  100 => 33,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
