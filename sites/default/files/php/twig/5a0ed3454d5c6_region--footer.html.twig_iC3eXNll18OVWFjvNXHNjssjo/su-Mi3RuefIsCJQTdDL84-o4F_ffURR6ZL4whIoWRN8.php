<?php

/* themes/rascal/templates/regions/region--footer.html.twig */
class __TwigTemplate_57cce6ad2a9ac00ae1bea6cccec4a21bdbafc5b0e8218b4d1b4817267bcde10c extends Twig_Template
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
        $tags = array("set" => 2, "if" => 8);
        $filters = array("clean_class" => 4);
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

        // line 2
        $context["classes"] = array(0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass(        // line 4
(isset($context["region"]) ? $context["region"] : null))), 2 => "container");
        // line 8
        if ((isset($context["content"]) ? $context["content"] : null)) {
            // line 9
            echo "  <div";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
            echo ">
    <div class=\"container\">
        ";
            // line 11
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
            echo "
    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/regions/region--footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  48 => 9,  46 => 8,  44 => 4,  43 => 2,);
    }

    public function getSource()
    {
        return "{%
  set classes = [
    'region',
    'region-' ~ region|clean_class,
    'container',
  ]
%}
{% if content %}
  <div{{ attributes.addClass(classes) }}>
    <div class=\"container\">
        {{ content }}
    </div>
  </div>
{% endif %}
";
    }
}
