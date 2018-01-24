<?php

/* modules/contrib/toc_api/templates/toc-header.html.twig */
class __TwigTemplate_0efd2b76fcc9bf4adb2d781cae42f6b04468a581bf8eaff97dfc0b3e56c12c6d extends Twig_Template
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
        $tags = array("if" => 17);
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

        // line 16
        echo "
<";
        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tag"]) ? $context["tag"] : null), "html", null, true));
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true));
        echo ">";
        if ($this->getAttribute((isset($context["header_options"]) ? $context["header_options"] : null), "display_number", array())) {
            echo "<span>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["header_options"]) ? $context["header_options"] : null), "number_prefix", array()), "html", null, true));
            if (($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "number_path", array()) && (isset($context["path"]) ? $context["path"] : null))) {
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["path"]) ? $context["path"] : null), "html", null, true));
            } else {
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true));
            }
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["header_options"]) ? $context["header_options"] : null), "number_suffix", array()), "html", null, true));
            echo "</span>";
        }
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html"]) ? $context["html"] : null), "html", null, true));
        echo "</";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tag"]) ? $context["tag"] : null), "html", null, true));
        echo ">
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/toc_api/templates/toc-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 17,  43 => 16,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to display a Table of contents header.
 *
 * Returns HTML for a Table of contents header.
 *
 * Available variables:
 * - item: A table of contents header item.
 * - options: Table of contents options.
 * - header_options: Options associated with the current header item.
 *
 * @ingroup themeable
 */
#}

<{{ tag }}{{ attributes }}>{% if header_options.display_number %}<span>{{ header_options.number_prefix }}{% if options.number_path and path %}{{ path }}{% else %}{{ value }}{%  endif %}{{ header_options.number_suffix }}</span>{%  endif %}{{ html }}</{{ tag }}>
";
    }
}
