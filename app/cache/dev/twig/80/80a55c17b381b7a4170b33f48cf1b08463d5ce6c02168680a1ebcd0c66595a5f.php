<?php

/* CriveroPruebaBundle::main.html.twig */
class __TwigTemplate_a9742f6333c9985b74f27f550eb4e307982dd42301b5062c6da6033f8c16a25e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "CriveroPruebaBundle::main.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'navegation' => array($this, 'block_navegation'),
            'body' => array($this, 'block_body'),
            'contenido' => array($this, 'block_contenido'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " Vista desde main ";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
    }

    // line 6
    public function block_navegation($context, array $blocks = array())
    {
        // line 7
        echo "    <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\" >
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"
                    data-target=\".navbar-ex1-collapse\">
                <span class=\"sr-only\">Desplegar navegación</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"#\"> <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/logo.png"), "html", null, true);
        echo "\" style=\"width: 30px; margin-top: -5px\"> </a>
        </div>


        <div class=\"collapse navbar-collapse navbar-ex1-collapse \" >
            <ul class=\"nav navbar-nav \">
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Usuarios <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 27
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_clientes");
        echo "\">Clientes</a></li>
                        <li><a href=\"";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_monitores");
        echo "\">Monitores</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_nuevo");
        echo "\">Nuevo usuario</a></li>
                    </ul>
                </li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Instalaciones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_canchas");
        echo "\">Canchas</a></li>
                        <li><a href=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_aulas");
        echo "\">Aulas</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li class=\"dropdown-submenu\">
                            <a tabindex=\"-1\" href=\"#\">Nueva instalacion</a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_cancha_nueva");
        echo "\">Nueva cancha</a></li> 
                                <li><a href=\"";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_aula_nueva");
        echo "\">Nueva aula</a></li> 
                            </ul>
                        </li>    
                    </ul>
                </li>
                <li><a href=\"";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_reservas");
        echo "\">Reservas</a></li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Competiciones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 52
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_competiciones");
        echo "\">Competiciones </a></li>
                        <li><a href=\"";
        // line 53
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_partidos");
        echo "\">Partidos </a></li>
                        <li><a href=\"";
        // line 54
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_equipos");
        echo "\">Equipos</a></li>
                        <li><a href=\"";
        // line 55
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_jugadores");
        echo "\">Jugadores</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"";
        // line 57
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_competicion_nueva");
        echo "\">Crear competición</a></li>
                    </ul>
                </li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Sesiones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 63
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_sesiones");
        echo "\">S.Públicas</a></li>
                        <li><a href=\"";
        // line 64
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_dedicadas");
        echo "\">S.Privadas</a></li>
                    </ul>
                </li>
            </ul>

            ";
        // line 69
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 70
            echo "                <ul class=\"nav navbar-nav navbar-right\">
                    ";
            // line 71
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()) == "director")) {
                // line 72
                echo "                        <li><a href = \"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_enviarMensaje");
                echo "\">enviar mensaje</a></li>
                    ";
            }
            // line 73
            echo " 
                    ";
            // line 74
            if ( !twig_length_filter($this->env, (isset($context["notificacionesSinLeer"]) ? $context["notificacionesSinLeer"] : $this->getContext($context, "notificacionesSinLeer")))) {
                echo "  
                        <li><a href = \"";
                // line 75
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_notificacionesAdmin");
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/campanaSN.png"), "html", null, true);
                echo "\" style=\"width: 18px;\" /></a></li>
                    ";
            } else {
                // line 77
                echo "                        <li class=\"dropdown hidden-xs\">
                            <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"";
                // line 78
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/campanaCN.png"), "html", null, true);
                echo "\" style=\"width: 18px;\" /></a>
                            <ul class=\"dropdown-menu\" style=\"background-color: rgba(67, 152, 147, 0.46); border-radius: 15px 15px;\">
                                ";
                // line 80
                $context["n"] = 0;
                echo " 
                                ";
                // line 81
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["notificacionesSinLeer"]) ? $context["notificacionesSinLeer"] : $this->getContext($context, "notificacionesSinLeer")));
                foreach ($context['_seq'] as $context["_key"] => $context["notificacion"]) {
                    if (((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")) < 5)) {
                        echo "  
                                    ";
                        // line 82
                        if (($this->getAttribute($context["notificacion"], "concepto", array()) == "Publica")) {
                            // line 83
                            echo "                                       ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_sesion", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            echo "      
                                    ";
                        } elseif (($this->getAttribute(                        // line 84
$context["notificacion"], "concepto", array()) == "Privada")) {
                            // line 85
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_sesion", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 86
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Reserva")) {
                            // line 87
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_reservas_cliente", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 88
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Usuario")) {
                            // line 89
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_cliente", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 90
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Partido")) {
                            // line 91
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_editarPartido", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 92
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Mensaje")) {
                            // line 93
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_mensaje", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 94
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "PublicaEliminada")) {
                            // line 95
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_sesiones");
                            // line 96
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "PrivadaEliminada")) {
                            // line 97
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_dedicadas", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 98
                            echo "                                    ";
                        }
                        // line 99
                        echo "                                        <li class=\"text-center\"><a style=\"color: white; text-shadow: -1px -1px 1px #333, 1px -1px 1px #333, -1px 1px 1px #333, 1px 1px 1px #333;\" href=\"";
                        echo twig_escape_filter($this->env, (isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["notificacion"], "mensaje", array()), "html", null, true);
                        echo "</a></li>
                                        <li role=\"separator\" class=\"divider\" style=\"background-color: #cecdcd\"></li>
                                    ";
                        // line 101
                        $context["n"] = ((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")) + 1);
                        // line 102
                        echo "                                ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notificacion'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "                                <li class=\"text-center\"><a href = \"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_notificacionesAdmin");
                echo "\"><font color=\"blue\"><strong>Ver todas</strong></font></a></li>
                            </ul>
                        </li>
                        <li><a class=\"hidden-sm hidden-md hidden-lg\" href = \"";
                // line 106
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("crivero_prueba_notificacionesAdmin");
                echo "\"><img  src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/campanaCN.png"), "html", null, true);
                echo "\" style=\"width: 18px\"/></a></li>                       
                    ";
            }
            // line 108
            echo "                    <li><a href = \"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_mensajes_recibidos");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/correo.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                    <li><a href = \"";
            // line 109
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_perfil");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/user.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                    <li><a href=\"";
            // line 110
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("crivero_prueba_logout");
            echo "\" style=\"margin-right: 12px\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/logout.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                </ul>
            ";
        }
        // line 113
        echo "
            <form method=\"GET\" class=\"navbar-form navbar-center\" role=\"search\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"query\" class=\"form-control\" value=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "query"), "method"), "html", null, true);
        echo "\" 
                           placeholder=\"Buscar usuarios, reservas\" >
                    <div class=\"input-group-btn\">
                        <button type=\"submit\" class=\"btn btn-default\">
                            <img src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("images/search.png"), "html", null, true);
        echo "\" style=\"width: 15px;\" />  
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
";
    }

    // line 128
    public function block_body($context, array $blocks = array())
    {
        // line 129
        echo "    <div id=\"pagina\" class=\"cfix\">
        <div id =\"contenido\">
            ";
        // line 131
        $this->displayBlock('contenido', $context, $blocks);
        // line 133
        echo "        </div>

    </div>

";
    }

    // line 131
    public function block_contenido($context, array $blocks = array())
    {
        // line 132
        echo "            ";
    }

    // line 139
    public function block_javascripts($context, array $blocks = array())
    {
        // line 140
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CriveroPruebaBundle::main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  359 => 140,  356 => 139,  352 => 132,  349 => 131,  341 => 133,  339 => 131,  335 => 129,  332 => 128,  320 => 120,  313 => 116,  308 => 113,  300 => 110,  294 => 109,  287 => 108,  280 => 106,  273 => 103,  266 => 102,  264 => 101,  256 => 99,  253 => 98,  250 => 97,  247 => 96,  244 => 95,  241 => 94,  238 => 93,  235 => 92,  232 => 91,  229 => 90,  226 => 89,  223 => 88,  220 => 87,  217 => 86,  214 => 85,  212 => 84,  207 => 83,  205 => 82,  198 => 81,  194 => 80,  189 => 78,  186 => 77,  179 => 75,  175 => 74,  172 => 73,  166 => 72,  164 => 71,  161 => 70,  159 => 69,  151 => 64,  147 => 63,  138 => 57,  133 => 55,  129 => 54,  125 => 53,  121 => 52,  114 => 48,  106 => 43,  102 => 42,  94 => 37,  90 => 36,  81 => 30,  76 => 28,  72 => 27,  60 => 18,  47 => 7,  44 => 6,  39 => 4,  33 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '::base.html.twig' %}
{% block title %} Vista desde main {% endblock %}

