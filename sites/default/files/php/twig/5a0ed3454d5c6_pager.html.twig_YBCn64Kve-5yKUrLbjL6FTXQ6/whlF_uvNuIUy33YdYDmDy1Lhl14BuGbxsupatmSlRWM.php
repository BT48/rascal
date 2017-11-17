<?php

/* themes/rascal/templates/navigation/pager.html.twig */
class __TwigTemplate_eead3ca451a8818cf3a8bbbcabec6e68a2d5b40ff5e6d32bf66b4ff82940d49d extends Twig_Template
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
        $tags = array("if" => 32, "for" => 52, "set" => 55);
        $filters = array("t" => 34, "without" => 41, "default" => 43);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for', 'set'),
                array('t', 'without', 'default'),
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

        // line 32
        if ((isset($context["items"]) ? $context["items"] : null)) {
            // line 33
            echo "  <nav class=\"pager\" role=\"navigation\" aria-labelledby=\"pagination-heading\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">";
            // line 34
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Pagination")));
            echo "</h4>
    <ul class=\"pager__items js-pager__items\">
      ";
            // line 37
            echo "
      ";
            // line 39
            echo "      ";
            if ($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "previous", array())) {
                // line 40
                echo "        <li class=\"pager__item pager__item--previous\">
          <a href=\"";
                // line 41
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "previous", array()), "href", array()), "html", null, true));
                echo "\" title=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to previous page")));
                echo "\" rel=\"prev\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "previous", array()), "attributes", array()), "href", "title", "rel"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 42
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Previous page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 43
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "previous", array(), "any", false, true), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "previous", array(), "any", false, true), "text", array()), t("‹ Previous"))) : (t("‹ Previous"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 47
            echo "      ";
            // line 48
            echo "      ";
            if ($this->getAttribute((isset($context["ellipses"]) ? $context["ellipses"] : null), "previous", array())) {
                // line 49
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 51
            echo "      ";
            // line 52
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "pages", array()));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 53
                echo "        <li class=\"pager__item";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(((((isset($context["current"]) ? $context["current"] : null) == $context["key"])) ? (" is-active") : (""))));
                echo "\">
          ";
                // line 54
                if (((isset($context["current"]) ? $context["current"] : null) == $context["key"])) {
                    // line 55
                    echo "            ";
                    $context["title"] = t("Current page");
                    // line 56
                    echo "          ";
                } else {
                    // line 57
                    echo "            ";
                    $context["title"] = t("Go to page @key", array("@key" => $context["key"]));
                    // line 58
                    echo "          ";
                }
                // line 59
                echo "          <a href=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "href", array()), "html", null, true));
                echo "\" title=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
                echo "\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute($context["item"], "attributes", array()), "href", "title"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">
              ";
                // line 61
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(((((isset($context["current"]) ? $context["current"] : null) == $context["key"])) ? (t("Current page")) : (t("Page")))));
                echo "
            </span>";
                // line 63
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["key"], "html", null, true));
                // line 64
                echo "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "      ";
            // line 68
            echo "      ";
            if ($this->getAttribute((isset($context["ellipses"]) ? $context["ellipses"] : null), "next", array())) {
                // line 69
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 71
            echo "      ";
            // line 72
            echo "      ";
            if ($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array())) {
                // line 73
                echo "        <li class=\"pager__item pager__item--next\">
          <a href=\"";
                // line 74
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array()), "href", array()), "html", null, true));
                echo "\" title=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to next page")));
                echo "\" rel=\"next\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array()), "attributes", array()), "href", "title", "rel"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 75
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Next page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 76
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array(), "any", false, true), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array(), "any", false, true), "text", array()), t("Next ›"))) : (t("Next ›"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 80
            echo "      ";
            // line 81
            echo "    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/navigation/pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 81,  176 => 80,  169 => 76,  165 => 75,  157 => 74,  154 => 73,  151 => 72,  149 => 71,  145 => 69,  142 => 68,  140 => 67,  132 => 64,  130 => 63,  126 => 61,  116 => 59,  113 => 58,  110 => 57,  107 => 56,  104 => 55,  102 => 54,  97 => 53,  92 => 52,  90 => 51,  86 => 49,  83 => 48,  81 => 47,  74 => 43,  70 => 42,  62 => 41,  59 => 40,  56 => 39,  53 => 37,  48 => 34,  45 => 33,  43 => 32,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Theme override to display a pager.
 *
 * Available variables:
 * - items: List of pager items.
 *   The list is keyed by the following elements:
 *   - first: Item for the first page; not present on the first page of results.
 *   - previous: Item for the previous page; not present on the first page
 *     of results.
 *   - next: Item for the next page; not present on the last page of results.
 *   - last: Item for the last page; not present on the last page of results.
 *   - pages: List of pages, keyed by page number.
 *   Sub-sub elements:
 *   items.first, items.previous, items.next, items.last, and each item inside
 *   items.pages contain the following elements:
 *   - href: URL with appropriate query parameters for the item.
 *   - attributes: A keyed list of HTML attributes for the item.
 *   - text: The visible text used for the item link, such as \"‹ Previous\"
 *     or \"Next ›\".
 * - current: The page number of the current page.
 * - ellipses: If there are more pages than the quantity allows, then an
 *   ellipsis before or after the listed pages may be present.
 *   - previous: Present if the currently visible list of pages does not start
 *     at the first page.
 *   - next: Present if the visible list of pages ends before the last page.
 *
 * @see template_preprocess_pager()
 */
#}
{% if items %}
  <nav class=\"pager\" role=\"navigation\" aria-labelledby=\"pagination-heading\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">{{ 'Pagination'|t }}</h4>
    <ul class=\"pager__items js-pager__items\">
      {# Print first item if we are not on the first page. #}

      {# Print previous item if we are not on the first page. #}
      {% if items.previous %}
        <li class=\"pager__item pager__item--previous\">
          <a href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel') }}>
            <span class=\"visually-hidden\">{{ 'Previous page'|t }}</span>
            <span aria-hidden=\"true\">{{ items.previous.text|default('‹ Previous'|t) }}</span>
          </a>
        </li>
      {% endif %}
      {# Add an ellipsis if there are further previous pages. #}
      {% if ellipses.previous %}
        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      {% endif %}
      {# Now generate the actual pager piece. #}
      {% for key, item in items.pages %}
        <li class=\"pager__item{{ current == key ? ' is-active' : '' }}\">
          {% if current == key %}
            {% set title = 'Current page'|t %}
          {% else %}
            {% set title = 'Go to page @key'|t({'@key': key}) %}
          {% endif %}
          <a href=\"{{ item.href }}\" title=\"{{ title }}\"{{ item.attributes|without('href', 'title') }}>
            <span class=\"visually-hidden\">
              {{ current == key ? 'Current page'|t : 'Page'|t }}
            </span>
            {{- key -}}
          </a>
        </li>
      {% endfor %}
      {# Add an ellipsis if there are further next pages. #}
      {% if ellipses.next %}
        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      {% endif %}
      {# Print next item if we are not on the last page. #}
      {% if items.next %}
        <li class=\"pager__item pager__item--next\">
          <a href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel') }}>
            <span class=\"visually-hidden\">{{ 'Next page'|t }}</span>
            <span aria-hidden=\"true\">{{ items.next.text|default('Next ›'|t) }}</span>
          </a>
        </li>
      {% endif %}
      {# Print last item if we are not on the last page. #}
    </ul>
  </nav>
{% endif %}
";
    }
}
