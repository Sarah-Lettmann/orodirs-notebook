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

/* group-manager.html.twig */
class __TwigTemplate_b470a43d26eae9724e50c18e037458110994b873285d97cb3be97a118eaed215 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "group-manager.html.twig", 1);
        $this->blocks = [
            'titlebar' => [$this, 'block_titlebar'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["macros"] = $this->loadTemplate("user-manager-macros.html.twig", "group-manager.html.twig", 2);
        // line 4
        if (($context["group"] ?? null)) {
            // line 5
            $context["title"] = (($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP") . ": ") . twig_escape_filter($this->env, $this->getAttribute(($context["group"] ?? null), "groupname", [])));
        }
        // line 8
        $context["ps"] = $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", []);
        // line 29
        $context["appendUrl"] = ("?filter=" . twig_urlencode_filter(($context["filter"] ?? null)));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_titlebar($context, array $blocks = [])
    {
        // line 11
        echo "  ";
        if ( !($context["group"] ?? null)) {
            // line 12
            echo "  <div class=\"button-bar\">
    <a class=\"button\" href=\"#modal-admin-addon-user-manager-new\" data-remodal-target=\"modal-admin-addon-user-manager-new\"><i class=\"fa fa-plus\"></i> ";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ADD"), "html", null, true);
            echo "</a>
  </div>

  <h1><i class=\"fa fa-fw fa-user-o\"></i> ";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP_MANAGER"), "html", null, true);
            echo "</h1>
  ";
        } else {
            // line 18
            echo "  <div class=\"button-bar\">
    <a class=\"button\" href=\"";
            // line 19
            echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
            echo "/group-manager\"><i class=\"fa fa-reply\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK"), "html", null, true);
            echo "</a>
    ";
            // line 20
            if (($context["exists"] ?? null)) {
                // line 21
                echo "    <a class=\"button disable-after-click\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($this->getAttribute(($context["uri"] ?? null), "route", [0 => true], "method") . "/name") . ($context["ps"] ?? null)) . $this->getAttribute(($context["group"] ?? null), "groupname", [])) . "/task") . ($context["ps"] ?? null)) . "groupDelete"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
                echo "\" class=\"page-delete\" ><i class=\"fa fa-close\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DELETE"), "html", null, true);
                echo "</a>
    ";
            }
            // line 23
            echo "    <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE"), "html", null, true);
            echo "</button>
  </div>
  <h1><i class=\"fa fa-fw fa-user\"></i> ";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["group"] ?? null), "groupname", []));
            echo "</h1>
  ";
        }
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        // line 32
        echo "  ";
        if ( !($context["group"] ?? null)) {
            // line 33
            echo "  <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUPS"), "html", null, true);
            echo "</h1>

  ";
            // line 35
            if (($context["filterException"] ?? null)) {
                // line 36
                echo "  <div class=\"notices red\"><h2>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.FILTER_ERROR"), "html", null, true);
                echo "</h2><p>";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["filterException"] ?? null), "message", []), "html", null, true);
                echo "</p></div>
  ";
            }
            // line 38
            echo "
  <div class=\"admin-addon-user-manager-filter\">
    <div class=\"admin-addon-user-manager-filter__input\">
      <form method=\"get\">
        <div class=\"block block-text\">
          <div class=\"form-field vertical\">
            <div class=\"form-data\" data-grav-default=\"";
            // line 44
            echo twig_escape_filter($this->env, ($context["filter"] ?? null), "html", null, true);
            echo "\">
              <div class=\"form-input-wrapper\">
                <input name=\"filter\" value=\"";
            // line 46
            echo twig_escape_filter($this->env, ($context["filter"] ?? null), "html", null, true);
            echo "\" type=\"text\" placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.FILTER_GROUPS"), "html", null, true);
            echo "\">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class=\"admin-addon-user-manager-filter__help\">
      <a href=\"https://github.com/david-szabo97/grav-plugin-admin-addon-user-manager/blob/master/docs/filter.md#groups\" class=\"button\" target=\"_new\"><i class=\"fa fa-question\"></i> ";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.HELP"), "html", null, true);
            echo "</a>
    </div>
  </div>

  <form method=\"post\">
    <div class=\"admin-addon-user-manager admin-addon-user-manager--list admin-addon-user-manager--group\">
      ";
            // line 61
            if (twig_test_empty(($context["groups"] ?? null))) {
                // line 62
                echo "        <h2>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.NO_RESULTS"), "html", null, true);
                echo "</h2>
      ";
            } else {
                // line 64
                echo "        <div class=\"cell cell--header\">
          <div class=\"user\">
            <div class=\"user__checkbox\"><input type=\"checkbox\" id=\"selectAll\" /></div>
            <div class=\"user__username\">";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.NAME"), "html", null, true);
                echo "</div>
            <div class=\"user__actions\">";
                // line 68
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.ACTIONS"), "html", null, true);
                echo "</div>
          </div>
        </div>

        ";
                // line 72
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["groups"] ?? null));
                foreach ($context['_seq'] as $context["groupName"] => $context["group"]) {
                    // line 73
                    echo "        <div class=\"cell\">
          <div class=\"user\">
            <div class=\"user__checkbox\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                    // line 75
                    echo twig_escape_filter($this->env, $context["groupName"], "html", null, true);
                    echo "\" /></div>
            <div class=\"user__username\"><a href=\"";
                    // line 76
                    echo twig_escape_filter($this->env, ((($this->getAttribute(($context["uri"] ?? null), "route", [0 => true], "method") . "/name") . ($context["ps"] ?? null)) . $this->getAttribute($context["group"], "groupname", [])), "html", null, true);
                    echo "\">(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "users", []), "html", null, true);
                    echo ") <i class=\"fa fa-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "icon", []), "html", null, true);
                    echo "\"></i> ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["group"], "readableName", [])) ? ($this->getAttribute($context["group"], "readableName", [])) : ($context["groupName"])), "html", null, true);
                    echo "</a></div>
            <div class=\"user__actions\">
              <a href=\"";
                    // line 78
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($this->getAttribute(($context["uri"] ?? null), "route", [0 => true], "method") . "/name") . ($context["ps"] ?? null)) . $this->getAttribute($context["group"], "groupname", [])) . "/task") . ($context["ps"] ?? null)) . "groupDelete"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
                    echo "\" class=\"delete\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DELETE"), "html", null, true);
                    echo "</a>
            </div>
          </div>
        </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['groupName'], $context['group'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 83
                echo "      ";
            }
            // line 84
            echo "    </div>

    <div class=\"admin-addon-user-manager-bulk-action\">
      <a data-remodal-target=\"modal-admin-addon-user-manager-bulk\" class=\"button\">";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_ACTION"), "html", null, true);
            echo "</a>
    </div>
  </form>

  ";
            // line 91
            echo $context["macros"]->getpagination(($context["pagination"] ?? null), $this->getAttribute(($context["uri"] ?? null), "route", [0 => true], "method"), ($context["ps"] ?? null), ($context["appendUrl"] ?? null));
            echo "

  <div class=\"remodal\" data-remodal-id=\"modal-admin-addon-user-manager-new\" data-remodal-options=\"hashTracking: false\">
    <form onsubmit='handleAdminAddonUserManagerSubmit(this); return false;'>
      ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 96
                echo "        ";
                if ($this->getAttribute($context["field"], "type", [])) {
                    // line 97
                    echo "          ";
                    $context["value"] = $this->getAttribute(($context["data"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method");
                    // line 98
                    echo "          <div class=\"block block-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "type", []), "html", null, true);
                    echo "\">
            ";
                    // line 99
                    $this->loadTemplate([0 => (((("forms/fields/" . $this->getAttribute($context["field"], "type", [])) . "/") . $this->getAttribute($context["field"], "type", [])) . ".html.twig"), 1 => "forms/fields/text/text.html.twig"], "group-manager.html.twig", 99)->display($context);
                    // line 100
                    echo "          </div>
        ";
                }
                // line 102
                echo "      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "
      <div class=\"button-bar\">
        <button class=\"button primary\" >";
            // line 105
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONTINUE"), "html", null, true);
            echo "</button>
      </div>
    </form>
  </div>

  <div class=\"remodal\" data-remodal-id=\"modal-admin-addon-user-manager-bulk\" data-remodal-options=\"hashTracking: false\">
    <form method=\"post\" onsubmit='handleAdminAddonUserManagerBulkSubmit(this);'>
      ";
            // line 112
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["bulkFields"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 113
                echo "        ";
                if ($this->getAttribute($context["field"], "type", [])) {
                    // line 114
                    echo "          <div class=\"block block-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "type", []), "html", null, true);
                    echo "\">
            ";
                    // line 115
                    $this->loadTemplate([0 => (((("forms/fields/" . $this->getAttribute($context["field"], "type", [])) . "/") . $this->getAttribute($context["field"], "type", [])) . ".html.twig"), 1 => "forms/fields/text/text.html.twig"], "group-manager.html.twig", 115)->display($context);
                    // line 116
                    echo "          </div>
        ";
                }
                // line 118
                echo "      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "
      <div class=\"button-bar\">
        <button class=\"button primary\" >";
            // line 121
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONTINUE"), "html", null, true);
            echo "</button>
      </div>
    </form>
  </div>

  <script>
    function handleAdminAddonUserManagerSubmit(form) {
      var name = form.querySelector('[name=name]').value;
      window.location = '";
            // line 129
            echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
            echo "/group-manager/name";
            echo twig_escape_filter($this->env, ($context["ps"] ?? null), "html", null, true);
            echo "' + name;
    }

    var selectAllEle = document.getElementById('selectAll');
    var selectEles = document.querySelectorAll('input[name=\"selected[]\"]');
    if (selectAllEle) {
      selectAllEle.addEventListener('change', function(e) {
        for (var i = 0; i < selectEles.length; i++) {
          selectEles[i].checked = this.checked;
        }
      });
    }

    function handleAdminAddonUserManagerBulkSubmit(form) {
      for (var i = 0; i < selectEles.length; i++) {
        form.appendChild(selectEles[i]);
      }
    }
  </script>
  ";
        } else {
            // line 149
            echo "  <h1>";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["group"] ?? null), "readableName", [])) ? ($this->getAttribute(($context["group"] ?? null), "readableName", [])) : ($this->getAttribute(($context["group"] ?? null), "groupname", []))), "html", null, true);
            echo "</h1>

  ";
            // line 151
            $this->loadTemplate("partials/blueprints.html.twig", "group-manager.html.twig", 151)->display(twig_array_merge($context, ["data" => ($context["group"] ?? null), "blueprints" => $this->getAttribute(($context["group"] ?? null), "blueprints", [])]));
            // line 152
            echo "
  <div class=\"remodal\" data-remodal-id=\"changes\">
    <form>
      <h1>";
            // line 155
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.MODAL_CHANGED_DETECTED_TITLE"), "html", null, true);
            echo "</h1>
      <p class=\"bigger\">
        ";
            // line 157
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.MODAL_CHANGED_DETECTED_DESC"), "html", null, true);
            echo "
      </p>
      <br>
      <div class=\"button-bar\">
        <a class=\"button secondary\" data-leave-action=\"cancel\" href=\"#\"><i class=\"fa fa-fw fa-close\"></i> ";
            // line 161
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CANCEL"), "html", null, true);
            echo "</a>
        <a class=\"button\" data-leave-action=\"continue\" href=\"#\"><i class=\"fa fa-fw fa-check\"></i> ";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONTINUE"), "html", null, true);
            echo "</a>
      </div>
    </form>
  </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "group-manager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 162,  418 => 161,  411 => 157,  406 => 155,  401 => 152,  399 => 151,  393 => 149,  368 => 129,  357 => 121,  353 => 119,  339 => 118,  335 => 116,  333 => 115,  328 => 114,  325 => 113,  308 => 112,  298 => 105,  294 => 103,  280 => 102,  276 => 100,  274 => 99,  269 => 98,  266 => 97,  263 => 96,  246 => 95,  239 => 91,  232 => 87,  227 => 84,  224 => 83,  211 => 78,  200 => 76,  196 => 75,  192 => 73,  188 => 72,  181 => 68,  177 => 67,  172 => 64,  166 => 62,  164 => 61,  155 => 55,  141 => 46,  136 => 44,  128 => 38,  120 => 36,  118 => 35,  112 => 33,  109 => 32,  106 => 31,  97 => 25,  91 => 23,  83 => 21,  81 => 20,  75 => 19,  72 => 18,  67 => 16,  61 => 13,  58 => 12,  55 => 11,  52 => 10,  48 => 1,  46 => 29,  44 => 8,  41 => 5,  39 => 4,  37 => 2,  22 => 1,);
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
{% import 'user-manager-macros.html.twig' as macros %}

