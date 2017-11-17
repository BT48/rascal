<?php

/* themes/rascal/templates/layouts/page--front.html.twig */
class __TwigTemplate_c6550829603875dc31213d910f46b1798946476db5ec1dbe1790637adaf37460 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
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

        // line 45
        echo "<div class=\"layout-container\" canvas=\"container\">
  <div canvas=\"container\" class=\"\">
    <header role=\"nav\" class=\"header\">
      ";
        // line 48
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true));
        echo "
      ";
        // line 49
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
    </header>
    ";
        // line 51
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
        echo "
    <div role=\"main\" class=\"main container\">

      <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 55
        echo "
      <div class=\"layout-content\">
        ";
        // line 57
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "
        ";
        // line 58
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_front", array()), "html", null, true));
        echo "
      </div>";
        // line 60
        echo "    </div>

    <footer class=\"footer\" role=\"contentinfo\">
      ";
        // line 63
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
        echo "
    </footer>
    <footer class=\"footer_bottom\" role=\"contentinfo\">
      ";
        // line 66
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_bottom", array()), "html", null, true));
        echo "
    </footer>
  </div>
</div>";
        // line 70
        echo "
";
        // line 72
        echo "<div off-canvas=\"id-2 right overlay\">
  <div class=\"menu-expanded nav-toggle sb-toggle-right\">
  </div>
  ";
        // line 75
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slidebar", array()), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/rascal/templates/layouts/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 75,  95 => 72,  92 => 70,  86 => 66,  80 => 63,  75 => 60,  71 => 58,  67 => 57,  63 => 55,  57 => 51,  52 => 49,  48 => 48,  43 => 45,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Theme override to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
<div class=\"layout-container\" canvas=\"container\">
  <div canvas=\"container\" class=\"\">
    <header role=\"nav\" class=\"header\">
      {{ page.secondary_menu }}
      {{ page.header }}
    </header>
    {{ page.highlighted }}
    <div role=\"main\" class=\"main container\">

      <a id=\"main-content\" tabindex=\"-1\"></a>{# link is in html.html.twig #}

      <div class=\"layout-content\">
        {{ page.help }}
        {{ page.content_front }}
      </div>{# /.layout-content #}
    </div>

    <footer class=\"footer\" role=\"contentinfo\">
      {{ page.footer }}
    </footer>
    <footer class=\"footer_bottom\" role=\"contentinfo\">
      {{ page.footer_bottom }}
    </footer>
  </div>
</div>{# /.layout-container #}

{# Slidebars #}
<div off-canvas=\"id-2 right overlay\">
  <div class=\"menu-expanded nav-toggle sb-toggle-right\">
  </div>
  {{ page.slidebar }}
</div>
";
    }
}
