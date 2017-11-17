<?php

/* modules/contrib/superfish/templates/superfish-menu-items.html.twig */
class __TwigTemplate_700227f459ef4d391f5771c4f34dd89d5134b5fc7154ce9f1c0e4b3f02279c6f extends Twig_Template
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
        $tags = array("set" => 22, "spaceless" => 23, "for" => 24, "if" => 26);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'spaceless', 'for', 'if'),
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

        // line 21
        echo "
";
        // line 22
        $context["classes"] = array();
        // line 23
        ob_start();
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu_items"]) ? $context["menu_items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 25
            echo "
  ";
            // line 26
            if ( !twig_test_empty($this->getAttribute($context["item"], "children", array(), "array"))) {
                // line 27
                echo "    ";
                $context["item_class"] = ($this->getAttribute($context["item"], "item_class", array()) . " menuparent");
                // line 28
                echo "    ";
                if ($this->getAttribute($context["item"], "multicolumn_column", array(), "array")) {
                    // line 29
                    echo "      ";
                    $context["item_class"] = ((isset($context["item_class"]) ? $context["item_class"] : null) . " sf-multicolumn-column");
                    // line 30
                    echo "    ";
                }
                // line 31
                echo "  ";
            }
            // line 32
            echo "
  <li id=\"";
            // line 33
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true));
            echo "\"
    ";
            // line 34
            if ($this->getAttribute($context["item"], "item_class", array(), "array")) {
                echo " class=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "item_class", array(), "array"), "html", null, true));
                echo "\"";
            }
            echo ">
    ";
            // line 35
            if ($this->getAttribute($context["item"], "multicolumn_column", array(), "array")) {
                // line 36
                echo "    <div class=\"sf-multicolumn-column\">
    ";
            }
            // line 38
            echo "    ";
            if ( !twig_test_empty($this->getAttribute($context["item"], "children", array(), "array"))) {
                // line 39
                echo "      ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "link_menuparent", array(), "array"), "html", null, true));
                echo "
    ";
            } else {
                // line 41
                echo "      ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "link", array(), "array"), "html", null, true));
                echo "
    ";
            }
            // line 43
            echo "    ";
            if ($this->getAttribute($context["item"], "multicolumn_wrapper", array(), "array")) {
                echo "<ul class=\"sf-multicolumn\">
    <li class=\"sf-multicolumn-wrapper ";
                // line 44
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "item_class", array(), "array"), "html", null, true));
                echo "\">
    ";
            }
            // line 46
            echo "    ";
            if ( !twig_test_empty($this->getAttribute($context["item"], "children", array(), "array"))) {
                // line 47
                echo "      ";
                if ($this->getAttribute($context["item"], "multicolumn_content", array(), "array")) {
                    echo "<ol>";
                } else {
                    echo "<ul>";
                }
                // line 48
                echo "      ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "children", array(), "array"), "html", null, true));
                echo "
      ";
                // line 49
                if ($this->getAttribute($context["item"], "multicolumn_content", array(), "array")) {
                    echo "</ol>";
                } else {
                    echo "</ul>";
                }
                // line 50
                echo "    ";
            }
            // line 51
            echo "    ";
            if ($this->getAttribute($context["item"], "multicolumn_wrapper", array(), "array")) {
                echo "</li></ul>";
            }
            // line 52
            echo "    ";
            if ($this->getAttribute($context["item"], "multicolumn_column", array(), "array")) {
                echo "</div>";
            }
            // line 53
            echo "  </li>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "modules/contrib/superfish/templates/superfish-menu-items.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 53,  149 => 52,  144 => 51,  141 => 50,  135 => 49,  130 => 48,  123 => 47,  120 => 46,  115 => 44,  110 => 43,  104 => 41,  98 => 39,  95 => 38,  91 => 36,  89 => 35,  81 => 34,  77 => 33,  74 => 32,  71 => 31,  68 => 30,  65 => 29,  62 => 28,  59 => 27,  57 => 26,  54 => 25,  50 => 24,  48 => 23,  46 => 22,  43 => 21,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation of Superfish menu items.
 *
 * Available variables:
 * - html_id: Unique menu item identifier.
 * - item_class: Menu item classes.
 * - link: Link element.
 * - link_menuparent: Link element, when a menu parent.
 * - children: Menu item children.
 * - multicolumn_wrapper: Whether the menu item contains a column.
 * - multicolumn_column: Whether the menu item contains a column.
 * - multicolumn_content: Whether the menu item contains a column.
 *
 * @see template_preprocess_superfish_menu_items()
 *
 * @ingroup themeable
 */
#}

{% set classes = [] %}
{% spaceless %}
{% for item in menu_items %}

  {% if item['children'] is not empty %}
    {% set item_class = item.item_class ~ ' menuparent' %}
    {% if item['multicolumn_column'] %}
      {% set item_class = item_class ~ ' sf-multicolumn-column' %}
    {% endif %}
  {% endif %}

  <li id=\"{{ item.id }}\"
    {% if item['item_class'] %} class=\"{{ item['item_class'] }}\"{% endif %}>
    {% if item['multicolumn_column'] %}
    <div class=\"sf-multicolumn-column\">
    {% endif %}
    {% if item['children'] is not empty %}
      {{ item['link_menuparent'] }}
    {% else %}
      {{ item['link'] }}
    {% endif %}
    {% if item['multicolumn_wrapper'] %}<ul class=\"sf-multicolumn\">
    <li class=\"sf-multicolumn-wrapper {{ item['item_class'] }}\">
    {% endif %}
    {% if item['children'] is not empty %}
      {% if item['multicolumn_content'] %}<ol>{% else %}<ul>{% endif %}
      {{ item['children'] }}
      {% if item['multicolumn_content'] %}</ol>{% else %}</ul>{% endif %}
    {% endif %}
    {% if item['multicolumn_wrapper'] %}</li></ul>{% endif %}
    {% if item['multicolumn_column'] %}</div>{% endif %}
  </li>

{% endfor %}
{% endspaceless %}
";
    }
}
