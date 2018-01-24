<?php

/* modules/contrib/toc_api/templates/toc-menu.html.twig */
class __TwigTemplate_7bff9ab789c7487abc4e530da61d20ccbfa79e7ef1bb91a15fc2e4d79b6cd83a extends Twig_Template
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
        $tags = array("set" => 17, "for" => 21);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'for'),
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

        // line 17
        $context["classes"] = array(0 => "toc", 1 => "toc-menu");
        // line 18
        echo "<form ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  <select>
    <option value=\"\">";
        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo "</option>
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["index"]) ? $context["index"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 22
            echo "      <option value=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
            echo "\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "prefix", array()), "html", null, true));
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true));
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "  </select>
</form>

";
    }

    public function getTemplateName()
    {
        return "modules/contrib/toc_api/templates/toc-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 24,  59 => 22,  55 => 21,  51 => 20,  45 => 18,  43 => 17,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to display a table of contents as a select menu.
 *
 * Returns HTML for a Table of contents select menu.
 *
 * Available variables:
 * - index: List of header items. Each header item contains:
 *   - prefix: The header option prefix. Either indentation or the complete path.
 *   - title: The header title.
 *   - url: The header fragrment (ie hash) URL, instance of \\Drupal\\Core\\Url.
 *
 * @ingroup themeable
 */
#}
{% set classes = ['toc', 'toc-menu'] %}
<form {{ attributes.addClass(classes) }}>
  <select>
    <option value=\"\">{{ title }}</option>
    {% for item in index %}
      <option value=\"{{ item.url }}\">{{ item.prefix }}{{ item.title }}</option>
    {% endfor %}
  </select>
</form>

";
    }
}
