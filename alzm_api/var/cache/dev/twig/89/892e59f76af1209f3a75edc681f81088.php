<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* app_user/show.html.twig */
class __TwigTemplate_fd34222de65559584d4153ef26bb5cce extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app_user/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app_user/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "app_user/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "AppUser";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>AppUser</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>IdUser</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 12, $this->source); })()), "idUser", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Lastname</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 16, $this->source); })()), "lastname", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Firstname</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 20, $this->source); })()), "firstname", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Datebirth</th>
                <td>";
        // line 24
        ((twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 24, $this->source); })()), "datebirth", [], "any", false, false, false, 24)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 24, $this->source); })()), "datebirth", [], "any", false, false, false, 24), "Y-m-d"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 28, $this->source); })()), "email", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 32, $this->source); })()), "password", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>AccessToken</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 36, $this->source); })()), "accessToken", [], "any", false, false, false, 36), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>DateRegistration</th>
                <td>";
        // line 40
        ((twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 40, $this->source); })()), "dateRegistration", [], "any", false, false, false, 40)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 40, $this->source); })()), "dateRegistration", [], "any", false, false, false, 40), "Y-m-d"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>";
        // line 44
        ((twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 44, $this->source); })()), "roles", [], "any", false, false, false, 44)) ? (print (twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 44, $this->source); })()), "roles", [], "any", false, false, false, 44)), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 49
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_edit", ["idUser" => twig_get_attribute($this->env, $this->source, (isset($context["app_user"]) || array_key_exists("app_user", $context) ? $context["app_user"] : (function () { throw new RuntimeError('Variable "app_user" does not exist.', 51, $this->source); })()), "idUser", [], "any", false, false, false, 51)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 53
        echo twig_include($this->env, $context, "app_user/_delete_form.html.twig");
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "app_user/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 53,  165 => 51,  160 => 49,  152 => 44,  145 => 40,  138 => 36,  131 => 32,  124 => 28,  117 => 24,  110 => 20,  103 => 16,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}AppUser{% endblock %}

{% block body %}
    <h1>AppUser</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>IdUser</th>
                <td>{{ app_user.idUser }}</td>
            </tr>
            <tr>
                <th>Lastname</th>
                <td>{{ app_user.lastname }}</td>
            </tr>
            <tr>
                <th>Firstname</th>
                <td>{{ app_user.firstname }}</td>
            </tr>
            <tr>
                <th>Datebirth</th>
                <td>{{ app_user.datebirth ? app_user.datebirth|date('Y-m-d') : '' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ app_user.email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ app_user.password }}</td>
            </tr>
            <tr>
                <th>AccessToken</th>
                <td>{{ app_user.accessToken }}</td>
            </tr>
            <tr>
                <th>DateRegistration</th>
                <td>{{ app_user.dateRegistration ? app_user.dateRegistration|date('Y-m-d') : '' }}</td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>{{ app_user.roles ? app_user.roles|json_encode : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_user_index') }}\">back to list</a>

    <a href=\"{{ path('app_user_edit', {'idUser': app_user.idUser}) }}\">edit</a>

    {{ include('app_user/_delete_form.html.twig') }}
{% endblock %}
", "app_user/show.html.twig", "C:\\Users\\cmptp\\Desktop\\alzm_docker\\alzm_api\\templates\\app_user\\show.html.twig");
    }
}
