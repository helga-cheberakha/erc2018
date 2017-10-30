<?php

/* themes/custom/erc2018/templates/page.html.twig */
class __TwigTemplate_c9936bea08eeb738bc02afdfcc41ded1edb6282fba84de7dd899b35eb0c83ce1 extends Twig_Template
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
        $tags = array("if" => 3);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div id=\"toTop\"><span class=\"glyphicon glyphicon-chevron-up\"></span></div>

";
        // line 3
        if (($this->getAttribute(($context["page"] ?? null), "header_top_left", array()) || $this->getAttribute(($context["page"] ?? null), "header_top_right", array()))) {
            // line 4
            echo "<!-- #header-top -->
<div id=\"header-top\" class=\"clearfix\">
    <div class=\"container\">

        <!-- #header-top-inside -->
        <div id=\"header-top-inside\" class=\"clearfix\">
            <div class=\"row\">
            
            ";
            // line 12
            if ($this->getAttribute(($context["page"] ?? null), "header_top_left", array())) {
                // line 13
                echo "            <div class=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header_top_left_grid_class"] ?? null), "html", null, true));
                echo "\">
                <!-- #header-top-left -->
                <div id=\"header-top-left\" class=\"clearfix\">
                    ";
                // line 16
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header_top_left", array()), "html", null, true));
                echo "
                </div>
                <!-- EOF:#header-top-left -->
            </div>
            ";
            }
            // line 21
            echo "            
            ";
            // line 22
            if ($this->getAttribute(($context["page"] ?? null), "header_top_right", array())) {
                // line 23
                echo "            <div class=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header_top_right_grid_class"] ?? null), "html", null, true));
                echo "\">
                <!-- #header-top-right -->
                <div id=\"header-top-right\" class=\"clearfix\">
                    ";
                // line 26
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header_top_right", array()), "html", null, true));
                echo "
                </div>
                <!-- EOF:#header-top-right -->
            </div>
            ";
            }
            // line 31
            echo "            
            </div>
        </div>
        <!-- EOF: #header-top-inside -->

    </div>
</div>
<!-- EOF: #header-top -->    
";
        }
        // line 40
        echo "
";
        // line 41
        if ($this->getAttribute(($context["page"] ?? null), "banner", array())) {
            // line 42
            echo "    <!-- #banner -->
    <div id=\"banner\" class=\"clearfix\">
        <div class=\"container\">
            <div class=\"row\">
                ";
            // line 46
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "banner", array()), "html", null, true));
            echo "
            </div>
        </div>
    </div>
    <!-- EOF:#banner -->
";
        }
        // line 52
        echo "
";
        // line 53
        if ($this->getAttribute(($context["page"] ?? null), "header", array())) {
            // line 54
            echo "<!-- header -->
<header id=\"header\" role=\"banner\" class=\"clearfix\">

    <div class=\"container\">
        <!-- #header-inside -->
        <div id=\"header-inside\" class=\"clearfix\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    ";
            // line 62
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header", array()), "html", null, true));
            echo "
                </div>
            </div>
        </div>
        <!-- EOF: #header-inside -->
    </div>

</header>
<!-- EOF: #header --> 
";
        }
        // line 72
        echo "
<!-- #main-navigation --> 
<div id=\"main-navigation\" class=\"clearfix\">
    <div class=\"container\">

        <!-- #main-navigation-inside -->
        <div id=\"main-navigation-inside\" class=\"clearfix\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <nav role=\"navigation\" class=\"clearfix\">
                        ";
        // line 82
        if ($this->getAttribute(($context["page"] ?? null), "navigation", array())) {
            // line 83
            echo "                        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation", array()), "html", null, true));
            echo "
                        ";
        } else {
            // line 85
            echo "                            ";
            if (($context["main_menu"] ?? null)) {
                // line 86
                echo "                            ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["main_menu"] ?? null), "html", null, true));
                echo "
                            ";
            }
            // line 88
            echo "                        ";
        }
        // line 89
        echo "                    </nav>
                </div>
            </div>
        </div>
        <!-- EOF: #main-navigation-inside -->

    </div>
