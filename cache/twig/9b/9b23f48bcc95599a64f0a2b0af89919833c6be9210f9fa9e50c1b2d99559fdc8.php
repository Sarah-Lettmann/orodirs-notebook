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

/* plugins.html.twig */
class __TwigTemplate_24de3c06a84a65bedcede603a384a592c5551cd9e6e776d898551f4ff0b72da1 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "plugins.html.twig", 1);
        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'titlebar' => [$this, 'block_titlebar'],
            'messages' => [$this, 'block_messages'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["plugin_slug"] = $this->getAttribute(($context["admin"] ?? null), "route", []);
        // line 5
        if (($context["plugin_slug"] ?? null)) {
            // line 6
            $context["installing"] = (is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["plugin_slug"] ?? null)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "install") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)));
            // line 8
            if (($context["installing"] ?? null)) {
                // line 9
                $context["title"] = $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGINS");
            } else {
                // line 11
                $context["installed"] = true;
                // line 14
                $context["package"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "plugins", [0 => true], "method"), $this->getAttribute(($context["admin"] ?? null), "route", []), [], "array");
                // line 15
                if ( !($context["package"] ?? null)) {
                    // line 16
                    $context["package"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "plugins", [0 => false], "method"), $this->getAttribute(($context["admin"] ?? null), "route", []), [], "array");
                    // line 17
                    $context["installed"] = false;
                }
                // line 20
                $context["plugin"] = $this->getAttribute(($context["package"] ?? null), "toArray", [], "method");
                // line 21
                $context["title"] = (($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGIN") . ": ") . twig_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? null), "name", [])));
            }
        } else {
            // line 24
            $context["title"] = $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGINS");
        }
        // line 27
        if (($this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 29
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/codemirror/codemirror.css")], "method");
        // line 30
        echo "        ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
    }

    // line 33
    public function block_javascripts($context, array $blocks = [])
    {
        // line 34
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
    }

    // line 38
    public function block_titlebar($context, array $blocks = [])
    {
        // line 39
        echo "    ";
        if (( !$this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
            // line 40
            echo "        <div class=\"button-bar\">
        ";
            // line 41
            if (($context["installing"] ?? null)) {
                // line 42
                echo "            <a class=\"button\" href=\"";
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins\"><i class=\"fa fa-reply\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK"), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 44
                echo "            <a class=\"button\" href=\"";
                echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
                echo "\"><i class=\"fa fa-reply\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK"), "html", null, true);
                echo "</a>
            <a class=\"button\" href=\"";
                // line 45
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins/install\"><i class=\"fa fa-plus\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ADD"), "html", null, true);
                echo "</a>
            ";
                // line 46
                if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"])) {
                    // line 47
                    echo "                <button data-gpm-checkupdates=\"\" class=\"button\"><i class=\"fa fa-refresh\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CHECK_FOR_UPDATES"), "html", null, true);
                    echo "</button>
            ";
                }
                // line 49
                echo "        ";
            }
            // line 50
            echo "        </div>
        <h1><i class=\"fa fa-fw fa-plug\"></i> ";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGINS"), "html", null, true);
            echo "</h1>
    ";
        } else {
            // line 53
            echo "        ";
            if (($context["installed"] ?? null)) {
                // line 54
                echo "        <div class=\"button-bar\">
            <a class=\"button\" href=\"";
                // line 55
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins\"><i class=\"fa fa-arrow-left\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK_TO_PLUGINS"), "html", null, true);
                echo "</a>
            <a class=\"button\" href=\"";
                // line 56
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins/install\"><i class=\"fa fa-plus\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ADD"), "html", null, true);
                echo "</a>
            ";
                // line 57
                try {
                    $this->loadTemplate((("plugins/" . $this->getAttribute(($context["admin"] ?? null), "route", [])) . "-buttons.html.twig"), "plugins.html.twig", 57)->display($context);
                } catch (LoaderError $e) {
                    // ignore missing template
                }

                // line 58
                echo "            <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE"), "html", null, true);
                echo "</button>
        </div>
        ";
            } else {
                // line 61
                echo "        <div class=\"button-bar\">
            <a class=\"button\" href=\"";
                // line 62
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins/install\"><i class=\"fa fa-arrow-left\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK_TO_PLUGINS"), "html", null, true);
                echo "</a>
        </div>
        ";
            }
            // line 65
            echo "
        <h1><i class=\"fa fa-fw fa-plug\"></i> ";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGIN"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? null), "name", []));
            echo "</h1>
    ";
        }
    }

    // line 70
    public function block_messages($context, array $blocks = [])
    {
        // line 71
        echo "    ";
        $this->displayParentBlock("messages", $context, $blocks);
        echo "
    ";
        // line 72
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "plugins", [])) {
            // line 73
            echo "        <div class=\"plugins-notifications-container hidden\"></div>
    ";
        }
    }

    // line 77
    public function block_content($context, array $blocks = [])
    {
        // line 78
        echo "    <div class=\"gpm gpm-plugins\">
        ";
        // line 79
        if (( !$this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
            // line 80
            echo "            ";
            $this->loadTemplate("partials/plugins-list.html.twig", "plugins.html.twig", 80)->display($context);
            // line 81
            echo "        ";
        } else {
            // line 82
            echo "            ";
            if ((null === ($context["plugin"] ?? null))) {
                // line 83
                echo "                ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->redirectFunc((($context["base_url_relative"] ?? null) . "/404")), "html", null, true);
                echo "
            ";
            }
            // line 85
            echo "
            ";
            // line 86
            $this->loadTemplate("partials/plugins-details.html.twig", "plugins.html.twig", 86)->display($context);
            // line 87
            echo "        ";
        }
        // line 88
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "plugins.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 88,  251 => 87,  249 => 86,  246 => 85,  240 => 83,  237 => 82,  234 => 81,  231 => 80,  229 => 79,  226 => 78,  223 => 77,  217 => 73,  215 => 72,  210 => 71,  207 => 70,  198 => 66,  195 => 65,  187 => 62,  184 => 61,  177 => 58,  170 => 57,  164 => 56,  158 => 55,  155 => 54,  152 => 53,  147 => 51,  144 => 50,  141 => 49,  135 => 47,  133 => 46,  127 => 45,  120 => 44,  112 => 42,  110 => 41,  107 => 40,  104 => 39,  101 => 38,  94 => 34,  91 => 33,  84 => 30,  81 => 29,  78 => 28,  74 => 1,  71 => 27,  68 => 24,  64 => 21,  62 => 20,  59 => 17,  57 => 16,  55 => 15,  53 => 14,  51 => 11,  48 => 9,  46 => 8,  44 => 6,  42 => 5,  40 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'partials/base.html.twig' %}

{% set plugin_slug = admin.route %}

{% if plugin_slug %}
    {% set installing = plugin_slug starts with 'install' %}

    {% if installing %}
        {% set title = \"PLUGIN_ADMIN.PLUGINS\"|tu %}
    {% else %}
        {% set installed = true %}

        {# Try installed packages first, then remote #}
        {% set package = admin.plugins(true)[admin.route] %}
        {% if (not package) %}
            {% set package = admin.plugins(false)[admin.route] %}
            {% set installed = false %}
        {% endif %}

        {% set plugin = package.toArray() %}
        {% set title = \"PLUGIN_ADMIN.PLUGIN\"|tu ~ \": \" ~ plugin.name|e %}
    {% endif %}
{% else %}
    {% set title = \"PLUGIN_ADMIN.PLUGINS\"|tu %}
{% endif %}

{% if admin.route or installing %}
    {% block stylesheets %}
        {% do assets.addCss(theme_url~'/css/codemirror/codemirror.css') %}
        {{ parent() }}
    {% endblock %}

    {% block javascripts %}
        {{ parent() }}
    {% endblock %}
{% endif %}

{% block titlebar %}
    {% if not admin.route or installing %}
        <div class=\"button-bar\">
        {% if (installing) %}
            <a class=\"button\" href=\"{{ base_url_relative }}/plugins\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|tu }}</a>
        {% else %}
            <a class=\"button\" href=\"{{ base_url }}\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|tu }}</a>
            <a class=\"button\" href=\"{{ base_url_relative }}/plugins/install\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.ADD\"|tu }}</a>
            {% if authorize(['admin.maintenance', 'admin.super']) %}
                <button data-gpm-checkupdates=\"\" class=\"button\"><i class=\"fa fa-refresh\"></i> {{ \"PLUGIN_ADMIN.CHECK_FOR_UPDATES\"|tu }}</button>
            {% endif %}
        {% endif %}
        </div>
        <h1><i class=\"fa fa-fw fa-plug\"></i> {{ \"PLUGIN_ADMIN.PLUGINS\"|tu }}</h1>
    {% else %}
        {% if (installed) %}
        <div class=\"button-bar\">
            <a class=\"button\" href=\"{{ base_url_relative }}/plugins\"><i class=\"fa fa-arrow-left\"></i> {{ \"PLUGIN_ADMIN.BACK_TO_PLUGINS\"|tu }}</a>
            <a class=\"button\" href=\"{{ base_url_relative }}/plugins/install\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.ADD\"|tu }}</a>
            {% include 'plugins/'~admin.route~'-buttons.html.twig' ignore missing %}
            <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> {{ \"PLUGIN_ADMIN.SAVE\"|tu }}</button>
        </div>
        {% else %}
        <div class=\"button-bar\">
            <a class=\"button\" href=\"{{ base_url_relative }}/plugins/install\"><i class=\"fa fa-arrow-left\"></i> {{ \"PLUGIN_ADMIN.BACK_TO_PLUGINS\"|tu }}</a>
        </div>
        {% endif %}

        <h1><i class=\"fa fa-fw fa-plug\"></i> {{ \"PLUGIN_ADMIN.PLUGIN\"|tu }}: {{ plugin.name|e }}</h1>
    {% endif %}
{% endblock %}

{% block messages %}
    {{ parent() }}
    {% if config.plugins.admin.notifications.plugins %}
        <div class=\"plugins-notifications-container hidden\"></div>
    {% endif %}
{% endblock %}

{% block content %}
    <div class=\"gpm gpm-plugins\">
        {% if not admin.route or installing %}
            {% include 'partials/plugins-list.html.twig' %}
        {% else %}
            {% if plugin is null %}
                {{redirect_me(base_url_relative ~ '/404')}}
            {% endif %}

            {% include 'partials/plugins-details.html.twig' %}
        {% endif %}
    </div>
{% endblock %}
", "plugins.html.twig", "C:\\xampp\\htdocs\\grav\\user\\plugins\\admin\\themes\\grav\\templates\\plugins.html.twig");
    }
}
