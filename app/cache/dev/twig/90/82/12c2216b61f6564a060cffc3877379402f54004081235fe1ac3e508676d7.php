<?php

/* modulomonitoresmonitoresBundle:Privada:sesionesDedicadas.html.twig */
class __TwigTemplate_908212c2216b61f6564a060cffc3877379402f54004081235fe1ac3e508676d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("modulomonitoresmonitoresBundle::main.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "modulomonitoresmonitoresBundle::main.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " Sesiones privadas aceptadas ";
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo twig_include($this->env, $context, "CriveroPruebaBundle:Default:messages/success.html.twig");
        echo "
    <div class=\"container\">
        <div class=\"page-header\">
            <h1 class=\"t1\">Sesiones privadas aceptadas</h1>
        </div>
        <div class=\"panel panel-default text-center\">
            <div class=\"panel-body myelement\">
                ";
        // line 11
        if ( !twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")))) {
            // line 12
            echo "                    <h2>No se encontraron sesiones privadas</h2>
                ";
        } else {
            // line 14
            echo "                    <div class=\"table-responsive\">
                        <table class=\"table table-hover\">
                            <thead>
                                <tr>
                                    <th>";
            // line 18
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Nombre de la sesión", "pagination.nombre");
            echo "</th>
                                    <th>";
            // line 19
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Monitor", "pagination.monitor");
            echo "</th>
                                    <th>";
            // line 20
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Número de sesiones", "pagination.nSesiones");
            echo "</th>
                                    <th>";
            // line 21
            echo $this->env->getExtension('knp_pagination')->sortable($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Aula asignada", "pagination.aula");
            echo "</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["sesion"]) {
                // line 27
                echo "                                    <tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "id", array()), "html", null, true);
                echo "\">
                                        <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "nombre", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "monitor", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["sesion"], "nSesiones", array()), "html", null, true);
                echo " Sesiones</td>
                                        <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["aulas"]) ? $context["aulas"] : $this->getContext($context, "aulas")), ($this->getAttribute($context["loop"], "index", array()) - 1), array(), "array"), "nombre", array()), "html", null, true);
                echo "</td>
                                        <td class=\"actions\">

                                            <a href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modulomonitores_monitores_sesionDedicada", array("id" => $this->getAttribute($context["sesion"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-sm btn-primary\">
                                                Ver más información
                                            </a>
                                        </td>
                                    </tr>
                                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sesion'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "                            </tbody>
                        </table>
                    </div>
                ";
        }
        // line 44
        echo "                <div class=\"navigation text-center\">
                    ";
        // line 45
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "modulomonitoresmonitoresBundle:Privada:sesionesDedicadas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 45,  155 => 44,  149 => 40,  129 => 34,  123 => 31,  119 => 30,  115 => 29,  111 => 28,  106 => 27,  89 => 26,  81 => 21,  77 => 20,  73 => 19,  69 => 18,  63 => 14,  59 => 12,  57 => 11,  46 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}