<?php

namespace moduloclientes\clienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormError;
use Crivero\PruebaBundle\Entity\Comentarios;
use Crivero\PruebaBundle\Form\ComentariosType;
use Crivero\PruebaBundle\Entity\Notificaciones;

class MensajeriaController extends Controller {

    public function enviarMensajeMonitorAction($id) {
        $comentario = new Comentarios();
        $destino = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios")->find($id)->getUsername();

        $form = $this->createMessageForm($id, $comentario);
        return $this->render('moduloclientesclienteBundle:Mensajes:nuevoMensajeCliente.html.twig', array('form' => $form->createView(),
                    'destino' => $destino, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function mensajearAdministradorClienteAction() {
        $comentario = new Comentarios();
        $destino = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios")->getAdmin()[0];

        $form = $this->createMessageForm($destino->getId(), $comentario);
        return $this->render('moduloclientesclienteBundle:Mensajes:nuevoMensajeCliente.html.twig', array('form' => $form->createView(),
                    'destino' => $destino->getUsername(), 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    private function createMessageForm($id, Comentarios $entity) {
        $form = $this->createForm(new ComentariosType(), $entity, array(
            'action' => $this->generateUrl('moduloclientes_cliente_enviandoCliente', array('id' => $id)),
            'method' => 'POST'
        ));
        return $form;
    }

    public function enviandoClienteAction($id, Request $request) {
        $comentario = new Comentarios();
        $form = $this->createMessageForm($id, $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
            $dest = $repositoryUsuarios->find($id);
            if ($dest != null) {
                $comentario->setIdDestinatario($dest->getId());
                $em = $this->getDoctrine()->getManager();
                $em->persist($comentario);
                $em->flush();

                $notificacion = new Notificaciones();
                $notificacion->setIdDestinatario($dest->getId());
                $notificacion->setIdEntidad($comentario->getId());
                $notificacion->setConcepto('Mensaje');
                $notificacion->setMensaje("Tiene un nuevo mensaje de " . $this->getUser()->getUsername());
                $notificacion->setIdOrigen($this->getUser()->getId());
                $notificacion->setEstado("No leido");
                $em->persist($notificacion);
                $em->flush();

                return $this->redirect($this->generateUrl('moduloclientes_cliente_mensajes_enviadosCliente'));
            } else {
                $form->get('destinatario')->addError(new FormError('Este destinatario no existe.'));
            }
        }
        $destino = $form->get('destinatario')->getData();
        return $this->render('moduloclientesclienteBundle:Mensajes:nuevoMensajeCliente.html.twig', array('form' => $form->createView(),
                    'destino' => $destino, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function responderMensajeClienteAction($id) {
        $comentario = new Comentarios();
        $destino = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios")->find($id)->getUsername();

        $asunto = null;
        $referer = $this->getRequest()->headers->get('referer');
        if ($referer && strpos($referer, 'mensaje')) {
            $idMensaje = explode('/', $referer)[7];
            $asunto = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Comentarios")->find($idMensaje)->getAsunto();
        }
        $form = $this->createMessageForm($id, $comentario);
        return $this->render('moduloclientesclienteBundle:Mensajes:nuevoMensajeCliente.html.twig', array('form' => $form->createView(),
                    'destino' => $destino, 'asunto' => 'RE: ' . $asunto,
                    'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function mensajesRecibidosClienteAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Comentarios");
        $mensajesRecibidos = $repository->getMensajesRecibidos($this->getUser()->getId());

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $mensajesRecibidos, $request->query->getInt('page', 1), 9);

        $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $remitentes = null;
        foreach ($mensajesRecibidos->getResult() as $clave => $mensaje) {
            $remitentes[$clave] = $repositoryUsuarios->find($mensaje->getIdRemitente())->getUsername();
        }

        return $this->render('moduloclientesclienteBundle:Mensajes:recibidosCliente.html.twig', array('pagination' => $pagination,
                    'remitentes' => $remitentes, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function mensajesEnviadosClienteAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Comentarios");
        $mensajesEnviados = $repository->getMensajesEnviados($this->getUser()->getId());

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $mensajesEnviados, $request->query->getInt('page', 1), 9);

        $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $destinatarios = null;
        foreach ($mensajesEnviados->getResult() as $clave => $mensaje) {
            $destinatarios[$clave] = $repositoryUsuarios->find($mensaje->getIdDestinatario())->getEmail();
        }

        return $this->render('moduloclientesclienteBundle:Mensajes:enviadosCliente.html.twig', array('pagination' => $pagination,
                    'destinatarios' => $destinatarios, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function mensajeClienteAction($id) {
        $this->changeStateNotification($id);
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Comentarios");
        $mensaje = $repository->find($id);
        $remitente = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios")->find($mensaje->getIdRemitente());
        if ($mensaje->getEstado() == "nuevo" && $mensaje->getIdDestinatario() == $this->getUser()->getId()) {
            $mensaje->setEstado("leido");
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->render('moduloclientesclienteBundle:Mensajes:mensajeCliente.html.twig', array('mensaje' => $mensaje,
                    'remitente' => $remitente, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function notificacionesClienteAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Notificaciones");
        $notificaciones = $repository->getNotificaciones($this->getUser()->getId());
        $notificacionesSinLeer = array();
        foreach ($notificaciones as $clave => $notificacion) {
            if ($notificacion->getEstado() == "No leido") {
                $notificacionesSinLeer[$clave] = $notificacion;
            }
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $notificacionesSinLeer, $request->query->getInt('page', 1), 9);
        return $this->render('moduloclientesclienteBundle:Mensajes:notificacionesCliente.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), 'pagination' => $pagination));
    }

    private function getNewNotification() {
        $repositoryN = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Notificaciones");
        $notificaciones = $repositoryN->getNotificaciones($this->getUser()->getId());
        $notificacionesSinLeer = array();
        foreach ($notificaciones as $clave => $notificacion) {
            if ($notificacion->getEstado() == "No leido") {
                $notificacionesSinLeer[$clave] = $notificacion;
            }
        }
        return $notificacionesSinLeer;
    }

    private function changeStateNotification($idEntidad) {
        $repositoryN = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Notificaciones");
        if ($repositoryN->getNotificacionEntidad($idEntidad, $this->getUser()->getId())) {
            $repositoryN->getNotificacionEntidad($idEntidad, $this->getUser()->getId())[0]->setEstado("Leido");
            $this->getDoctrine()->getManager()->flush();
        }
    }

}
