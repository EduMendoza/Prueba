<?php

/* CriveroPruebaBundle:Competiciones:competicion.html.twig */
class __TwigTemplate_16dd33738b3ba9fe7d9c141e833865b974b360c37a891921dcbe719d8d99b43d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CriveroPruebaBundle::main.html.twig", "CriveroPruebaBundle:Competiciones:competicion.html.twig", 1);
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
        echo " Detalles de la competicion ";
    }

    // line 4
    public function block_contenido($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"container text-center\">
        <h1 class=\"t1\">Deporte de la competición: ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "deporte", array()), "html", null, true);
        echo "</h1>
        <h3 class=\"t3\">Tipo de la competición: ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "tipoCompeticion", array()), "html", null, true);
        echo "</h3>
        ";
        // line 8
        if (($this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "estadoCompeticion", array()) == "Pendiente")) {
            // line 9
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competicion_validar", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success\">
                Validar
            </a>
            <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competicion_rechazar", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-sm btn-danger\">
                Rechazar
            </a>
            <a class=\"btn btn-default\" href=\"";
            // line 15
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competiciones");
            echo "\">Volver atrás</a>
        ";
        }
        // line 17
        echo "        ";
        if (($this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "estadoCompeticion", array()) == "Rechazado")) {
            // line 18
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competicion_validar", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success\">
                Validar
            </a>
            <a class=\"btn btn-default\" href=\"";
            // line 21
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competiciones");
            echo "\">Volver atrás</a>
         ";
        }
        // line 23
        echo "         ";
        if (($this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "estadoCompeticion", array()) == "Validado")) {
            // line 24
            echo "             <table class=\"table-responsive\">
                <div class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Equipos inscritos por el momento  |</th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
             ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["equipos"]) ? $context["equipos"] : $this->getContext($context, "equipos")));
            foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
                if (($this->getAttribute($context["equipo"], "idCompeticion", array()) == $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))) {
                    // line 33
                    echo "                 <tr>
                    <td>   ";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "nombre", array()), "html", null, true);
                    echo "    </td>
                    <td>
                        <a href=\"";
                    // line 36
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_equipo", array("id" => $this->getAttribute($context["equipo"], "id", array()))), "html", null, true);
                    echo "\" class=\"btn btn-sm btn-info\">
                            Ver
                        </a>
                        <a href=\"#\" class=\"btn btn-sm btn-danger btn-delete\">
                            Eliminar
                        </a>
                    </td>
                </tr>
             ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "             <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_partido_nuevo", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success\" style=\"height: 30px; width: 150px;\">
                Nuevo Partido
            <span class=\"glyphicon glyphicon-plus\"></span></a>
            
            <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competicion_cancelar", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-sm btn-danger\">
                Cancelar Competición
            </a>
            <a class=\"btn btn-default\" href=\"";
            // line 52
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competiciones");
            echo "\">Volver atrás</a>
         ";
        }
        // line 54
        echo "        ";
        if (($this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "estadoCompeticion", array()) == "Jugandose")) {
            // line 55
            echo "            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Posición </th>
                            <th> Equipo  </th>
                            <th> Puntos   </th>
                            <th> Victorias </th>
                            <th> Derrotas </th>
                            <th> Empates  </th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                    ";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["equipos"]) ? $context["equipos"] : $this->getContext($context, "equipos")));
            foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
                if (($this->getAttribute($context["equipo"], "idCompeticion", array()) == $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))) {
                    // line 69
                    echo "                            <tr>
                                <td>   ";
                    // line 70
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "clasificacion", array()), "html", null, true);
                    echo "º  </td>
                                <td>   ";
                    // line 71
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "nombre", array()), "html", null, true);
                    echo "    </td>
                                <td>   ";
                    // line 72
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "puntuacion", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 73
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "victorias", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "derrotas", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 75
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "empates", array()), "html", null, true);
                    echo "   </td>
                                <td>
                                    <a href=\"";
                    // line 77
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_equipo", array("id" => $this->getAttribute($context["equipo"], "id", array()))), "html", null, true);
                    echo "\" class=\"btn btn-sm btn-info\">
                                        Ver
                                    </a>
                                    <a href=\"#\" class=\"btn btn-sm btn-danger btn-delete\">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "                </table>
            </div>
            <a href=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_partido_nuevo", array("id" => $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success\" style=\"height: 30px; width: 150px;\">
                Nuevo Partido
            <span class=\"glyphicon glyphicon-plus\"></span></a>
            <a class=\"btn btn-default\" href=\"";
            // line 91
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competiciones");
            echo "\">Volver atrás</a>
        ";
        }
        // line 93
        echo "        ";
        if (($this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "estadoCompeticion", array()) == "Finalizado")) {
            // line 94
            echo "            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Posición </th>
                            <th> Equipo  </th>
                            <th> Puntos   </th>
                            <th> Victorias </th>
                            <th> Derrotas </th>
                            <th> Empates  </th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                    ";
            // line 107
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["equipos"]) ? $context["equipos"] : $this->getContext($context, "equipos")));
            foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
                if (($this->getAttribute($context["equipo"], "idCompeticion", array()) == $this->getAttribute((isset($context["competicion"]) ? $context["competicion"] : $this->getContext($context, "competicion")), "id", array()))) {
                    // line 108
                    echo "                            <tr>
                                <td>   ";
                    // line 109
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "clasificacion", array()), "html", null, true);
                    echo "º  </td>
                                <td>   ";
                    // line 110
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "nombre", array()), "html", null, true);
                    echo "    </td>
                                <td>   ";
                    // line 111
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "puntuacion", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 112
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "victorias", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 113
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "derrotas", array()), "html", null, true);
                    echo "   </td>
                                <td>   ";
                    // line 114
                    echo twig_escape_filter($this->env, $this->getAttribute($context["equipo"], "empates", array()), "html", null, true);
                    echo "   </td>
                                <td>
                                    <a href=\"";
                    // line 116
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_equipo", array("id" => $this->getAttribute($context["equipo"], "id", array()))), "html", null, true);
                    echo "\" class=\"btn btn-sm btn-info\">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            echo "                </table>
            </div>
            <a class=\"btn btn-default\" href=\"";
            // line 124
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_competiciones");
            echo "\">Volver atrás</a>
        ";
        }
        // line 126
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CriveroPruebaBundle:Competiciones:competicion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 126,  295 => 124,  291 => 122,  278 => 116,  273 => 114,  269 => 113,  265 => 112,  261 => 111,  257 => 110,  253 => 109,  250 => 108,  245 => 107,  230 => 94,  227 => 93,  222 => 91,  216 => 88,  212 => 86,  196 => 77,  191 => 75,  187 => 74,  183 => 73,  179 => 72,  175 => 71,  171 => 70,  168 => 69,  163 => 68,  148 => 55,  145 => 54,  140 => 52,  134 => 49,  126 => 45,  110 => 36,  105 => 34,  102 => 33,  97 => 32,  87 => 24,  84 => 23,  79 => 21,  72 => 18,  69 => 17,  64 => 15,  58 => 12,  51 => 9,  49 => 8,  45 => 7,  41 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
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

