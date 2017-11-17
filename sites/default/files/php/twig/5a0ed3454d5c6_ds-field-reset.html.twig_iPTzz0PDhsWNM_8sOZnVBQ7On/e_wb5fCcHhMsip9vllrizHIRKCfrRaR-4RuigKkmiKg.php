<?php

/* modules/ds/templates/ds-field-reset.html.twig */
class __TwigTemplate_c09511c63ee73c8bb795fd53a6a2bb9d18a3fb1d555117337bc2e7f76bafa4c8 extends Twig_Template
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
        $tags = array("if" => 15, "for" => 21);
        $filters = array("clean_class" => 16);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
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

        // line 15
        if ( !(isset($context["label_hidden"]) ? $context["label_hidden"] : null)) {
            // line 16
            echo "  <div class=\"field-label-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, \Drupal\Component\Utility\Html::getClass($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "#label_display", array(), "array")), "html", null, true));
            echo "\">";
            // line 17
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            if ((isset($context["show_colon"]) ? $context["show_colon"] : null)) {
                echo ":";
            }
            // line 18
            echo "</div>
";
        }
        // line 20
        echo "
";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 22
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true));
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "modules/ds/templates/ds-field-reset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 22,  61 => 21,  58 => 20,  54 => 18,  49 => 17,  45 => 16,  43 => 15,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Template to reset all HTML for the field.
 *
 * Available variables:
 * - element: The field element.
 * - label: The label of the field.
 * - show_colon: TRUE if colon should be displayed after label.
 * - items: List of all the field items. Each item contains:
 *   - attributes: List of HTML attributes for each item.
 *   - content: The field item's content.
 */
#}
{% if not label_hidden %}
  <div class=\"field-label-{{ element['#label_display']|clean_class }}\">
    {{- label }}{% if show_colon %}:{% endif -%}
  </div>
{% endif %}

{% for item in items %}
  {{ item.content }}
{% endfor %}
";
    }
}
