<?php

/* moduloclientesclienteBundle::main.html.twig */
class __TwigTemplate_7e81a51135b4badac170c56395ac437579ac4b10390ee0a8246ba3699638a9d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'navegation' => array($this, 'block_navegation'),
            'body' => array($this, 'block_body'),
            'contenido' => array($this, 'block_contenido'),
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
        echo " Vista desde main";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
    }

    // line 4
    public function block_navegation($context, array $blocks = array())
    {
        // line 5
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
            <a class=\"navbar-brand\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_homeCliente");
        echo "\"> <img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo.png"), "html", null, true);
        echo "\" style=\"width: 30px; margin-top: -5px\"> </a>
        </div>


        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav\">

                <li class=\"dropdown\">
                <li><a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_reservasClientes");
        echo "\">Reservas</a></li>
                </li>

                <li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_canchasClientes");
        echo "\">Canchas</a></li>

                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Competiciones <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_competicionesClientes");
        echo "\">Competiciones </a></li>
                        <li><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_equiposClientes");
        echo "\"> Mis equipos </a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_competicion_nueva");
        echo "\">Crear competición</a></li>
                    </ul>
                </li>

                <li class=\"dropdown\">
                    <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Sesiones<b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_misSesionesClientes");
        echo "\">Apuntadas</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li class=\"dropdown-submenu\">
                            <a tabindex=\"-1\" href=\"#\">No apuntadas</a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionesClientes");
        echo "\">Públicas</a></li>                    
                                <li><a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionesPrivadasClientes");
        echo "\">Privadas</a></li>                          
                            </ul>
                        </li>   
                    </ul>
                </li>
            </ul>

            ";
        // line 55
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 56
            echo "                <ul class=\"nav navbar-nav navbar-right\">
                    ";
            // line 57
            if ( !twig_length_filter($this->env, (isset($context["notificacionesSinLeer"]) ? $context["notificacionesSinLeer"] : $this->getContext($context, "notificacionesSinLeer")))) {
                echo "  
                        <li><a href = \"";
                // line 58
                echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_notificacionesCliente");
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/campanaSN.png"), "html", null, true);
                echo "\" style=\"width: 18px;\" /></a></li>
                    ";
            } else {
                // line 60
                echo "                        <li class=\"dropdown hidden-xs\">
                            <a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/campanaCN.png"), "html", null, true);
                echo "\" style=\"width: 18px;\" /></a>
                            <ul class=\"dropdown-menu\" style=\"background-color: rgba(67, 152, 147, 0.46); border-radius: 15px 15px;\">
                                ";
                // line 63
                $context["n"] = 0;
                echo " 
                                ";
                // line 64
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["notificacionesSinLeer"]) ? $context["notificacionesSinLeer"] : $this->getContext($context, "notificacionesSinLeer")));
                foreach ($context['_seq'] as $context["_key"] => $context["notificacion"]) {
                    if (((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")) < 5)) {
                        echo "  
                                    ";
                        // line 65
                        if (($this->getAttribute($context["notificacion"], "concepto", array()) == "Publica")) {
                            // line 66
                            echo "                                        ";
                            if (twig_in_filter($this->getAttribute($context["notificacion"], "idEntidad", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "sesiones", array()))) {
                                // line 67
                                echo "                                            ";
                                $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_miSesionClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                                // line 68
                                echo "                                        ";
                            } else {
                                // line 69
                                echo "                                            ";
                                $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                                // line 70
                                echo "                                        ";
                            }
                            // line 71
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Privada")) {
                            // line 72
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 73
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Reserva")) {
                            // line 74
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_reservaClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 75
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Usuario")) {
                            // line 76
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_miPerfil", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 77
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Cancha")) {
                            // line 78
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_canchaClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 79
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Mensaje")) {
                            // line 80
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_mensajeCliente", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 81
                            echo "                                    ";
                            // line 83
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "AbandonoPublica")) {
                            // line 84
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionClientes", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 85
                            echo "                                    ";
                        } elseif (($this->getAttribute($context["notificacion"], "concepto", array()) == "Tarifas")) {
                            // line 86
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_sesionesClientes");
                            // line 87
                            echo "                                    ";
                        } else {
                            // line 88
                            echo "                                        ";
                            $context["ruta"] = $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_notificacionesCliente", array("id" => $this->getAttribute($context["notificacion"], "idEntidad", array())));
                            // line 89
                            echo "                                    ";
                        }
                        // line 90
                        echo "                                        <li class=\"text-center\"><a style=\"color: white; text-shadow: -1px -1px 1px #333, 1px -1px 1px #333, -1px 1px 1px #333, 1px 1px 1px #333;\" href=\"";
                        echo twig_escape_filter($this->env, (isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["notificacion"], "mensaje", array()), "html", null, true);
                        echo "</a></li>
                                        <li role=\"separator\" class=\"divider\" style=\"background-color: #cecdcd\"></li>
                                    ";
                        // line 92
                        $context["n"] = ((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")) + 1);
                        // line 93
                        echo "                                ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notificacion'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 94
                echo "                                    <li class=\"text-center\"><a href = \"";
                echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_notificacionesCliente");
                echo "\"><font color=\"blue\"><strong>Ver todas</strong></font></a></li>
                            </ul>
                        </li>
                        <li><a class=\"hidden-sm hidden-md hidden-lg\" href = \"";
                // line 97
                echo $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_notificacionesCliente");
                echo "\"><img  src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/campanaCN.png"), "html", null, true);
                echo "\" style=\"width: 18px\"/></a></li>
                    ";
            }
            // line 99
            echo "                    <li><a href = \"";
            echo $this->env->getExtension('routing')->getPath("moduloclientes_cliente_mensajes_recibidosCliente");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/correo.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                    <li><a href=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("moduloclientes_cliente_miPerfil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/user.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                    <li><a href=\"";
            // line 101
            echo $this->env->getExtension('routing')->getPath("crivero_prueba_logout");
            echo "\" style=\"margin-right:12px;\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logout.png"), "html", null, true);
            echo "\" style=\"width: 18px;\" /></a></li>
                </ul>
            ";
        }
        // line 104
        echo "
            <form method=\"GET\" class=\"navbar-form navbar-center\" role=\"search\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"query\" class=\"form-control\" value=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "query"), "method"), "html", null, true);
        echo "\" 
                           placeholder=\"Buscar usuarios, reservas\" >
                    <div class=\"input-group-btn\">
                        <button type=\"submit\" class=\"btn btn-default\">
                            <img src=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/search.png"), "html", null, true);
        echo "\" style=\"width: 15px;\" />  
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>

