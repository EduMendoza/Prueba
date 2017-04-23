<?php

namespace Crivero\PruebaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartidosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $equipos;
    private $canchas;
    public function __construct(array $equipos, array $canchas) {
        $this->equipos = $equipos;
        $this->canchas = $canchas;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $resEquipos = array();
        for($i=0; $i < count($this->equipos); $i++){
            $resEquipos[$i]= array($this->equipos[$i]->getId() => $this->equipos[$i]->getNombre());
        }
        $resCanchas = array();
        for($i=0; $i < count($this->canchas); $i++){
            $resCanchas[$i]= array($this->canchas[$i]->getId() => $this->canchas[$i]->getTipo());
        }

        $builder
            ->add('idCompeticion')
            ->add('idEquipoLocal','choice', array('choices' => $resEquipos))
            ->add('idEquipoVisitante','choice', array('choices' => $resEquipos))
            ->add('idCancha','choice', array('choices' => $resCanchas))
            ->add('fechaInicio','date', array('widget' => "single_text"))
            ->add('resultado','text')
            ->add('estadoPartido','choice',array('choices' => array("Pendiente"=>'Pendiente',
                                                                    "Jugandose"=>'Jugandose',
                                                                    "Cancelado"=>'Cancelado',
                                                                    "Finalizado"=>'Finalizado')))
            ->add('arbitro','text')
            ->add('confirmar', 'submit', array('label' => 'Confirmar'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crivero\PruebaBundle\Entity\Partidos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crivero_pruebabundle_partidos';
    }
}
