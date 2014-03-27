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
        return array (  118 => 24,  114 => 23,  86 => 16,  78 => 14,  68 => 12,  56 => 10,  54 => 9,  31 => 7,  28 => 6,  24 => 4,  22 => 3,  19 => 2,  429 => 188,  398 => 136,  395 => 135,  389 => 126,  383 => 122,  377 => 118,  357 => 95,  342 => 85,  334 => 82,  332 => 81,  327 => 78,  315 => 74,  313 => 73,  308 => 71,  301 => 67,  298 => 66,  292 => 64,  286 => 62,  277 => 58,  275 => 57,  273 => 56,  266 => 52,  259 => 47,  245 => 32,  236 => 22,  230 => 8,  222 => 208,  220 => 207,  217 => 206,  214 => 205,  206 => 203,  201 => 201,  192 => 198,  187 => 196,  181 => 194,  178 => 193,  173 => 189,  171 => 186,  168 => 185,  166 => 184,  159 => 177,  150 => 174,  144 => 171,  134 => 167,  130 => 166,  121 => 159,  119 => 135,  109 => 21,  107 => 126,  102 => 19,  95 => 119,  93 => 118,  84 => 111,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 8,  45 => 12,  38 => 8,  27 => 2,  42 => 13,  39 => 12,  32 => 5,  747 => 357,  743 => 355,  738 => 353,  733 => 352,  652 => 274,  645 => 265,  639 => 261,  633 => 257,  630 => 256,  622 => 253,  616 => 252,  610 => 250,  604 => 248,  601 => 247,  597 => 246,  592 => 244,  583 => 243,  580 => 242,  578 => 241,  574 => 240,  567 => 236,  562 => 234,  558 => 232,  555 => 231,  552 => 230,  530 => 212,  527 => 211,  523 => 210,  518 => 207,  515 => 205,  496 => 178,  476 => 171,  474 => 170,  470 => 169,  464 => 165,  458 => 162,  454 => 161,  450 => 160,  446 => 159,  442 => 158,  438 => 156,  434 => 155,  428 => 154,  424 => 186,  420 => 150,  417 => 149,  413 => 148,  409 => 147,  405 => 146,  400 => 145,  397 => 144,  393 => 143,  386 => 138,  381 => 136,  378 => 134,  375 => 133,  372 => 132,  359 => 129,  351 => 91,  338 => 84,  331 => 114,  324 => 111,  321 => 76,  317 => 108,  314 => 107,  307 => 103,  304 => 102,  300 => 100,  297 => 99,  294 => 98,  290 => 97,  284 => 61,  278 => 92,  272 => 90,  267 => 88,  262 => 87,  258 => 86,  253 => 83,  250 => 82,  248 => 81,  242 => 31,  237 => 75,  233 => 73,  225 => 71,  223 => 70,  215 => 68,  211 => 66,  205 => 64,  203 => 202,  198 => 200,  194 => 59,  190 => 197,  184 => 56,  182 => 55,  175 => 53,  169 => 52,  165 => 51,  158 => 50,  154 => 175,  151 => 47,  140 => 170,  135 => 44,  133 => 43,  129 => 42,  124 => 40,  120 => 39,  116 => 38,  112 => 22,  108 => 36,  103 => 35,  100 => 122,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
