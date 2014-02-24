<?php

/* BundleProjectBundle:Reviews:index.html.twig */
class __TwigTemplate_3bf7d79fd6551ce0b923d3b8bb24f45fee91982f11351d2787bd9b98d103889e extends Twig_Template
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
        return "BundleProjectBundle:Reviews:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 24,  114 => 23,  86 => 16,  78 => 14,  68 => 12,  56 => 10,  54 => 9,  31 => 7,  28 => 6,  24 => 4,  22 => 3,  19 => 2,  441 => 200,  407 => 129,  395 => 116,  375 => 95,  369 => 91,  360 => 85,  356 => 84,  352 => 82,  350 => 81,  345 => 78,  339 => 76,  333 => 74,  331 => 73,  326 => 71,  319 => 67,  316 => 66,  304 => 62,  302 => 61,  295 => 58,  291 => 56,  284 => 52,  277 => 47,  260 => 31,  248 => 8,  240 => 220,  235 => 218,  232 => 217,  224 => 215,  216 => 212,  210 => 210,  208 => 209,  205 => 208,  196 => 205,  191 => 201,  189 => 198,  164 => 176,  153 => 168,  149 => 167,  143 => 164,  139 => 163,  133 => 160,  121 => 153,  119 => 129,  109 => 21,  107 => 120,  102 => 19,  95 => 113,  93 => 112,  84 => 105,  82 => 31,  72 => 23,  70 => 22,  63 => 18,  57 => 15,  53 => 14,  49 => 8,  45 => 12,  38 => 8,  27 => 2,  42 => 13,  39 => 12,  32 => 5,  835 => 369,  830 => 367,  825 => 366,  819 => 361,  782 => 327,  775 => 318,  769 => 314,  763 => 310,  760 => 309,  752 => 306,  747 => 304,  743 => 303,  739 => 302,  735 => 301,  730 => 300,  727 => 299,  722 => 297,  718 => 296,  714 => 295,  710 => 294,  705 => 293,  700 => 291,  696 => 290,  692 => 289,  688 => 288,  683 => 287,  678 => 285,  674 => 284,  670 => 283,  666 => 282,  661 => 281,  656 => 279,  652 => 278,  648 => 277,  644 => 276,  639 => 275,  634 => 273,  630 => 272,  626 => 271,  622 => 270,  617 => 269,  614 => 268,  612 => 267,  607 => 265,  598 => 264,  595 => 263,  593 => 262,  589 => 261,  582 => 257,  577 => 255,  573 => 253,  570 => 252,  567 => 251,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 198,  428 => 161,  420 => 155,  412 => 149,  410 => 130,  405 => 146,  401 => 120,  396 => 144,  393 => 143,  389 => 112,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 64,  303 => 102,  300 => 101,  296 => 99,  293 => 57,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 32,  258 => 86,  254 => 22,  249 => 82,  246 => 81,  244 => 80,  238 => 219,  233 => 74,  229 => 72,  221 => 214,  219 => 213,  211 => 67,  207 => 65,  201 => 63,  199 => 206,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 159,  125 => 41,  120 => 39,  116 => 38,  112 => 22,  108 => 36,  103 => 35,  100 => 116,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 9,  46 => 8,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