</div>
<!-- EOF: #main-navigation -->

<!-- #page -->
<div id=\"page\" class=\"clearfix\">
    ";
        // line 101
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", array())) {
            // line 102
            echo "    <!-- #top-content -->
    <div id=\"top-content\" class=\"clearfix\">
        <div class=\"container\">

            <!-- #top-content-inside -->
            <div id=\"top-content-inside\" class=\"clearfix\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                    ";
            // line 110
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "highlighted", array()), "html", null, true));
            echo "
                    </div>
                </div>
            </div>
            <!-- EOF:#top-content-inside -->

        </div>
    </div>
    <!-- EOF: #top-content -->
    ";
        }
        // line 120
        echo "
    <!-- #main-content -->
    <div id=\"main-content\">
        <div class=\"container\">
        
            <div class=\"row\">
                ";
        // line 126
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", array())) {
            // line 127
            echo "                <aside class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["sidebar_grid_class"] ?? null), "html", null, true));
            echo "\">  
                    <!--#sidebar-first-->
                    <section id=\"sidebar-first\" class=\"sidebar clearfix\">
                    ";
            // line 130
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_first", array()), "html", null, true));
            echo "
                    </section>
                    <!--EOF:#sidebar-first-->
                </aside>
                ";
        }
        // line 135
        echo "
                <section class=\"";
        // line 136
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["main_grid_class"] ?? null), "html", null, true));
        echo "\">

                    <!-- #main -->
                    <div id=\"main\" class=\"clearfix\">
                    
                        <!-- #breadcrumb -->
                        <div id=\"breadcrumb\" class=\"clearfix\">
                            <!-- #breadcrumb-inside -->
                            <div id=\"breadcrumb-inside\" class=\"clearfix\">
                            ";
        // line 145
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["breadcrumb"] ?? null), "html", null, true));
        echo "
                            </div>
                            <!-- EOF: #breadcrumb-inside -->
                        </div>
                        <!-- EOF: #breadcrumb -->

                        ";
        // line 151
        if ($this->getAttribute(($context["page"] ?? null), "promoted", array())) {
            // line 152
            echo "                        <!-- #promoted -->
                            <div id=\"promoted\" class=\"clearfix\">
                                <div id=\"promoted-inside\" class=\"clearfix\">
                                ";
            // line 155
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "promoted", array()), "html", null, true));
            echo "
                                </div>
                            </div>
                        <!-- EOF: #promoted -->
                        ";
        }
        // line 160
        echo "
                        <!-- EOF:#content-wrapper -->
                        <div id=\"content-wrapper\">

                            ";
        // line 164
        if ($this->getAttribute(($context["page"] ?? null), "content", array())) {
            // line 165
            echo "                                ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
            echo "
                            ";
        }
        // line 167
        echo "
                        </div>
                        <!-- EOF:#content-wrapper -->

                    </div>
                    <!-- EOF:#main -->

                </section>
                
                ";
        // line 176
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())) {
            // line 177
            echo "                <aside class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["sidebar_grid_class"] ?? null), "html", null, true));
            echo "\">
                    <!--#sidebar-second-->
                    <section id=\"sidebar-second\" class=\"sidebar clearfix\">
                    ";
            // line 180
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_second", array()), "html", null, true));
            echo "
                    </section>
                    <!--EOF:#sidebar-second-->
                </aside>
                ";
        }
        // line 185
        echo "        
            </div>

        </div>
    </div>
    <!-- EOF:#main-content -->

</div>
<!-- EOF:#page -->

