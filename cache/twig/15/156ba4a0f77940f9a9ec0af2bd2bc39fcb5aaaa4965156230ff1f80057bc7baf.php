<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forms/fields/markdown/markdown.html.twig */
class __TwigTemplate_1fbdea03d0ea489f3eab6271c783e5f123abac52d19502f4dbbd030ef9d6789c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("forms/fields/editor/editor.html.twig", "forms/fields/markdown/markdown.html.twig", 3);
        $this->blocks = [
        ];
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/editor/editor.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 4
        $context["codemirrorOptions"] = twig_array_merge(["mode" => "gfm", "ignore" => []], (($this->getAttribute(($context["field"] ?? null), "codemirror", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "codemirror", []), [])) : ([])));
        // line 7
        if ($this->getAttribute(($context["field"] ?? null), "showPreview", [])) {
            // line 8
            $context["codemirrorOptions"] = twig_array_merge(($context["codemirrorOptions"] ?? null), ["ignore" => []]);
        }
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "forms/fields/markdown/markdown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 3,  39 => 8,  37 => 7,  35 => 4,  22 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# Deprecated field. Alias to editor/editor.html.twig #}

{% extends \"forms/fields/editor/editor.html.twig\" %}
{% set codemirrorOptions = {'mode': 'gfm', 'ignore': []}|merge(field.codemirror|default({})) %}

{# backward compatibility #}
{% if field.showPreview %}
    {% set codemirrorOptions = codemirrorOptions|merge({'ignore': []}) %}
{% endif %}
{# end backward compatibility #}
", "forms/fields/markdown/markdown.html.twig", "C:\\xampp\\htdocs\\grav\\user\\plugins\\admin\\themes\\grav\\templates\\forms\\fields\\markdown\\markdown.html.twig");
    }
}