{% block header %}{% endblock %}

{% block navegation %}
    <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\" >
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"
                    data-target=\".navbar-ex1-collapse\">
                <span class=\"sr-only\">Desplegar navegación</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"#\"> <img src=\"{{ asset('images/logo.png') }}\" style=\"width: 30px; margin-top: -5px\"> </a>
        </div>


        <div class=\"collapse navbar-collapse navbar-ex1-collapse \" >
            <ul class=\"nav navbar-nav \">
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Usuarios <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"{{url('crivero_prueba_clientes')}}\">Clientes</a></li>
                        <li><a href=\"{{url('crivero_prueba_monitores')}}\">Monitores</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"{{url('crivero_prueba_nuevo')}}\">Nuevo usuario</a></li>
                    </ul>
                </li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Instalaciones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"{{url('crivero_prueba_canchas')}}\">Canchas</a></li>
                        <li><a href=\"{{url('crivero_prueba_aulas')}}\">Aulas</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li class=\"dropdown-submenu\">
                            <a tabindex=\"-1\" href=\"#\">Nueva instalacion</a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"{{url('crivero_prueba_cancha_nueva')}}\">Nueva cancha</a></li> 
                                <li><a href=\"{{url('crivero_prueba_aula_nueva')}}\">Nueva aula</a></li> 
                            </ul>
                        </li>    
                    </ul>
                </li>
                <li><a href=\"{{url('crivero_prueba_reservas')}}\">Reservas</a></li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Competiciones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"{{url('crivero_prueba_competiciones')}}\">Competiciones </a></li>
                        <li><a href=\"{{url('crivero_prueba_partidos')}}\">Partidos </a></li>
                        <li><a href=\"{{url('crivero_prueba_equipos')}}\">Equipos</a></li>
                        <li><a href=\"{{url('crivero_prueba_jugadores')}}\">Jugadores</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"{{url('crivero_prueba_competicion_nueva')}}\">Crear competición</a></li>
                    </ul>
                </li>
                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Sesiones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"{{url('crivero_prueba_sesiones')}}\">S.Públicas</a></li>
                        <li><a href=\"{{url('crivero_prueba_dedicadas')}}\">S.Privadas</a></li>
                    </ul>
                </li>
            </ul>

            {% if is_granted(\"IS_AUTHENTICATED_FULLY\") %}
                <ul class=\"nav navbar-nav navbar-right\">
                    {% if app.user.username == 'director' %}
                        <li><a href = \"{{url('crivero_prueba_enviarMensaje')}}\">enviar mensaje</a></li>
                    {% endif %} 
                    {% if not notificacionesSinLeer|length %}  
                        <li><a href = \"{{url('crivero_prueba_notificacionesAdmin')}}\"><img src=\"{{asset('images/campanaSN.png')}}\" style=\"width: 18px;\" /></a></li>
                    {% else %}
                        <li class=\"dropdown hidden-xs\">
                            <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"{{asset('images/campanaCN.png')}}\" style=\"width: 18px;\" /></a>
                            <ul class=\"dropdown-menu\" style=\"background-color: rgba(67, 152, 147, 0.46); border-radius: 15px 15px;\">
                                {% set n = 0 %} 
                                {% for notificacion in notificacionesSinLeer if n < 5 %}  
                                    {% if notificacion.concepto == \"Publica\"%}
                                       {% set ruta = url('crivero_prueba_sesion', {id: notificacion.idEntidad})%}      
                                    {% elseif notificacion.concepto == \"Privada\"%}
                                        {% set ruta = url('crivero_prueba_sesion', {id: notificacion.idEntidad})%}
                                    {% elseif notificacion.concepto == \"Reserva\"%}
                                        {% set ruta = url('crivero_prueba_reservas_cliente', {id: notificacion.idEntidad})%}
                                    {% elseif notificacion.concepto == \"Usuario\"%}
                                        {% set ruta = url('crivero_prueba_cliente', {id: notificacion.idEntidad})%}
                                    {% elseif notificacion.concepto == \"Partido\"%}
                                        {% set ruta = url('crivero_prueba_editarPartido', {id: notificacion.idEntidad})%}
                                    {% elseif notificacion.concepto == \"Mensaje\"%}
                                        {% set ruta = url('crivero_prueba_mensaje', {id: notificacion.idEntidad})%}
                                    {% elseif notificacion.concepto == \"PublicaEliminada\"%}
                                        {% set ruta = url('crivero_prueba_sesiones')%}
                                    {% elseif notificacion.concepto == \"PrivadaEliminada\"%}
                                        {% set ruta = url('crivero_prueba_dedicadas', {id: notificacion.idEntidad})%}
                                    {% endif %}
                                        <li class=\"text-center\"><a style=\"color: white; text-shadow: -1px -1px 1px #333, 1px -1px 1px #333, -1px 1px 1px #333, 1px 1px 1px #333;\" href=\"{{ ruta }}\">{{ notificacion.mensaje }}</a></li>
                                        <li role=\"separator\" class=\"divider\" style=\"background-color: #cecdcd\"></li>
                                    {% set n = n + 1 %}
                                {% endfor %}
                                <li class=\"text-center\"><a href = \"{{url('crivero_prueba_notificacionesAdmin')}}\"><font color=\"blue\"><strong>Ver todas</strong></font></a></li>
                            </ul>
                        </li>
                        <li><a class=\"hidden-sm hidden-md hidden-lg\" href = \"{{url('crivero_prueba_notificacionesAdmin')}}\"><img  src=\"{{asset('images/campanaCN.png')}}\" style=\"width: 18px\"/></a></li>                       
                    {% endif %}
                    <li><a href = \"{{path('crivero_prueba_mensajes_recibidos')}}\"><img src=\"{{asset('images/correo.png')}}\" style=\"width: 18px;\" /></a></li>
                    <li><a href = \"{{path('crivero_prueba_perfil')}}\"><img src=\"{{asset('images/user.png')}}\" style=\"width: 18px;\" /></a></li>
                    <li><a href=\"{{path('crivero_prueba_logout')}}\" style=\"margin-right: 12px\"><img src=\"{{asset('images/logout.png')}}\" style=\"width: 18px;\" /></a></li>
                </ul>
            {% endif %}

            <form method=\"GET\" class=\"navbar-form navbar-center\" role=\"search\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"query\" class=\"form-control\" value=\"{{app.request.get('query')}}\" 
                           placeholder=\"Buscar usuarios, reservas\" >
                    <div class=\"input-group-btn\">
                        <button type=\"submit\" class=\"btn btn-default\">
                            <img src=\"{{asset('images/search.png')}}\" style=\"width: 15px;\" />  
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
{% endblock %}
{% block body %}
    <div id=\"pagina\" class=\"cfix\">
        <div id =\"contenido\">
            {% block contenido %}
            {% endblock %}
        </div>

    </div>

{% endblock %}

{% block javascripts %}
    {{ parent() }}
{% endblock %}", "CriveroPruebaBundle::main.html.twig", "C:\\xampp\\htdocs\\Prueba\\src\\Crivero\\PruebaBundle/Resources/views/main.html.twig");
    }
}
