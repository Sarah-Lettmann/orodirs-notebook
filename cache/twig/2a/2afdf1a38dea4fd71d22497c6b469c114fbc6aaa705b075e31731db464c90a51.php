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

/* user-manager-macros.html.twig */
class __TwigTemplate_7c3a5bc0bf9245dd8d7456fc39b2b004e6a8bfdbb2dc15bc48930e5c14b0d541 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
    }

    // line 1
    public function getpagination($__pagination__ = null, $__url__ = null, $__ps__ = null, $__appendUrl__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "pagination" => $__pagination__,
            "url" => $__url__,
            "ps" => $__ps__,
            "appendUrl" => $__appendUrl__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 2
            echo "  ";
            if (($this->getAttribute(($context["pagination"] ?? null), "count", []) > 1)) {
                // line 3
                echo "    <div class=\"admin-addon-user-manager-pagination\">
      <ul class=\"admin-addon-user-manager-pagination__pages\">
        ";
                // line 5
                if (($this->getAttribute(($context["pagination"] ?? null), "current", []) > 1)) {
                    // line 6
                    echo "        <li><a href=\"";
                    echo twig_escape_filter($this->env, ((((($context["url"] ?? null) . "/page") . ($context["ps"] ?? null)) . "1") . ($context["appendUrl"] ?? null)), "html", null, true);
                    echo "\"><<</a></li>
        ";
                }
                // line 8
                echo "        ";
                if (($this->getAttribute(($context["pagination"] ?? null), "current", []) > 2)) {
                    // line 9
                    echo "        <li><a href=\"";
                    echo twig_escape_filter($this->env, ((((($context["url"] ?? null) . "/page") . ($context["ps"] ?? null)) . ($this->getAttribute(($context["pagination"] ?? null), "current", []) - 1)) . ($context["appendUrl"] ?? null)), "html", null, true);
                    echo "\"><</a></li>
        ";
                }
                // line 11
                echo "        ";
                $context["fromPage"] = (((($this->getAttribute(($context["pagination"] ?? null), "current", []) - 2) < 1)) ? (1) : (($this->getAttribute(($context["pagination"] ?? null), "current", []) - 2)));
                // line 12
                echo "        ";
                $context["toPage"] = (((($this->getAttribute(($context["pagination"] ?? null), "current", []) + 2) > $this->getAttribute(($context["pagination"] ?? null), "count", []))) ? ($this->getAttribute(($context["pagination"] ?? null), "count", [])) : (($this->getAttribute(($context["pagination"] ?? null), "current", []) + 2)));
                // line 13
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(($context["fromPage"] ?? null), ($context["toPage"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 14
                    echo "          ";
                    if (($this->getAttribute(($context["pagination"] ?? null), "current", []) == $context["i"])) {
                        // line 15
                        echo "            <li class=\"current\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</li>
          ";
                    } else {
                        // line 17
                        echo "            <li><a href=\"";
                        echo twig_escape_filter($this->env, ((((($context["url"] ?? null) . "/page") . ($context["ps"] ?? null)) . $context["i"]) . ($context["appendUrl"] ?? null)), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</a></li>
          ";
                    }
                    // line 19
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                echo "        ";
                if (($this->getAttribute(($context["pagination"] ?? null), "current", []) < ($this->getAttribute(($context["pagination"] ?? null), "count", []) - 1))) {
                    // line 21
                    echo "        <li><a href=\"";
                    echo twig_escape_filter($this->env, ((((($context["url"] ?? null) . "/page") . ($context["ps"] ?? null)) . ($this->getAttribute(($context["pagination"] ?? null), "current", []) + 1)) . ($context["appendUrl"] ?? null)), "html", null, true);
                    echo "\">></a></li>
        ";
                }
                // line 23
                echo "        ";
                if (($this->getAttribute(($context["pagination"] ?? null), "current", []) < $this->getAttribute(($context["pagination"] ?? null), "count", []))) {
                    // line 24
                    echo "        <li><a href=\"";
                    echo twig_escape_filter($this->env, ((((($context["url"] ?? null) . "/page") . ($context["ps"] ?? null)) . $this->getAttribute(($context["pagination"] ?? null), "count", [])) . ($context["appendUrl"] ?? null)), "html", null, true);
                    echo "\">>></a></li>
        ";
                }
                // line 26
                echo "      </ul>

      <div class=\"admin-addon-user-manager-pagination__text\">";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_ADMIN_ADDON_USER_MANAGER.PAGINATION_SUMMARY", ($this->getAttribute(($context["pagination"] ?? null), "startOffset", []) + 1), $this->getAttribute(($context["pagination"] ?? null), "endOffset", []), $this->getAttribute(($context["pagination"] ?? null), "total", [])), "html", null, true);
                echo "</div>
    </div>
  ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "user-manager-macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 28,  123 => 26,  117 => 24,  114 => 23,  108 => 21,  105 => 20,  99 => 19,  91 => 17,  85 => 15,  82 => 14,  77 => 13,  74 => 12,  71 => 11,  65 => 9,  62 => 8,  56 => 6,  54 => 5,  50 => 3,  47 => 2,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% macro pagination(pagination, url, ps, appendUrl) %}
  {% if pagination.count > 1 %}
    <div class=\"admin-addon-user-manager-pagination\">
      <ul class=\"admin-addon-user-manager-pagination__pages\">
        {% if pagination.current > 1 %}
        <li><a href=\"{{ url ~ '/page' ~ ps ~ '1' ~ appendUrl }}\"><<</a></li>
        {% endif %}
        {% if pagination.current > 2 %}
        <li><a href=\"{{ url ~ '/page' ~ ps ~ (pagination.current - 1) ~ appendUrl }}\"><</a></li>
        {% endif %}
        {% set fromPage = (pagination.current - 2 < 1) ? 1 : pagination.current - 2 %}
        {% set toPage = (pagination.current + 2 > pagination.count) ? pagination.count : pagination.current + 2 %}
        {% for i in fromPage..toPage %}
          {% if pagination.current == i %}
            <li class=\"current\">{{ i }}</li>
          {% else %}
            <li><a href=\"{{ url ~ '/page' ~ ps ~ i ~ appendUrl }}\">{{ i }}</a></li>
          {% endif %}
        {% endfor %}
        {% if pagination.current < pagination.count - 1 %}
        <li><a href=\"{{ url ~ '/page' ~ ps ~ (pagination.current + 1) ~ appendUrl }}\">></a></li>
        {% endif %}
        {% if pagination.current < pagination.count %}
        <li><a href=\"{{ url ~ '/page' ~ ps ~ pagination.count ~ appendUrl }}\">>></a></li>
        {% endif %}
      </ul>

      <div class=\"admin-addon-user-manager-pagination__text\">{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.PAGINATION_SUMMARY\"|t(pagination.startOffset + 1, pagination.endOffset, pagination.total) }}</div>
    </div>
  {% endif %}
{% endmacro %}", "user-manager-macros.html.twig", "C:\\xampp\\htdocs\\grav\\user\\plugins\\admin-addon-user-manager\\templates\\user-manager-macros.html.twig");
    }
}
