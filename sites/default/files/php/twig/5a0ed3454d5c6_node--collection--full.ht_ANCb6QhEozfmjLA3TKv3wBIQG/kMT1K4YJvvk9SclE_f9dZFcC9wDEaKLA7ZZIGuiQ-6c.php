<?php

/* themes/rascal/templates/content-types/node--collection--full.html.twig */
class __TwigTemplate_ec001ca32b7109b7816f96906285c3a6b7636917684f52455c5d5069449a1836 extends Twig_Template
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
        $tags = array("set" => 2, "if" => 15, "trans" => 26);
        $filters = array("clean_class" => 4, "without" => 42);
        $functions = array("attach_library" => 11, "path" => 34);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if', 'trans'),
                array('clean_class', 'without'),
                array('attach_library', 'path')
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
<article";
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
      <a href=\"";
            // line 17
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
            echo "\" rel=\"bookmark\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            echo "</a>
    </h2>
  ";
        }
        // line 20
        echo "  ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "

  ";
        // line 22
        if ((isset($context["display_submitted"]) ? $context["display_submitted"] : null)) {
            // line 23
            echo "    <footer class=\"node__meta\">
      ";
            // line 24
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["author_picture"]) ? $context["author_picture"] : null), "html", null, true));
            echo "
      <div";
            // line 25
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["author_attributes"]) ? $context["author_attributes"] : null), "addClass", array(0 => "node__submitted"), "method"), "html", null, true));
            echo ">
        ";
            // line 26
            echo t("Submitted by @author_name on @date", array("@author_name" => (isset($context["author_name"]) ? $context["author_name"] : null), "@date" => (isset($context["date"]) ? $context["date"] : null), ));
            // line 27
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["metadata"]) ? $context["metadata"] : null), "html", null, true));
            echo "
      </div>
    </footer>
  ";
        }
        // line 31
        echo "
  <div";
        // line 32
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content_attributes"]) ? $context["content_attributes"] : null), "addClass", array(0 => "node__content col-sm-16"), "method"), "html", null, true));
        echo " role=\"main\">
    <div class=\"fields--location-identifier\">
      <a href=\"";
        // line 34
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getPath("entity.node.canonical", array("node" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["node"]) ? $context["node"] : null), "field_institution_ref", array()), "entity", array()), "nid", array()), "value", array()))), "html", null, true));
        echo "\">";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["node"]) ? $context["node"] : null), "field_institution_ref", array()), "entity", array()), "title", array()), "value", array()), "html", null, true));
        echo "</a>
      ";
        // line 35
        if ($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_identifier", array()), 0, array())) {
            // line 36
            echo "        | ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_identifier", array()), 0, array()), "html", null, true));
            echo "
      ";
        }
        // line 38
        echo "      ";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_online", array()), 0, array()))) {
            // line 39
            echo "        | ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_online", array()), "html", null, true));
            echo "
      ";
        }
        // line 41
        echo "    </div>
    ";
        // line 42
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["content"]) ? $context["content"] : null), "field_access_control", "field_institution_ref", "field_access_control", "field_collector", "field_owner", "field_identifier", "field_collection_link"), "html", null, true));
        echo "
  </div>


  <aside class=\"node__sidebar col-sm-8\">
    ";
        // line 48
        echo "    ";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_institution_ref", array()), 0, array()))) {
            // line 49
            echo "    <div class=\"block__content\">
      <div class=\"field__label\">Location</div>
      ";
            // line 51
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_institution_ref", array()), "html", null, true));
            echo "
    </div>
    ";
        }
        // line 54
        echo "
    ";
        // line 55
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_access_control", array()), 0, array()))) {
            // line 56
            echo "    <div class=\"block__content\">
      ";
            // line 57
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_access_control", array()), "html", null, true));
            echo "
      ";
            // line 58
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_online", array()), 0, array()))) {
                // line 59
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_online", array()), "html", null, true));
                echo "
      ";
            }
            // line 61
            echo "      ";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_link", array()), 0, array()))) {
                // line 62
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collection_link", array()), "html", null, true));
                echo "
      ";
            }
            // line 64
            echo "    </div>
    ";
        }
        // line 66
        echo "
    ";
        // line 67
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collector", array()), 0, array()))) {
            // line 68
            echo "    <div class=\"block__content\">
      ";
            // line 69
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_collector", array()), "html", null, true));
            echo "
    </div>
    ";
        }
        // line 72
        echo "
    ";
        // line 73
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_owner", array()), 0, array()))) {
            // line 74
            echo "    <div class=\"block__content\">
      ";
            // line 75
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_owner", array()), "html", null, true));
            echo "
    </div>
    ";
        }
        // line 78
        echo "
  </aside>