";
    }

    // line 120
    public function block_body($context, array $blocks = array())
    {
        // line 121
        echo "    <div id=\"pagina\" class=\"cfix\">
        <div id =\"contenido\">
            ";
        // line 123
        $this->displayBlock('contenido', $context, $blocks);
        // line 125
        echo "        </div>
    </div>
";
    }

    // line 123
    public function block_contenido($context, array $blocks = array())
    {
        // line 124
        echo "            ";
    }

    public function getTemplateName()
    {
        return "moduloclientesclienteBundle::main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  335 => 124,  332 => 123,  326 => 125,  324 => 123,  320 => 121,  317 => 120,  304 => 111,  297 => 107,  292 => 104,  284 => 101,  278 => 100,  271 => 99,  264 => 97,  257 => 94,  250 => 93,  248 => 92,  240 => 90,  237 => 89,  234 => 88,  231 => 87,  228 => 86,  225 => 85,  222 => 84,  219 => 83,  217 => 81,  214 => 80,  211 => 79,  208 => 78,  205 => 77,  202 => 76,  199 => 75,  196 => 74,  193 => 73,  190 => 72,  187 => 71,  184 => 70,  181 => 69,  178 => 68,  175 => 67,  172 => 66,  170 => 65,  163 => 64,  159 => 63,  154 => 61,  151 => 60,  144 => 58,  140 => 57,  137 => 56,  135 => 55,  125 => 48,  121 => 47,  113 => 42,  103 => 35,  98 => 33,  94 => 32,  86 => 27,  80 => 24,  67 => 16,  54 => 5,  51 => 4,  46 => 3,  40 => 2,  11 => 1,);
    }
}
