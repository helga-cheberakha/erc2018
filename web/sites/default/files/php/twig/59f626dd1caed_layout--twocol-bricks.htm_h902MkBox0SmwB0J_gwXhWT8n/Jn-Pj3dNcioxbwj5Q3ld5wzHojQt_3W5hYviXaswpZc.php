<?php

/* core/themes/stable/templates/layout/layout--twocol-bricks.html.twig */
class __TwigTemplate_38db8f1d80b6531c72d10cf67aad135578fb6782ff414e07a605ab861aa7f515 extends Twig_Template
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
        $tags = array("set" => 17, "if" => 22);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
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

        // line 17
        $context["classes"] = array(0 => "layout", 1 => "layout--twocol-bricks");
        // line 22
        if (($context["content"] ?? null)) {
            // line 23
            echo "  <div";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => ($context["classes"] ?? null)), "method"), "html", null, true));
            echo ">
    ";
            // line 24
            if ($this->getAttribute(($context["content"] ?? null), "top", array())) {
                // line 25
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "top", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--top"), "method"), "html", null, true));
                echo ">
        ";
                // line 26
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "top", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 29
            echo "
    ";
            // line 30
            if ($this->getAttribute(($context["content"] ?? null), "first_above", array())) {
                // line 31
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "first_above", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--first-above"), "method"), "html", null, true));
                echo ">
        ";
                // line 32
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "first_above", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 35
            echo "
    ";
            // line 36
            if ($this->getAttribute(($context["content"] ?? null), "second_above", array())) {
                // line 37
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "second_above", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--second-above"), "method"), "html", null, true));
                echo ">
        ";
                // line 38
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "second_above", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 41
            echo "
    ";
            // line 42
            if ($this->getAttribute(($context["content"] ?? null), "middle", array())) {
                // line 43
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "middle", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--middle"), "method"), "html", null, true));
                echo ">
        ";
                // line 44
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "middle", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 47
            echo "
    ";
            // line 48
            if ($this->getAttribute(($context["content"] ?? null), "first_below", array())) {
                // line 49
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "first_below", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--first-below"), "method"), "html", null, true));
                echo ">
        ";
                // line 50
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "first_below", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 53
            echo "
    ";
            // line 54
            if ($this->getAttribute(($context["content"] ?? null), "second_below", array())) {
                // line 55
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "second_below", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--second-below"), "method"), "html", null, true));
                echo ">
        ";
                // line 56
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "second_below", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 59
            echo "
    ";
            // line 60
            if ($this->getAttribute(($context["content"] ?? null), "bottom", array())) {
                // line 61
                echo "      <div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "bottom", array()), "addClass", array(0 => "layout__region", 1 => "layout__region--bottom"), "method"), "html", null, true));
                echo ">
        ";
                // line 62
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "bottom", array()), "html", null, true));
                echo "
      </div>
    ";
            }
            // line 65
            echo "  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/layout/layout--twocol-bricks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 65,  155 => 62,  150 => 61,  148 => 60,  145 => 59,  139 => 56,  134 => 55,  132 => 54,  129 => 53,  123 => 50,  118 => 49,  116 => 48,  113 => 47,  107 => 44,  102 => 43,  100 => 42,  97 => 41,  91 => 38,  86 => 37,  84 => 36,  81 => 35,  75 => 32,  70 => 31,  68 => 30,  65 => 29,  59 => 26,  54 => 25,  52 => 24,  47 => 23,  45 => 22,  43 => 17,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "core/themes/stable/templates/layout/layout--twocol-bricks.html.twig", "/home/olha/Projects/freelance/erc2018/erc2018-web/web/core/themes/stable/templates/layout/layout--twocol-bricks.html.twig");
    }
}
