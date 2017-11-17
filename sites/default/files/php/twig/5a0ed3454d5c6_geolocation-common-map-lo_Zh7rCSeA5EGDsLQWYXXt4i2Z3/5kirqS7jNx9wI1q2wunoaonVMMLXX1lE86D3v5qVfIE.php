<?php

/* modules/geolocation/templates/geolocation-common-map-location.html.twig */
class __TwigTemplate_a9f0dde4d49a623340c1ef2db31f58bfeb5732a16852d2d444e17b5e5fe6d83c extends Twig_Template
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
        $tags = array("if" => 15);
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

        // line 10
        echo "<div
    class=\"geolocation\"
    data-lat=\"";
        // line 12
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : null), "lat", array()), "html", null, true));
        echo "\"
    data-lng=\"";
        // line 13
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : null), "lng", array()), "html", null, true));
        echo "\"
    typeof=\"Place\"
    ";
        // line 15
        if ( !twig_test_empty((isset($context["location_id"]) ? $context["location_id"] : null))) {
            echo " data-location-id=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["location_id"]) ? $context["location_id"] : null), "html", null, true));
            echo "\" ";
        }
        // line 16
        echo "    ";
        if (twig_test_empty((isset($context["disable_marker"]) ? $context["disable_marker"] : null))) {
            // line 17
            echo "        data-set-marker=\"true\"
        ";
            // line 18
            if ( !twig_test_empty((isset($context["icon"]) ? $context["icon"] : null))) {
                echo " data-icon=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["icon"]) ? $context["icon"] : null), "html", null, true));
                echo "\" ";
            }
            // line 19
            echo "        ";
            if ( !twig_test_empty((isset($context["marker_label"]) ? $context["marker_label"] : null))) {
                echo " data-marker-label=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["marker_label"]) ? $context["marker_label"] : null), "html", null, true));
                echo "\" ";
            }
            // line 20
            echo "    ";
        }
        // line 21
        echo ">
    <span property=\"geo\" typeof=\"GeoCoordinates\">
        <meta property=\"latitude\" content=\"";
        // line 23
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : null), "lat", array()), "html", null, true));
        echo "\" />
        <meta property=\"longitude\" content=\"";
        // line 24
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : null), "lng", array()), "html", null, true));
        echo "\" />
    </span>
    <h2 class=\"location-title\" property=\"name\">";
        // line 26
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo "</h2>
    <div class=\"location-content\">";
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/geolocation/templates/geolocation-common-map-location.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 27,  97 => 26,  92 => 24,  88 => 23,  84 => 21,  81 => 20,  74 => 19,  68 => 18,  65 => 17,  62 => 16,  56 => 15,  51 => 13,  47 => 12,  43 => 10,);
    }

    public function getSource()
    {
        return "{#
  When overriding this template, make sure to preserve
  - CSS-classes
  - parent - children hierarchy
  - data-lng and data-lat attributes
  or the attached Geolocation Javascript will fail.

  Changing the HTML tags, adding classes or adding content around or within the existing structure is no problem.
#}
<div
    class=\"geolocation\"
    data-lat=\"{{ position.lat }}\"
    data-lng=\"{{ position.lng }}\"
    typeof=\"Place\"
    {% if location_id is not empty %} data-location-id=\"{{ location_id }}\" {% endif %}
    {% if disable_marker is empty %}
        data-set-marker=\"true\"
        {% if icon is not empty %} data-icon=\"{{ icon }}\" {% endif %}
        {% if marker_label is not empty %} data-marker-label=\"{{ marker_label }}\" {% endif %}
    {% endif %}
>
    <span property=\"geo\" typeof=\"GeoCoordinates\">
        <meta property=\"latitude\" content=\"{{ position.lat }}\" />
        <meta property=\"longitude\" content=\"{{ position.lng }}\" />
    </span>
    <h2 class=\"location-title\" property=\"name\">{{ title }}</h2>
    <div class=\"location-content\">{{ content }}</div>
</div>";
    }
}
