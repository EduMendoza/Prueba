<?php

namespace Crivero\PruebaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompeticionesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('deporte','choice', array('choices' => array("Futbol"=>'Futbol',
                                                              "Baloncesto"=>'Baloncesto')))
            ->add('estadocompeticion', 'choice', array('choices' => array("Pendiente" => 'Solicitud presentada', 
                                                                          "Validado" => 'Validar',
                                                                          "Jugandose" => 'Empezar competición',
                                                                          "Finalizado" => 'Finalizar competición')))
            ->add('tipocompeticion','choice', array('choices' => array("Liga"=>'Liga',
                                                                       "Torneo"=>'Torneo')))
            ->add('fechainicio')
            ->add('fechafinalizacion')
            ->add('motivos', 'textarea')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crivero\PruebaBundle\Entity\Competiciones'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'crivero_pruebabundle_competiciones';
    }
}
