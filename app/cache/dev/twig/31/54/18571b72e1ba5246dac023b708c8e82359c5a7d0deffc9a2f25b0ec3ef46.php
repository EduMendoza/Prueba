<?php

/* CriveroPruebaBundle:Reservas:reservasCliente.html.twig */
class __TwigTemplate_315418571b72e1ba5246dac023b708c8e82359c5a7d0deffc9a2f25b0ec3ef46 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("CriveroPruebaBundle::main.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), 0, array(), "array"), "cliente", array())), "html", null, true);
        echo " - Reservas";
    }

    // line 6
    public function block_contenido($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        echo twig_include($this->env, $context, "CriveroPruebaBundle:Default:messages/success.html.twig");
        echo "
    <div class=\"container\">
        <div class=\"page-header \"> 
            <h1 class=\"t1\">";
        // line 10
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), 0, array(), "array"), "cliente", array())), "html", null, true);
        echo " - Reservas</h1>
        </div>
        <div class=\"panel panel-default\">
            <div class=\"panel-body myelement\">
                ";
        // line 14
        if ( !twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")))) {
            // line 15
            echo "                    <h2>No se encontraron reservas.</h2>
                ";
        } else {
            // line 17
            echo "                    <div class=\"table-responsive\">
                        <table class=\"table table-hover \">
                            <thead>
                                <tr>
                                    <th>";
            // line 21
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Código", "r.id");
            echo "</th>
                                    <th>";
            // line 22
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Cancha", "r.cancha");
            echo "</th>
                                    <th>";
            // line 23
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Fecha", "r.fechaInicio");
            echo "</th>
                                    <th>";
            // line 24
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Horario", "r.horario");
            echo "</th>
                                    <td><strong>Acciones</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["reserva"]) {
                // line 30
                echo "                                    <tr>
                                        <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["reserva"], "id", array()), "html", null, true);
                echo "</td>
                                        <td><strong><a class=\"atd\"  >";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["reserva"], "cancha", array()), "html", null, true);
                echo "</a></strong></td>
                                        <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["reserva"], "fechaInicio", array()), "d/m/Y"), "html", null, true);
                echo "</td>
                                        ";
                // line 34
                $context["horario"] = twig_split_filter($this->env, $this->getAttribute($context["reserva"], "horario", array()), "&");
                echo " 
                                        ";
                // line 35
                if ((twig_length_filter($this->env, (isset($context["horario"]) ? $context["horario"] : $this->getContext($context, "horario"))) > 2)) {
                    // line 36
                    echo "                                            ";
                    $context["horarioFinal1"] = twig_split_filter($this->env, $this->getAttribute((isset($context["horario"]) ? $context["horario"] : $this->getContext($context, "horario")), 0, array(), "array"), "-");
                    echo " 
                                            ";
                    // line 37
                    $context["horarioFinal2"] = twig_split_filter($this->env, $this->getAttribute((isset($context["horario"]) ? $context["horario"] : $this->getContext($context, "horario")), (twig_length_filter($this->env, (isset($context["horario"]) ? $context["horario"] : $this->getContext($context, "horario"))) - 2), array(), "array"), "-");
                    echo " 
                                            <td>";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["horarioFinal1"]) ? $context["horarioFinal1"] : $this->getContext($context, "horarioFinal1")), 0, array(), "array"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["horarioFinal2"]) ? $context["horarioFinal2"] : $this->getContext($context, "horarioFinal2")), (twig_length_filter($this->env, (isset($context["horarioFinal2"]) ? $context["horarioFinal2"] : $this->getContext($context, "horarioFinal2"))) - 1), array(), "array"), "html", null, true);
                    echo " </td>
                                        ";
                } else {
                    // line 40
                    echo "                                            <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["horario"]) ? $context["horario"] : $this->getContext($context, "horario")), 0, array(), "array"), "html", null, true);
                    echo "</td>
                                        ";
                }
                // line 42
                echo "
                                        <td class=\"actions\">
                                              <a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("crivero_prueba_cancha", array("id" => $this->getAttribute($context["reserva"], "idCancha", array()))), "html", null, true);
                echo "\" class=\"btn btn-sm btn-primary\" style=\"margin-bottom: 0\">
                                                Cancha
                                            </a>
                                            <a href=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("crivero_prueba_reserva_cancelar", array("id" => $this->getAttribute($context["reserva"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-sm btn-danger\" style=\"margin-bottom: 0\">
                                                Cancelar
                                            </a>
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reserva'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "                            </tbody>
                        </table>
                    </div>

                ";
        }
        // line 58
        echo "                <div class=\"navigation text-center\" style=\"margin: -10px\">
                    ";
        // line 59
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
                </div>
            </div>
        </div>
        <a class=\"btn btn-default\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("crivero_prueba_cliente", array("id" => $this->getAttribute($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), 0, array(), "array"), "idCliente", array()))), "html", null, true);
        echo "\">Volver atrás</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CriveroPruebaBundle:Reservas:reservasCliente.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 63,  173 => 59,  170 => 58,  163 => 53,  151 => 47,  145 => 44,  141 => 42,  135 => 40,  128 => 38,  124 => 37,  119 => 36,  117 => 35,  113 => 34,  109 => 33,  105 => 32,  101 => 31,  98 => 30,  94 => 29,  86 => 24,  82 => 23,  78 => 22,  74 => 21,  68 => 17,  64 => 15,  62 => 14,  55 => 10,  48 => 7,  45 => 6,  37 => 4,  11 => 2,);
    }
}