";
        // line 195
        if (((($this->getAttribute(($context["page"] ?? null), "footer_first", array()) || $this->getAttribute(($context["page"] ?? null), "footer_second", array())) || $this->getAttribute(($context["page"] ?? null), "footer_third", array())) || $this->getAttribute(($context["page"] ?? null), "footer_fourth", array()))) {
            // line 196
            echo "<!-- #footer -->
<footer id=\"footer\" class=\"clearfix\">
    <div class=\"container\">
    
        <!-- #footer-inside -->
        <div id=\"footer-inside\" class=\"clearfix\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
            // line 204
            if ($this->getAttribute(($context["page"] ?? null), "footer_first", array())) {
                // line 205
                echo "                    <div class=\"footer-area\">
                    ";
                // line 206
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer_first", array()), "html", null, true));
                echo "
                    </div>
                    ";
            }
            // line 209
            echo "                </div>
                
                <div class=\"col-md-6\">
                    ";
            // line 212
            if ($this->getAttribute(($context["page"] ?? null), "footer_second", array())) {
                // line 213
                echo "                    <div class=\"footer-area\">
                    ";
                // line 214
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer_second", array()), "html", null, true));
                echo "
                    </div>
                    ";
            }
            // line 217
            echo "                </div>
            </div>
        </div>
        <!-- EOF: #footer-inside -->
    
    </div>
</footer> 
<!-- EOF #footer -->
";
        }
        // line 226
        echo "
<footer id=\"subfooter\" class=\"clearfix navbar fixed-bottom navbar-light bg-faded\">

    ";
        // line 229
        if ($this->getAttribute(($context["page"] ?? null), "bottom_content", array())) {
            // line 230
            echo "        <!-- #bottom-content -->
        <div id=\"bottom-content\" class=\"clearfix\">

            <div class=\"container-fluid\">
                <div class=\"row\">
                  ";
            // line 235
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "bottom_content", array()), "html", null, true));
            echo "
                </div>
            </div>

        </div>
        <!-- EOF: #bottom-content -->
    ";
        }
        // line 242
        echo "
    <div class=\"container-fluid\">
        
        <!-- #subfooter-inside -->
        <div id=\"subfooter-inside\" class=\"clearfix\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <!-- #subfooter-left -->
                    <div class=\"subfooter-area\">

                    ";
        // line 252
        if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
            // line 253
            echo "                        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
            echo "
                    ";
        }
        // line 255
        echo "
                    </div>
                    <!-- EOF: #subfooter-left -->
                </div>
            </div>
        </div>
        <!-- EOF: #subfooter-inside -->
    
    </div>
</footer>
<!-- EOF:#subfooter -->";
    }

    public function getTemplateName()
    {
        return "themes/custom/erc2018/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 255,  432 => 253,  430 => 252,  418 => 242,  408 => 235,  401 => 230,  399 => 229,  394 => 226,  383 => 217,  377 => 214,  374 => 213,  372 => 212,  367 => 209,  361 => 206,  358 => 205,  356 => 204,  346 => 196,  344 => 195,  332 => 185,  324 => 180,  317 => 177,  315 => 176,  304 => 167,  298 => 165,  296 => 164,  290 => 160,  282 => 155,  277 => 152,  275 => 151,  266 => 145,  254 => 136,  251 => 135,  243 => 130,  236 => 127,  234 => 126,  226 => 120,  213 => 110,  203 => 102,  201 => 101,  187 => 89,  184 => 88,  178 => 86,  175 => 85,  169 => 83,  167 => 82,  155 => 72,  142 => 62,  132 => 54,  130 => 53,  127 => 52,  118 => 46,  112 => 42,  110 => 41,  107 => 40,  96 => 31,  88 => 26,  81 => 23,  79 => 22,  76 => 21,  68 => 16,  61 => 13,  59 => 12,  49 => 4,  47 => 3,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/erc2018/templates/page.html.twig", "/home/olha/Projects/freelance/erc2018/erc2018-web/web/themes/custom/erc2018/templates/page.html.twig");
    }
}
