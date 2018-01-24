<?php

/* modules/contrib/toc_api/templates/toc-tree.html.twig */
class __TwigTemplate_2d326972c3dfd65ea67ff26d219df20fe66dc2d8ca4eca37667b05b98da0adbd extends Twig_Template
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
        $tags = array("import" => 24, "set" => 25, "if" => 29, "macro" => 37, "for" => 46);
        $filters = array();
        $functions = array("link" => 48);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'set', 'if', 'macro', 'for'),
                array(),
                array('link')
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

        // line 24
        $context["toc_api_tree"] = $this;
        // line 25
        $context["classes"] = array(0 => "toc", 1 => "toc-tree");
        // line 26
        echo "
<div";
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">

  ";
        // line 29
        if (($this->getAttribute((isset($context["tree"]) ? $context["tree"] : null), "title", array()) &&  !$this->getAttribute((isset($context["options"]) ? $context["options"] : null), "block", array()))) {
            // line 30
            echo "    <h3>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tree"]) ? $context["tree"] : null), "title", array()), "html", null, true));
            echo "</h3>
  ";
        }
        // line 32
        echo "
  ";
        // line 33
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["toc_api_tree"]->gettree_links((isset($context["tree"]) ? $context["tree"] : null))));
        echo "

</div>

";
    }

    // line 37
    public function gettree_links($__item__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 38
            echo "  ";
            $context["toc_api_tree"] = $this;
            // line 39
            echo "
  ";
            // line 40
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "below_type", array())) {
                // line 41
                echo "    <ol class=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "below_type", array()), "html", null, true));
                echo "\">
  ";
            } else {
                // line 43
                echo "    <ul>
  ";
            }
            // line 45
            echo "
  ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "below", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["child_item"]) {
                // line 47
                echo "    <li";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["child_item"], "attributes", array()), "setAttribute", array(0 => "value", 1 => $this->getAttribute($context["child_item"], "value", array())), "method"), "html", null, true));
                echo ">
      ";
                // line 48
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getLink($this->getAttribute($context["child_item"], "html", array()), $this->getAttribute($context["child_item"], "url", array())), "html", null, true));
                echo "
      ";
                // line 49
                if ($this->getAttribute($context["child_item"], "below", array())) {
                    // line 50
                    echo "        ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["toc_api_tree"]->gettree_links($context["child_item"])));
                    echo "
      ";
                }
                // line 52
                echo "    </li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "
  ";
            // line 55
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "below_type", array())) {
                // line 56
                echo "    </ol>
  ";
            } else {
                // line 58
                echo "    </ul>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "modules/contrib/toc_api/templates/toc-tree.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 58,  141 => 56,  139 => 55,  136 => 54,  129 => 52,  123 => 50,  121 => 49,  117 => 48,  112 => 47,  108 => 46,  105 => 45,  101 => 43,  95 => 41,  93 => 40,  90 => 39,  87 => 38,  75 => 37,  66 => 33,  63 => 32,  57 => 30,  55 => 29,  50 => 27,  47 => 26,  45 => 25,  43 => 24,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to display a Table of contents as a tree.
 *
 * Returns HTML for a nested list representation of a Table of contents..
 *
 * Available variables:
 * - tree: A nested list of header items. Each header item contains:
 *   - list_tag: HTML tag for the list.
 *   - list_attributes: HTML attributes for the list.
 *   - attributes: HTML attributes for the table of contents or list item.
 *   - below: The table of contents child items.
 *   - title: The table of contents or header title.
 *   - url: The header fragrment (ie hash) URL, instance of \\Drupal\\Core\\Url.
 *
 * @ingroup themeable
 */
#}
{#
  We call a macro which calls itself to render the full tree.
  @see http://twig.sensiolabs.org/doc/tags/macro.html
#}
{% import _self as toc_api_tree %}
{% set classes = ['toc', 'toc-tree'] %}

<div{{ attributes.addClass(classes) }}>

  {% if tree.title and not options.block %}
    <h3>{{ tree.title }}</h3>
  {% endif %}

  {{ toc_api_tree.tree_links(tree) }}

</div>

{% macro tree_links(item) %}
  {% import _self as toc_api_tree %}

  {% if item.below_type %}
    <ol class=\"{{ item.below_type }}\">
  {% else %}
    <ul>
  {% endif  %}

  {% for child_item in item.below %}
    <li{{ child_item.attributes.setAttribute('value', child_item.value) }}>
      {{ link(child_item.html, child_item.url) }}
      {% if child_item.below %}
        {{ toc_api_tree.tree_links(child_item) }}
      {% endif %}
    </li>
  {% endfor %}

  {% if item.below_type %}
    </ol>
  {% else %}
    </ul>
  {% endif  %}
{% endmacro %}
";
    }
}
