<?php

namespace modulomonitores\monitoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crivero\PruebaBundle\Entity\Sesiones;
use Crivero\PruebaBundle\Form\SesionesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

class SesionController extends Controller {

    public function sesionesMonitoresAction() {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesiones = $repository->findAll();
        return $this->render('modulomonitoresmonitoresBundle:Default:sesionesMonitores.html.twig', array("sesiones" => $sesiones));
    }

    public function sesionMonitoresAction($id) {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesion = $repository->find($id);
        $deleteForm = $this->createDeleteForm($sesion);
        return $this->render('modulomonitoresmonitoresBundle:Default:sesionMonitores.html.twig', array("sesion" => $sesion, 'delete_form' => $deleteForm->createView()));
    }

    private function createDeleteForm($sesion) {
        return $this->createFormBuilder()->setAction($this->generateUrl('modulomonitores_monitores_eliminarSesion', array('id' => $sesion->getId())))
                        ->setMethod('DELETE')
                        ->getForm();
    }

    public function eliminarSesionAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $sesion=$em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);

        $form = $this->createDeleteForm($sesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($sesion);
            $em->flush();

                return $this->redirect($this->generateUrl('modulomonitores_monitores_sesionesMonitores'));
        }
    }

    public function nuevaSesionAction() {
        $sesion = new Sesiones();
        $form = $this->createCreateForm($sesion);

        return $this->render('modulomonitoresmonitoresBundle:Default:nuevaSesion.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(), $entity, array(
            'action' => $this->generateUrl('modulomonitores_monitores_crearSesion'),
            'method' => 'POST'
        ));
        return $form;
    }

    public function crearSesionAction(Request $request) {
        $sesion = new Sesiones();
        $form = $this->createCreateForm($sesion);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $sesion->setEstado("pendiente");
            $sesion->setEstadoCliente("no disponible");
            $sesion->setnClientes(0);
            $sesion->setCliente("normal");
            $em = $this->getDoctrine()->getManager();
            $em->persist($sesion);
            $em->flush();

            return $this->redirect($this->generateUrl('modulomonitores_monitores_sesionesMonitores'));
        }
        return $this->render('modulomonitoresmonitoresBundle:Default:nuevaSesion.html.twig', array('form' => $form->createView()));
    }

    public function editarSesionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);

        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createEdiForm($sesion);
        return $this->render('modulomonitoresmonitoresBundle:Default:editarSesion.html.twig', array('sesion' => $sesion, 'form' => $form->createView()));
    }

    private function createEdiForm(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(), $entity, array(
            'action' => $this->generateUrl('modulomonitores_monitores_editar', array('id' => $entity->getId())),
            'method' => 'PUT'
        ));
        return $form;
    }

    public function editarAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);
        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createEdiForm($sesion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sesion->setEstado("modificada");
            $sesion->setEstadoCliente("no disponible");
            $em->flush();
            return $this->redirect($this->generateUrl('modulomonitores_monitores_sesionMonitores', array('id' => $sesion->getId())));
        }
        return $this->render('modulomonitoresmonitoresBundle:Default:editarSesion.html.twig', array('form' => $form->createView()));
    }

    public function nuevaSesionDedicadaAction() {
        $sesion = new Sesiones();
        $form = $this->createCreateFormDedicado($sesion);

        return $this->render('modulomonitoresmonitoresBundle:Default:nuevaSesionDedicada.html.twig', array('form' => $form->createView()));
    }

    private function createCreateFormDedicado(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(), $entity, array(
            'action' => $this->generateUrl('modulomonitores_monitores_crearSesionDedicada'),
            'method' => 'POST'
        ));
        return $form;
    }

    public function crearSesionDedicadaAction(Request $request) {
        $sesion = new Sesiones();
        $form = $this->createCreateFormDedicado($sesion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $sesion->setEstado("pendiente");
            $sesion->setEstadoCliente("no disponible");
            $sesion->setnClientes(1);
            $sesion->setlClientes(1);
            $cliente = $form->get('cliente')->getData();
            if ($cliente != null) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($sesion);
                $em->flush();
                return $this->redirect($this->generateUrl('modulomonitores_monitores_sesionesDedicadas'));
            } else {
                $form->get('cliente')->addError(new FormError('Rellene el campo gracias'));
            }
        }
        return $this->render('modulomonitoresmonitoresBundle:Default:nuevaSesionDedicada.html.twig', array('form' => $form->createView()));
    }

    public function editarSesionDedicadaAction($id) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);

        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createEdiDediForm($sesion);
        return $this->render('modulomonitoresmonitoresBundle:Default:editarSesionDedicada.html.twig', array('sesion' => $sesion, 'form' => $form->createView()));
    }

    private function createEdiDediForm(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(), $entity, array(
            'action' => $this->generateUrl('modulomonitores_monitores_editarDedicada', array('id' => $entity->getId())),
            'method' => 'PUT'
        ));
        return $form;
    }

    public function editarDedicadaAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);
        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createEdiDediForm($sesion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sesion->setEstado("modificada");
            $sesion->setEstadoCliente("no disponible");
            $cliente = $form->get('cliente')->getData();
            if ($cliente != null) {
                $em->flush();
                return $this->redirect($this->generateUrl('modulomonitores_monitores_sesionDedicada', array('id' => $sesion->getId())));
            } else {
                $form->get('cliente')->addError(new FormError('Rellene el campo gracias'));
            }
        }
        return $this->render('modulomonitoresmonitoresBundle:Default:editarSesionDedicada.html.twig', array('form' => $form->createView()));
    }

}
