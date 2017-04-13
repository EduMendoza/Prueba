<?php

/* CriveroPruebaBundle:Usuarios:monitor.html.twig */
class __TwigTemplate_54872d101489ea665c4555f02d82fceb37d6a68b64cd80ec8945fde08f6db260 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CriveroPruebaBundle::main.html.twig", "CriveroPruebaBundle:Usuarios:monitor.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CriveroPruebaBundle::main.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Monitor ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "username", array()), "html", null, true);
        echo " ";
    }

    // line 4
    public function block_contenido($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"container\">
        <div class=\"usuardesc\">
            <div class=\"accionesExclus\">
                <button type=\"button\" class=\"btn btn-primary\">Enviar mensaje</button>
                <p>";
        // line 9
        echo twig_include($this->env, $context, "CriveroPruebaBundle:Default:forms/form.html.twig", array("form" => (isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "nombre" => "Eliminar usuario"));
        echo "</p>
            </div>
            <h1>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "username", array()), "html", null, true);
        echo "</h1>
            <div class=\"usuarfot\">
                <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/no-image-found.png"), "html", null, true);
        echo "\" style=\"float: left; width: 100%;\" />        
            </div>
            <div class=\"usuardat\">
                <div id=\"resersiones\">
                    ";
        // line 17
        if (((isset($context["sesiones"]) ? $context["sesiones"] : $this->getContext($context, "sesiones")) != null)) {
            // line 18
            echo "                        <div>
                            <h4>Sesiones: </h4> 
                            <ul id=\"sesiones\">
                                ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sesiones"]) ? $context["sesiones"] : $this->getContext($context, "sesiones")));
            foreach ($context['_seq'] as $context["_key"] => $context["sesion"]) {
                // line 22
                echo "                                    <li>
                                        <p>Aula ";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "aula", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "nombre", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "horario", array()), "html", null, true);
                echo "</p>
                                    </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sesion'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "                            </ul>
                        </div>
                    ";
        }
        // line 29
        echo "                </div>
                <h4>Nombre: </h4> <p>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "nombre", array()), "html", null, true);
        echo "</p>
                <h4>F.Nacimiento: </h4> <p>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "fNacimiento", array()), "html", null, true);
        echo "</p>
                <h4>Telefono: </h4> <p>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "telefono", array()), "html", null, true);
        echo "</p>
                <h4>Registro: </h4> <p>";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["monitor"]) ? $context["monitor"] : $this->getContext($context, "monitor")), "registro", array()), "d/m/Y"), "html", null, true);
        echo "</p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CriveroPruebaBundle:Usuarios:monitor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 33,  106 => 32,  102 => 31,  98 => 30,  95 => 29,  90 => 26,  77 => 23,  74 => 22,  70 => 21,  65 => 18,  63 => 17,  56 => 13,  51 => 11,  46 => 9,  40 => 5,  37 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'CriveroPruebaBundle::main.html.twig' %}

{% block title %} Monitor {{monitor.username}} {% endblock %}
{% block contenido %}
    <div class=\"container\">
        <div class=\"usuardesc\">
            <div class=\"accionesExclus\">
                <button type=\"button\" class=\"btn btn-primary\">Enviar mensaje</button>
                <p>{{ include('CriveroPruebaBundle:Default:forms/form.html.twig', { form: delete_form, nombre: \"Eliminar usuario\" })}}</p>
            </div>
            <h1>{{monitor.username}}</h1>
            <div class=\"usuarfot\">
                <img src=\"{{ asset('images/no-image-found.png') }}\" style=\"float: left; width: 100%;\" />        
            </div>
            <div class=\"usuardat\">
                <div id=\"resersiones\">
                    {% if sesiones != null %}
                        <div>
                            <h4>Sesiones: </h4> 
                            <ul id=\"sesiones\">
                                {% for sesion in sesiones %}
                                    <li>
                                        <p>Aula {{sesion.aula}} - {{sesion.nombre}} - {{sesion.horario}}</p>
                                    </li>
                                {% endfor %}
                            </ul>
                        </div>
                    {% endif %}
                </div>
                <h4>Nombre: </h4> <p>{{monitor.nombre}}</p>
                <h4>F.Nacimiento: </h4> <p>{{monitor.fNacimiento}}</p>
                <h4>Telefono: </h4> <p>{{monitor.telefono}}</p>
                <h4>Registro: </h4> <p>{{monitor.registro|date('d/m/Y')}}</p>
            </div>
        </div>
    </div>
{% endblock %}", "CriveroPruebaBundle:Usuarios:monitor.html.twig", "C:\\xampp\\htdocs\\Prueba\\src\\Crivero\\PruebaBundle/Resources/views/Usuarios/monitor.html.twig");
    }
}
