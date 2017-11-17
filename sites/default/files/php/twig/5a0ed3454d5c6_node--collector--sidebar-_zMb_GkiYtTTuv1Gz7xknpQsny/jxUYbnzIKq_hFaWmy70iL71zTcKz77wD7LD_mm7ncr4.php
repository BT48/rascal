<?php

/* themes/rascal/templates/view-modes/node--collector--sidebar-view-mode.html.twig */
class __TwigTemplate_e2e3cbae4b744991b648fb5328559ca438a5e6149ae3e41539b16004e8ed725e extends Twig_Template
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
        $tags = array("set" => 2, "if" => 15);
        $filters = array("clean_class" => 4, "without" => 23, "t" => 26);
        $functions = array("attach_library" => 11);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if'),
                array('clean_class', 'without', 't'),
                array('attach_library')
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
        $context["classes"] = array(0 => "node", 1 => ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->getAttribute(        // line 4
(isset($context["node"]) ? $context["node"] : null), "bundle", array()))), 2 => (($this->getAttribute(        // line 5
(isset($context["node"]) ? $context["node"] : null), "isPromoted", array(), "method")) ? ("node--promoted") : ("")), 3 => (($this->getAttribute(        // line 6
(isset($context["node"]) ? $context["node"] : null), "isSticky", array(), "method")) ? ("node--sticky") : ("")), 4 => (( !$this->getAttribute(        // line 7
(isset($context["node"]) ? $context["node"] : null), "isPublished", array(), "method")) ? ("node--unpublished") : ("")), 5 => ((        // line 8
(isset($context["view_mode"]) ? $context["view_mode"] : null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass((isset($context["view_mode"]) ? $context["view_mode"] : null)))) : ("")));
        // line 11
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("classy/node"), "html", null, true));
        echo "
<div";
        // line 12
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">

  ";
        // line 14
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
  ";
        // line 15
        if ( !(isset($context["page"]) ? $context["page"] : null)) {
            // line 16
            echo "    <h2";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_attributes"]) ? $context["title_attributes"] : null), "html", null, true));
            echo ">
      ";
            // line 17
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            echo "
    </h2>
  ";
        }
        // line 20
        echo "  ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "

  <div";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content_attributes"]) ? $context["content_attributes"] : null), "addClass", array(0 => "node__content"), "method"), "html", null, true));
        echo ">
    ";
        // line 23
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["content"]) ? $context["content"] : null)), "html", null, true));
        echo "
  </div>

<a href=\"";
        // line 26
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
        echo "\" class=\"node--read-more\">";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Find out more")));
        echo "</a>

</div>
";
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/view-modes/node--collector--sidebar-view-mode.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 26,  86 => 23,  82 => 22,  76 => 20,  70 => 17,  65 => 16,  63 => 15,  59 => 14,  54 => 12,  50 => 11,  48 => 8,  47 => 7,  46 => 6,  45 => 5,  44 => 4,  43 => 2,);
    }

    public function getSource()
    {
        return "{%
  set classes = [
    'node',
    'node--type-' ~ node.bundle|clean_class,
    node.isPromoted() ? 'node--promoted',
    node.isSticky() ? 'node--sticky',
    not node.isPublished() ? 'node--unpublished',
    view_mode ? 'node--view-mode-' ~ view_mode|clean_class,
  ]
%}
{{ attach_library('classy/node') }}
<div{{ attributes.addClass(classes) }}>

  {{ title_prefix }}
  {% if not page %}
    <h2{{ title_attributes }}>
      {{ label }}
    </h2>
  {% endif %}
  {{ title_suffix }}

  <div{{ content_attributes.addClass('node__content') }}>
    {{ content|without() }}
  </div>

<a href=\"{{ url }}\" class=\"node--read-more\">{{ 'Find out more'|t }}</a>

</div>
";
    }
}
