<?php

/* modules/contrib/toc_api/templates/toc-responsive.html.twig */
class __TwigTemplate_2458cec07777e2d5c9bac759d4ed070ce3c39effa52a86872523861e2a37d104 extends Twig_Template
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
        $tags = array("set" => 15);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set'),
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

        // line 15
        $context["classes"] = array(0 => "toc", 1 => "toc-responsive");
        // line 16
        echo "<div ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["desktop"]) ? $context["desktop"] : null), "html", null, true));
        echo "
  ";
        // line 18
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mobile"]) ? $context["mobile"] : null), "html", null, true));
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "modules/contrib/toc_api/templates/toc-responsive.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 18,  50 => 17,  45 => 16,  43 => 15,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to display a responsive table of contents.
 *
 * Returns HTML for a responsive table of contents.
 *
 * Available variables:
 * - desktop: A render array represent a table of content for desktop.
 * - mobile: A render array represent a table of content for mobile.
 *
 * @ingroup themeable
 */
#}
{% set classes = ['toc', 'toc-responsive'] %}
<div {{ attributes.addClass(classes) }}>
  {{ desktop }}
  {{ mobile }}
</div>

";
    }
}