{% block title %} Detalles de la competicion {% endblock %}
{% block contenido %}
    <div class=\"container text-center\">
        <h1 class=\"t1\">Deporte de la competición: {{competicion.deporte}}</h1>
        <h3 class=\"t3\">Tipo de la competición: {{competicion.tipoCompeticion}}</h3>
        {% if competicion.estadoCompeticion == \"Pendiente\" %}
            <a href=\"{{path('crivero_prueba_competicion_validar', {id: competicion.id})}}\" class=\"btn btn-success\">
                Validar
            </a>
            <a href=\"{{path('crivero_prueba_competicion_rechazar', {id: competicion.id})}}\" class=\"btn btn-sm btn-danger\">
                Rechazar
            </a>
            <a class=\"btn btn-default\" href=\"{{ path('crivero_prueba_competiciones') }}\">Volver atrás</a>
        {% endif %}
        {% if competicion.estadoCompeticion == \"Rechazado\" %}
            <a href=\"{{path('crivero_prueba_competicion_validar', {id: competicion.id})}}\" class=\"btn btn-success\">
                Validar
            </a>
            <a class=\"btn btn-default\" href=\"{{ path('crivero_prueba_competiciones') }}\">Volver atrás</a>
         {% endif %}
         {% if competicion.estadoCompeticion == \"Validado\" %}
             <table class=\"table-responsive\">
                <div class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Equipos inscritos por el momento  |</th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
             {% for equipo in equipos if equipo.idCompeticion ==competicion.id %}
                 <tr>
                    <td>   {{equipo.nombre}}    </td>
                    <td>
                        <a href=\"{{ path('crivero_prueba_equipo', { id: equipo.id }) }}\" class=\"btn btn-sm btn-info\">
                            Ver
                        </a>
                        <a href=\"#\" class=\"btn btn-sm btn-danger btn-delete\">
                            Eliminar
                        </a>
                    </td>
                </tr>
             {%endfor%}
             <a href=\"{{ path('crivero_prueba_partido_nuevo', { id: competicion.id }) }}\" class=\"btn btn-success\" style=\"height: 30px; width: 150px;\">
                Nuevo Partido
            <span class=\"glyphicon glyphicon-plus\"></span></a>
            
            <a href=\"{{path('crivero_prueba_competicion_cancelar', {id: competicion.id})}}\" class=\"btn btn-sm btn-danger\">
                Cancelar Competición
            </a>
            <a class=\"btn btn-default\" href=\"{{ path('crivero_prueba_competiciones') }}\">Volver atrás</a>
         {% endif %}
        {% if competicion.estadoCompeticion == \"Jugandose\"%}
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Posición </th>
                            <th> Equipo  </th>
                            <th> Puntos   </th>
                            <th> Victorias </th>
                            <th> Derrotas </th>
                            <th> Empates  </th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                    {% for equipo in equipos if equipo.idCompeticion ==competicion.id %}
                            <tr>
                                <td>   {{equipo.clasificacion}}º  </td>
                                <td>   {{equipo.nombre}}    </td>
                                <td>   {{equipo.puntuacion}}   </td>
                                <td>   {{equipo.victorias}}   </td>
                                <td>   {{equipo.derrotas}}   </td>
                                <td>   {{equipo.empates}}   </td>
                                <td>
                                    <a href=\"{{ path('crivero_prueba_equipo', { id: equipo.id }) }}\" class=\"btn btn-sm btn-info\">
                                        Ver
                                    </a>
                                    <a href=\"#\" class=\"btn btn-sm btn-danger btn-delete\">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                    {%endfor%}
                </table>
            </div>
            <a href=\"{{ path('crivero_prueba_partido_nuevo', { id: competicion.id }) }}\" class=\"btn btn-success\" style=\"height: 30px; width: 150px;\">
                Nuevo Partido
            <span class=\"glyphicon glyphicon-plus\"></span></a>
            <a class=\"btn btn-default\" href=\"{{ path('crivero_prueba_competiciones') }}\">Volver atrás</a>
        {%endif%}
        {% if competicion.estadoCompeticion == \"Finalizado\"%}
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th> Posición </th>
                            <th> Equipo  </th>
                            <th> Puntos   </th>
                            <th> Victorias </th>
                            <th> Derrotas </th>
                            <th> Empates  </th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                    {% for equipo in equipos if equipo.idCompeticion ==competicion.id %}
                            <tr>
                                <td>   {{equipo.clasificacion}}º  </td>
                                <td>   {{equipo.nombre}}    </td>
                                <td>   {{equipo.puntuacion}}   </td>
                                <td>   {{equipo.victorias}}   </td>
                                <td>   {{equipo.derrotas}}   </td>
                                <td>   {{equipo.empates}}   </td>
                                <td>
                                    <a href=\"{{ path('crivero_prueba_equipo', { id: equipo.id }) }}\" class=\"btn btn-sm btn-info\">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                    {%endfor%}
                </table>
            </div>
            <a class=\"btn btn-default\" href=\"{{ path('crivero_prueba_competiciones') }}\">Volver atrás</a>
        {%endif%}
    </div>
{% endblock %}", "CriveroPruebaBundle:Competiciones:competicion.html.twig", "C:\\xampp\\htdocs\\Prueba\\src\\Crivero\\PruebaBundle/Resources/views/Competiciones/competicion.html.twig");
    }
}
