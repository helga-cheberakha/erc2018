<?php

/* modules/contrib/bootstrap_kit/templates/bs-columns.html.twig */
class __TwigTemplate_ede04da37abbc5fe37ca2bd5930a6203a8369108fab742c6ad0e0ff8ee785672 extends Twig_Template
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
        $tags = array("if" => 1, "set" => 3, "for" => 4);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'set', 'for'),
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
        if (($context["content"] ?? null)) {
            // line 2
            echo "
";
            // line 3
            $context["columns"] = 0;
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["layout"] ?? null), "getRegionNames", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
                if ($this->getAttribute(($context["content"] ?? null), $context["region"], array(), "array")) {
                    // line 5
                    echo "  ";
                    $context["columns"] = (($context["columns"] ?? null) + 1);
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "
";
            // line 8
            if ((($context["columns"] ?? null) > 0)) {
                // line 9
                echo "<div ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => "row"), "method"), "html", null, true));
                echo ">
  ";
                // line 10
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["layout"] ?? null), "getRegionNames", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
                    if ($this->getAttribute(($context["content"] ?? null), $context["region"], array(), "array")) {
                        // line 11
                        echo "  <div class=\"col-md-";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (12 / ($context["columns"] ?? null)), "html", null, true));
                        echo "\">
    ";
                        // line 12
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), $context["region"], array(), "array"), "html", null, true));
                        echo "
  </div>
  ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 15
                echo "</div>
";
            }
            // line 17
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/bootstrap_kit/templates/bs-columns.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 17,  93 => 15,  83 => 12,  78 => 11,  73 => 10,  68 => 9,  66 => 8,  63 => 7,  55 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/bootstrap_kit/templates/bs-columns.html.twig", "/home/olha/Projects/freelance/erc2018/erc2018-web/web/modules/contrib/bootstrap_kit/templates/bs-columns.html.twig");
    }
}
