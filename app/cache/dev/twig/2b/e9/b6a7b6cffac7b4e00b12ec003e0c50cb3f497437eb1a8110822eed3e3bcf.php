<?php

/* BundleProjectBundle:About:about.html.twig */
class __TwigTemplate_2be9b6a7b6cffac7b4e00b12ec003e0c50cb3f497437eb1a8110822eed3e3bcf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundleProjectBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'aside' => array($this, 'block_aside'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BundleProjectBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " About ";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<article class=\"row\">
    
    <div class=\"\" style=\"border:1px solid black;padding:20px; margin-bottom: 5px; background: green;\">
        .col-xs-12 .col-sm-9 .col-md-9 .col-lg-9
    </div>

    <div class=\"\" style=\"border:1px solid black;padding:20px; margin-bottom: 5px; background: green;\">
        .col-xs-12 .col-sm-9 .col-md-9 .col-lg-9
    </div>
</article>
   
";
    }

    // line 19
    public function block_aside($context, array $blocks = array())
    {
        // line 20
        echo "<aside class=\"row\">
    <div class=\"\" style=\"border:1px solid black; padding:20px;margin-bottom: 5px;\">
        .col-xs-12 .col-sm-3 .col-md-3 .col-lg-3
    </div>
    
        <div class=\"\" style=\"border:1px solid black; padding:20px;margin-bottom: 5px;\">
        .col-xs-12 .col-sm-3 .col-md-3 .col-lg-3
    </div>
</aside>
";
    }

    // line 30
    public function block_javascript($context, array $blocks = array())
    {
        // line 31
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bundleproject/js/setVote.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle:About:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 31,  71 => 30,  58 => 20,  55 => 19,  40 => 6,  37 => 5,  31 => 3,);
    }
}