</article>
";
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/content-types/node--collection--full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 78,  217 => 75,  214 => 74,  212 => 73,  209 => 72,  203 => 69,  200 => 68,  198 => 67,  195 => 66,  191 => 64,  185 => 62,  182 => 61,  176 => 59,  174 => 58,  170 => 57,  167 => 56,  165 => 55,  162 => 54,  156 => 51,  152 => 49,  149 => 48,  141 => 42,  138 => 41,  132 => 39,  129 => 38,  123 => 36,  121 => 35,  115 => 34,  110 => 32,  107 => 31,  99 => 27,  97 => 26,  93 => 25,  89 => 24,  86 => 23,  84 => 22,  78 => 20,  70 => 17,  65 => 16,  63 => 15,  59 => 14,  54 => 12,  50 => 11,  48 => 8,  47 => 7,  46 => 6,  45 => 5,  44 => 4,  43 => 2,);
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
<article{{ attributes.addClass(classes) }}>

  {{ title_prefix }}
  {% if not page %}
    <h2{{ title_attributes }}>
      <a href=\"{{ url }}\" rel=\"bookmark\">{{ label }}</a>
    </h2>
  {% endif %}
  {{ title_suffix }}

  {% if display_submitted %}
    <footer class=\"node__meta\">
      {{ author_picture }}
      <div{{ author_attributes.addClass('node__submitted') }}>
        {% trans %}Submitted by {{ author_name }} on {{ date }}{% endtrans %}
        {{ metadata }}
      </div>
    </footer>
  {% endif %}

  <div{{ content_attributes.addClass('node__content col-sm-16') }} role=\"main\">
    <div class=\"fields--location-identifier\">
      <a href=\"{{ path('entity.node.canonical', {'node': node.field_institution_ref.entity.nid.value }) }}\">{{ node.field_institution_ref.entity.title.value  }}</a>
      {% if content.field_identifier.0 %}
        | {{ content.field_identifier.0 }}
      {% endif %}
      {% if content.field_collection_online.0 is not empty %}
        | {{ content.field_collection_online }}
      {% endif %}
    </div>
    {{ content|without('field_access_control', 'field_institution_ref', 'field_access_control', 'field_collector', 'field_owner', 'field_identifier', 'field_collection_link' ) }}
  </div>


  <aside class=\"node__sidebar col-sm-8\">
    {# location #}
    {% if content.field_institution_ref.0 is not empty %}
    <div class=\"block__content\">
      <div class=\"field__label\">Location</div>
      {{ content.field_institution_ref }}
    </div>
    {% endif %}

    {% if content.field_access_control.0 is not empty %}
    <div class=\"block__content\">
      {{ content.field_access_control }}
      {% if content.field_collection_online.0 is not empty %}
        {{ content.field_collection_online }}
      {% endif %}
      {% if content.field_collection_link.0 is not empty %}
        {{ content.field_collection_link }}
      {% endif %}
    </div>
    {% endif %}

    {% if content.field_collector.0 is not empty %}
    <div class=\"block__content\">
      {{ content.field_collector }}
    </div>
    {% endif %}

    {% if content.field_owner.0 is not empty %}
    <div class=\"block__content\">
      {{ content.field_owner }}
    </div>
    {% endif %}

  </aside>

</article>
";
    }
}
