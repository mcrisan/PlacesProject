<?php

/* BundleProjectBundle:Login:index.html.twig */
class __TwigTemplate_5821abf4c8a19ce846ea9dfd2710168abd7ecc7971b74e0a9a109126b5353a4e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BundleProjectBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'body' => array($this, 'block_body'),
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " Login ";
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
        echo " 
<style type=\"text/css\">
    
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type=\"text\"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type=\"password\"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    
</style>
";
    }

    // line 41
    public function block_body($context, array $blocks = array())
    {
        // line 42
        echo "
<article class=\"page-article\">
    
    <form class=\"form-signin\" method=\"POST\" action=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" role=\"form\" style=\"width:300px;\">
        <h2 class=\"form-signin-heading\">Please sign in</h2>
        <input class=\"input-block-level form-control\" placeholder=\"Username\" name='_username' type=\"text\">
        <input class=\"input-block-level form-control\" placeholder=\"Password\" name=\"_password\" type=\"password\">
        <label class=\"checkbox\"> 
            <input  type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked />Remember me
        </label>
        <button class=\"btn btn-large btn-primary btn-block\" type=\"submit\">Sign in</button>
    </form>

</article>

<br />
<div id=\"janrainEngageEmbed\"></div>

";
    }

    public function getTemplateName()
    {
        return "BundleProjectBundle:Login:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 45,  79 => 42,  76 => 41,  36 => 6,  30 => 5,);
    }
}
