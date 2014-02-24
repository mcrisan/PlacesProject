<?php

/* @WebProfiler/Profiler/toolbar_js.html.twig */
class __TwigTemplate_05ff10249182d574db433fec219bf0daf84870674cfb177c62165df192253f8c extends Twig_Template
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
        // line 1
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("@WebProfiler/Profiler/base_js.html.twig")->display($context);
        // line 3
        echo "<script>/*<![CDATA[*/
    (function () {
        ";
        // line 5
        if (("top" == $this->getContext($context, "position"))) {
            // line 6
            echo "            var sfwdt = document.getElementById('sfwdt";
            echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
            echo "');
            document.body.insertBefore(
                document.body.removeChild(sfwdt),
                document.body.firstChild
            );
        ";
        }
        // line 12
        echo "
        Sfjs.load(
            'sfwdt";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "',
            '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';

                if (el.style.display == 'none') {
                    return;
                }

                if (Sfjs.getPreference('toolbar/displayState') == 'none') {
                    document.getElementById('sfToolbarMainContent-";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfToolbarClearer-";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfMiniToolbar-";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                } else {
                    document.getElementById('sfToolbarMainContent-";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfToolbarClearer-";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfMiniToolbar-";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                }
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "');
                }
            }
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  66 => 25,  62 => 24,  30 => 5,  26 => 3,  118 => 24,  114 => 23,  86 => 16,  78 => 14,  68 => 12,  56 => 10,  54 => 9,  31 => 7,  28 => 6,  24 => 2,  22 => 3,  19 => 1,  441 => 200,  407 => 129,  395 => 116,  375 => 95,  369 => 91,  360 => 85,  356 => 84,  352 => 82,  350 => 81,  345 => 78,  339 => 76,  333 => 74,  331 => 73,  326 => 71,  319 => 67,  316 => 66,  304 => 62,  302 => 61,  295 => 58,  291 => 56,  284 => 52,  277 => 47,  260 => 31,  248 => 8,  240 => 220,  235 => 218,  232 => 217,  224 => 215,  216 => 212,  210 => 210,  208 => 209,  205 => 208,  196 => 205,  191 => 201,  189 => 198,  164 => 176,  153 => 168,  149 => 167,  143 => 164,  139 => 163,  133 => 160,  121 => 153,  119 => 129,  109 => 21,  107 => 120,  102 => 19,  95 => 113,  93 => 112,  84 => 105,  82 => 31,  72 => 23,  70 => 26,  63 => 18,  57 => 15,  53 => 14,  49 => 8,  45 => 12,  38 => 8,  27 => 2,  42 => 12,  39 => 12,  32 => 6,  835 => 369,  830 => 367,  825 => 366,  819 => 361,  782 => 327,  775 => 318,  769 => 314,  763 => 310,  760 => 309,  752 => 306,  747 => 304,  743 => 303,  739 => 302,  735 => 301,  730 => 300,  727 => 299,  722 => 297,  718 => 296,  714 => 295,  710 => 294,  705 => 293,  700 => 291,  696 => 290,  692 => 289,  688 => 288,  683 => 287,  678 => 285,  674 => 284,  670 => 283,  666 => 282,  661 => 281,  656 => 279,  652 => 278,  648 => 277,  644 => 276,  639 => 275,  634 => 273,  630 => 272,  626 => 271,  622 => 270,  617 => 269,  614 => 268,  612 => 267,  607 => 265,  598 => 264,  595 => 263,  593 => 262,  589 => 261,  582 => 257,  577 => 255,  573 => 253,  570 => 252,  567 => 251,  548 => 236,  545 => 235,  541 => 234,  536 => 231,  533 => 229,  514 => 202,  494 => 195,  492 => 194,  488 => 193,  482 => 189,  476 => 186,  472 => 185,  468 => 184,  464 => 183,  460 => 182,  456 => 180,  452 => 179,  444 => 173,  436 => 198,  428 => 161,  420 => 155,  412 => 149,  410 => 130,  405 => 146,  401 => 120,  396 => 144,  393 => 143,  389 => 112,  382 => 137,  377 => 135,  374 => 133,  371 => 132,  368 => 131,  355 => 128,  347 => 126,  334 => 115,  327 => 113,  320 => 110,  317 => 109,  313 => 107,  310 => 64,  303 => 102,  300 => 101,  296 => 99,  293 => 57,  290 => 97,  286 => 96,  280 => 92,  274 => 91,  268 => 89,  263 => 32,  258 => 86,  254 => 22,  249 => 82,  246 => 81,  244 => 80,  238 => 219,  233 => 74,  229 => 72,  221 => 214,  219 => 213,  211 => 67,  207 => 65,  201 => 63,  199 => 206,  194 => 60,  190 => 58,  186 => 57,  180 => 55,  178 => 54,  171 => 52,  165 => 51,  161 => 50,  154 => 49,  150 => 47,  147 => 46,  136 => 44,  131 => 43,  129 => 159,  125 => 41,  120 => 39,  116 => 38,  112 => 22,  108 => 36,  103 => 35,  100 => 116,  97 => 32,  80 => 31,  64 => 17,  61 => 16,  50 => 15,  46 => 14,  43 => 7,  40 => 6,  34 => 3,  29 => 7,);
    }
}
