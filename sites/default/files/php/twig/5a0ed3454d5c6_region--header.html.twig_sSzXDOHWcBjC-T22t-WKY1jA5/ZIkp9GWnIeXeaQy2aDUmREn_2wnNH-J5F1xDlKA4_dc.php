<?php

/* themes/rascal/templates/regions/region--header.html.twig */
class __TwigTemplate_737d5abd056438a5e0e62ce6a4348ea961976e0a6f7634ef36b1b8b7a7431450 extends Twig_Template
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
        $tags = array("set" => 1, "if" => 5);
        $filters = array("clean_class" => 2);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if'),
                array('clean_class'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

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
        $context["classes"] = array(0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass(        // line 2
(isset($context["region"]) ? $context["region"] : null))), 2 => "container");
        // line 5
        if ((isset($context["content"]) ? $context["content"] : null)) {
            // line 6
            echo "  <div";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
            echo ">
    ";
            // line 7
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
            echo "
    <div class=\"mobile-menu\">
      <button class=\"toggle-id-2 hamburger hamburger--collapse hamburger--accessible js-hamburger\" type=\"button\">
        <span class=\"hamburger-box\">
          <span class=\"hamburger-inner\"></span>
        </span>
      </button>
    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/regions/region--header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 7,  48 => 6,  46 => 5,  44 => 2,  43 => 1,);
    }

    public function getSource()
    {
        return "{% set classes = [
  'region', 'region-' ~ region | clean_class,
  'container'
] %}
{% if content %}
  <div{{ attributes.addClass(classes) }}>
    {{ content }}
    <div class=\"mobile-menu\">
      <button class=\"toggle-id-2 hamburger hamburger--collapse hamburger--accessible js-hamburger\" type=\"button\">
        <span class=\"hamburger-box\">
          <span class=\"hamburger-inner\"></span>
        </span>
      </button>
    </div>
  </div>
{% endif %}
";
    }
}
