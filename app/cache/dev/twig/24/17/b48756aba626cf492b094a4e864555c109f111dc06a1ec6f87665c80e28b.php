<?php

/* BundlePlacesBundle:Comment:form.html.twig */
class __TwigTemplate_2417b48756aba626cf492b094a4e864555c109f111dc06a1ec6f87665c80e28b extends Twig_Template
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
<form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comment_create", array("place_id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "place"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
    <p><input type=\"submit\" value=\"Submit\"></p>
    ";
        // line 7
        echo "</form>";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Comment:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 7,  28 => 4,  96 => 21,  90 => 19,  87 => 18,  80 => 16,  64 => 13,  57 => 11,  34 => 9,  27 => 6,  25 => 5,  22 => 3,  19 => 2,  202 => 95,  200 => 94,  197 => 93,  188 => 87,  180 => 81,  178 => 80,  170 => 74,  168 => 73,  160 => 67,  155 => 64,  152 => 63,  149 => 62,  140 => 60,  135 => 59,  131 => 57,  129 => 55,  120 => 53,  116 => 52,  113 => 51,  111 => 50,  106 => 49,  101 => 45,  98 => 44,  92 => 20,  83 => 35,  78 => 33,  75 => 32,  65 => 23,  59 => 19,  55 => 18,  52 => 10,  45 => 12,  40 => 10,  37 => 9,  31 => 8,);
    }
}
