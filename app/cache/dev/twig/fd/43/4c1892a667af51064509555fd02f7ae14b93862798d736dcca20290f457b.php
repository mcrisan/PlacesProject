<?php

/* BundlePlacesBundle:Reviews:index.html.twig */
class __TwigTemplate_fd434c1892a667af51064509555fd02f7ae14b93862798d736dcca20290f457b extends Twig_Template
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
        // line 3
        if ((twig_length_filter($this->env, $this->getContext($context, "reviews")) > 3)) {
            // line 4
            echo "    <div class=\"reviews-div\" style=\"padding-right: 3px;height: 350px; overflow: scroll; overflow-x: hidden\">
";
        }
        // line 6
        echo "            
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "reviews"));
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
        foreach ($context['_seq'] as $context["key"] => $context["review"]) {
            // line 8
            echo "        <div class=\"comment";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index0")), "html", null, true);
            echo "\" style=\"border:0px solid black; padding:10px;margin-bottom: 0px\">
            ";
            // line 9
            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "review"), "authorUrl")))) {
                // line 10
                echo "                <h1>";
                echo twig_escape_filter($this->env, (abs($this->getContext($context, "key")) + 1), "html", null, true);
                echo ". <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "authorUrl"), "html", null, true);
                echo "\" target=\"_blank\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "author"), "html", null, true);
                echo "</a> @ <font size=\"2\"><b>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "date")), "html", null, true);
                echo "</b></font></h1>
            ";
            } else {
                // line 12
                echo "                <h1>";
                echo twig_escape_filter($this->env, (abs($this->getContext($context, "key")) + 1), "html", null, true);
                echo ". <a href=\"#\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "author"), "html", null, true);
                echo "</a> @ <font size=\"2\"><b>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "date")), "html", null, true);
                echo "</b></font></h1>
            ";
            }
            // line 14
            echo "                <h2>User vote. aspect: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "ratingAspect"), "html", null, true);
            echo " - rating: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "rating"), "html", null, true);
            echo "</h2>
                <br />
                <p>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "review"), "review"), "html", null, true);
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
            // line 19
            echo "        <p>No reviews for this place !</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['review'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    
";
        // line 22
        if ((twig_length_filter($this->env, $this->getContext($context, "reviews")) > 3)) {
            // line 23
            echo "    </div>
";
        }
        // line 24
        echo " 
";
    }

    public function getTemplateName()
    {
        return "BundlePlacesBundle:Reviews:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 24,  114 => 23,  109 => 21,  102 => 19,  86 => 16,  78 => 14,  68 => 12,  56 => 10,  54 => 9,  49 => 8,  31 => 7,  28 => 6,  24 => 4,  22 => 3,  19 => 2,  871 => 403,  867 => 401,  862 => 399,  857 => 398,  851 => 393,  785 => 330,  778 => 321,  772 => 317,  766 => 313,  763 => 312,  755 => 309,  750 => 307,  746 => 306,  742 => 305,  738 => 304,  733 => 303,  730 => 302,  725 => 300,  721 => 299,  717 => 298,  713 => 297,  708 => 296,  703 => 294,  699 => 293,  695 => 292,  691 => 291,  686 => 290,  681 => 288,  677 => 287,  673 => 286,  669 => 285,  664 => 284,  659 => 282,  655 => 281,  651 => 280,  647 => 279,  642 => 278,  637 => 276,  633 => 275,  629 => 274,  625 => 273,  620 => 272,  617 => 271,  615 => 270,  610 => 268,  601 => 267,  598 => 266,  596 => 265,  592 => 264,  585 => 260,  580 => 258,  576 => 256,  573 => 255,  570 => 254,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 167,  428 => 161,  420 => 155,  412 => 149,  410 => 148,  405 => 146,  401 => 145,  396 => 144,  393 => 143,  389 => 142,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 106,  303 => 102,  300 => 101,  296 => 99,  293 => 98,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 87,  258 => 86,  254 => 85,  249 => 82,  246 => 81,  244 => 80,  238 => 77,  233 => 74,  229 => 72,  221 => 70,  219 => 69,  211 => 67,  207 => 65,  201 => 63,  199 => 62,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 42,  125 => 41,  120 => 39,  116 => 38,  112 => 22,  108 => 36,  103 => 35,  100 => 33,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 14,);
    }
}