{% if group %}
{% set title = \"PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP\"|tu ~ \": \" ~ group.groupname|e %}
{% endif %}

{% set ps = config.system.param_sep %}

{% block titlebar %}
  {% if not group %}
  <div class=\"button-bar\">
    <a class=\"button\" href=\"#modal-admin-addon-user-manager-new\" data-remodal-target=\"modal-admin-addon-user-manager-new\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.ADD\"|tu }}</a>
  </div>

  <h1><i class=\"fa fa-fw fa-user-o\"></i> {{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP_MANAGER\"|tu }}</h1>
  {% else %}
  <div class=\"button-bar\">
    <a class=\"button\" href=\"{{ base_url }}/group-manager\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|tu }}</a>
    {% if exists %}
    <a class=\"button disable-after-click\" href=\"{{ uri.addNonce(uri.route(true) ~ '/name' ~ ps ~ group.groupname ~ '/task' ~ ps ~ 'groupDelete', 'admin-form', 'admin-nonce') }}\" class=\"page-delete\" ><i class=\"fa fa-close\"></i> {{ \"PLUGIN_ADMIN.DELETE\"|tu }}</a>
    {% endif %}
    <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> {{ \"PLUGIN_ADMIN.SAVE\"|tu }}</button>
  </div>
  <h1><i class=\"fa fa-fw fa-user\"></i> {{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUP\"|tu }}: {{ group.groupname|e }}</h1>
  {% endif %}
{% endblock %}

{% set appendUrl = '?filter=' ~ filter|url_encode %}

{% block content %}
  {% if not group %}
  <h1>{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.GROUPS\"|tu }}</h1>

  {% if filterException %}
  <div class=\"notices red\"><h2>{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.FILTER_ERROR\"|tu }}</h2><p>{{ filterException.message }}</p></div>
  {% endif %}

  <div class=\"admin-addon-user-manager-filter\">
    <div class=\"admin-addon-user-manager-filter__input\">
      <form method=\"get\">
        <div class=\"block block-text\">
          <div class=\"form-field vertical\">
            <div class=\"form-data\" data-grav-default=\"{{ filter }}\">
              <div class=\"form-input-wrapper\">
                <input name=\"filter\" value=\"{{ filter }}\" type=\"text\" placeholder=\"{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.FILTER_GROUPS\"|tu }}\">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class=\"admin-addon-user-manager-filter__help\">
      <a href=\"https://github.com/david-szabo97/grav-plugin-admin-addon-user-manager/blob/master/docs/filter.md#groups\" class=\"button\" target=\"_new\"><i class=\"fa fa-question\"></i> {{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.HELP\"|tu }}</a>
    </div>
  </div>

  <form method=\"post\">
    <div class=\"admin-addon-user-manager admin-addon-user-manager--list admin-addon-user-manager--group\">
      {% if groups is empty %}
        <h2>{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.NO_RESULTS\"|tu }}</h2>
      {% else %}
        <div class=\"cell cell--header\">
          <div class=\"user\">
            <div class=\"user__checkbox\"><input type=\"checkbox\" id=\"selectAll\" /></div>
            <div class=\"user__username\">{{ \"PLUGIN_ADMIN.NAME\"|tu }}</div>
            <div class=\"user__actions\">{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.ACTIONS\"|tu }}</div>
          </div>
        </div>

        {% for groupName, group in groups %}
        <div class=\"cell\">
          <div class=\"user\">
            <div class=\"user__checkbox\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ groupName }}\" /></div>
            <div class=\"user__username\"><a href=\"{{ uri.route(true) ~ '/name' ~ ps ~ group.groupname }}\">({{ group.users }}) <i class=\"fa fa-{{ group.icon}}\"></i> {{ group.readableName ?: groupName }}</a></div>
            <div class=\"user__actions\">
              <a href=\"{{ uri.addNonce(uri.route(true)  ~ '/name' ~ ps ~ group.groupname ~ '/task' ~ ps ~ 'groupDelete', 'admin-form', 'admin-nonce') }}\" class=\"delete\">{{ \"PLUGIN_ADMIN.DELETE\"|tu }}</a>
            </div>
          </div>
        </div>
        {% endfor %}
      {% endif %}
    </div>

    <div class=\"admin-addon-user-manager-bulk-action\">
      <a data-remodal-target=\"modal-admin-addon-user-manager-bulk\" class=\"button\">{{ \"PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_ACTION\"|tu }}</a>
    </div>
  </form>

  {{ macros.pagination(pagination, uri.route(true), ps, appendUrl) }}

  <div class=\"remodal\" data-remodal-id=\"modal-admin-addon-user-manager-new\" data-remodal-options=\"hashTracking: false\">
    <form onsubmit='handleAdminAddonUserManagerSubmit(this); return false;'>
      {% for field in fields %}
        {% if field.type %}
          {% set value = data.value(field.name) %}
          <div class=\"block block-{{field.type}}\">
            {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
          </div>
        {% endif %}
      {% endfor %}

      <div class=\"button-bar\">
        <button class=\"button primary\" >{{ \"PLUGIN_ADMIN.CONTINUE\"|tu }}</button>
      </div>
    </form>
  </div>

  <div class=\"remodal\" data-remodal-id=\"modal-admin-addon-user-manager-bulk\" data-remodal-options=\"hashTracking: false\">
    <form method=\"post\" onsubmit='handleAdminAddonUserManagerBulkSubmit(this);'>
      {% for field in bulkFields %}
        {% if field.type %}
          <div class=\"block block-{{field.type}}\">
            {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
          </div>
        {% endif %}
      {% endfor %}

      <div class=\"button-bar\">
        <button class=\"button primary\" >{{ \"PLUGIN_ADMIN.CONTINUE\"|tu }}</button>
      </div>
    </form>
  </div>

  <script>
    function handleAdminAddonUserManagerSubmit(form) {
      var name = form.querySelector('[name=name]').value;
      window.location = '{{ base_url }}/group-manager/name{{ ps }}' + name;
    }

    var selectAllEle = document.getElementById('selectAll');
    var selectEles = document.querySelectorAll('input[name=\"selected[]\"]');
    if (selectAllEle) {
      selectAllEle.addEventListener('change', function(e) {
        for (var i = 0; i < selectEles.length; i++) {
          selectEles[i].checked = this.checked;
        }
      });
    }

    function handleAdminAddonUserManagerBulkSubmit(form) {
      for (var i = 0; i < selectEles.length; i++) {
        form.appendChild(selectEles[i]);
      }
    }
  </script>
  {% else %}
  <h1>{{ group.readableName ?: group.groupname }}</h1>

  {% include 'partials/blueprints.html.twig' with { data: group, blueprints: group.blueprints } %}

  <div class=\"remodal\" data-remodal-id=\"changes\">
    <form>
      <h1>{{ \"PLUGIN_ADMIN.MODAL_CHANGED_DETECTED_TITLE\"|tu }}</h1>
      <p class=\"bigger\">
        {{ \"PLUGIN_ADMIN.MODAL_CHANGED_DETECTED_DESC\"|tu }}
      </p>
      <br>
      <div class=\"button-bar\">
        <a class=\"button secondary\" data-leave-action=\"cancel\" href=\"#\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|tu }}</a>
        <a class=\"button\" data-leave-action=\"continue\" href=\"#\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|tu }}</a>
      </div>
    </form>
  </div>
  {% endif %}
{% endblock %}
", "group-manager.html.twig", "C:\\xampp\\htdocs\\grav\\user\\plugins\\admin-addon-user-manager\\templates\\group-manager.html.twig");
    }
}
