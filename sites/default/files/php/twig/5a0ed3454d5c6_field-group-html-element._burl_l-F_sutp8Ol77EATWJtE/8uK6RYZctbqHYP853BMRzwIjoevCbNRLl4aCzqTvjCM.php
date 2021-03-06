<?php

/* modules/contrib/field_group/templates/field-group-html-element.html.twig */
class __TwigTemplate_313adbb907cde93d2a5757434b9e6c6caf057384736ad13b822d660b05d0f4a5 extends Twig_Template
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
        $tags = array("if" => 20);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
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

        // line 18
        echo "
<";
        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["wrapper_element"]) ? $context["wrapper_element"] : null), "html", null, true));
        echo " ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true));
        echo ">
  ";
        // line 20
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 21
            echo "  <";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_element"]) ? $context["title_element"] : null), "html", null, true));
            if ((isset($context["collapsible"]) ? $context["collapsible"] : null)) {
                echo " class=\"field-group-toggler\"";
            }
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "</";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_element"]) ? $context["title_element"] : null), "html", null, true));
            echo ">
  ";
        }
        // line 23
        echo "  ";
        if ((isset($context["collapsible"]) ? $context["collapsible"] : null)) {
            // line 24
            echo "  <div class=\"field-group-wrapper\">
  ";
        }
        // line 26
        echo "  ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["children"]) ? $context["children"] : null), "html", null, true));
        echo "
  ";
        // line 27
        if ((isset($context["collapsible"]) ? $context["collapsible"] : null)) {
            // line 28
            echo "  </div>
  ";
        }
        // line 30
        echo "</";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["wrapper_element"]) ? $context["wrapper_element"] : null), "html", null, true));
        echo ">";
    }

    public function getTemplateName()
    {
        return "modules/contrib/field_group/templates/field-group-html-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  81 => 28,  79 => 27,  74 => 26,  70 => 24,  67 => 23,  54 => 21,  52 => 20,  46 => 19,  43 => 18,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation for a fieldgroup html element.
 *
 * Available variables:
 * - title: Title of the group.
 * - title_element: Element to wrap the title.
 * - children: The children of the group.
 * - wrapper_element: The html element to use
 * - attributes: A list of HTML attributes for the group wrapper.
 *
 * @see template_preprocess_field_group_html_element()
 *
 * @ingroup themeable
 */
#}

<{{ wrapper_element }} {{ attributes }}>
  {% if title %}
  <{{ title_element }}{% if collapsible %} class=\"field-group-toggler\"{% endif %}>{{ title }}</{{ title_element }}>
  {% endif %}
  {% if collapsible %}
  <div class=\"field-group-wrapper\">
  {% endif %}
  {{children}}
  {% if collapsible %}
  </div>
  {% endif %}
</{{ wrapper_element }}>";
    }
}
