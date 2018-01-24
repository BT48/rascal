<?php

/* {# inline_template_start #}{{ field_institution_ref }} has <strong>[view:total-rows]</strong> collections that match your search.  */
class __TwigTemplate_281b55f2886e09d777db676c34667d2d2dad8f9c83cece6c6c7720856532dc71 extends Twig_Template
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

        // line 1
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["field_institution_ref"]) ? $context["field_institution_ref"] : null), "html", null, true));
        echo " has <strong>[view:total-rows]</strong> collections that match your search. ";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}{{ field_institution_ref }} has <strong>[view:total-rows]</strong> collections that match your search. ";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSource()
    {
        return "{# inline_template_start #}{{ field_institution_ref }} has <strong>[view:total-rows]</strong> collections that match your search. ";
    }
}
