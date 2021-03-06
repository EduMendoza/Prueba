<?php

namespace modulomonitores\monitoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ParticipantesController extends Controller {

    public function listadoParticipantesAction(Request $request) {
        $repositoryU = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $usuarios = $repositoryU->findAll();
        $clientes=array();
        foreach ($usuarios as $clave => $usuario) {
            if ($usuario->getTipo() == 2)
                $clientes[$clave] = $usuario;
        }
        $repositoryS = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesiones = $repositoryS->findAll();
        $contador = 0;
        $clienteConMonitor = array();
        foreach ($clientes as $cliente) {
            foreach ($sesiones as $sesion) {
                if (strpos($sesion->getIdsClientes(), strval($cliente->getId())) !== false &&
                        $sesion->getIdMonitor() == $this->getUser()->getId()) {
                    $clienteConMonitor[$contador] = $cliente;
                    $contador++;
                    break;
                }
            }
        }
        $flag = false;
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $clienteConMonitor, $request->query->getInt('page', 1), 5);
        return $this->render('modulomonitoresmonitoresBundle:Participantes:participantes.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), "flag" => $flag,  "pagination" => $pagination));
    }
    
    public function participanteListadoAction($id) {
        $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $cliente = $repositoryUsuarios->find($id);
        $idsSesionesCliente = explode('&', $cliente->getSesiones());
        $repositorySesiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesionesCliente = $this->getArrayEntidades($repositorySesiones, $idsSesionesCliente, $this->getUser()->getId());

        return $this->render('modulomonitoresmonitoresBundle:Participantes:participanteListado.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), "cliente" => $cliente, "sesiones" => $sesionesCliente));
    }

    public function verParticipantesAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $this->findEntity($id, $em, 'CriveroPruebaBundle:Sesiones');
        $arrayClientes = explode('&', $sesion->getIdsClientes());
        $repositoryu = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        for ($i = 0; $i < count($arrayClientes); $i++) {
            $clientes[$i] = $repositoryu->find($arrayClientes[$i]);
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $clientes, $request->query->getInt('page', 1), 5);
        $flag = true;
        return $this->render('modulomonitoresmonitoresBundle:Participantes:participantes.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), "idSesion" => $id, "flag" => $flag, "pagination" => $pagination));
    }

    public function participanteAction($id, $idUsuario) {
        $this->changeStateNotification($id, $idUsuario);
        $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $cliente = $repositoryUsuarios->find($idUsuario);
        $idsSesionesCliente = explode('&', $cliente->getSesiones());
        $repositorySesiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesionesCliente = $this->getArrayEntidades($repositorySesiones, $idsSesionesCliente, $this->getUser()->getId());

        return $this->render('modulomonitoresmonitoresBundle:Participantes:participante.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), "cliente" => $cliente, "sesiones" => $sesionesCliente, "id" => $id, "idUsuario" => $idUsuario));
    }

    public function participantePrivadoAction($id) {
        $this->changeStateNotificationPrivado($id);
        $em = $this->getDoctrine()->getManager();
        $sesion = $this->findEntity($id, $em, 'CriveroPruebaBundle:Sesiones');
        $idUsuario = $sesion->getIdsClientes();
        $repositoryu = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $cliente = $repositoryu->find($idUsuario);
        $idsSesionesCliente = explode('&', $cliente->getSesiones());
        $repositorySesiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesionesCliente = $this->getArrayEntidades($repositorySesiones, $idsSesionesCliente, $this->getUser()->getId());

        return $this->render('modulomonitoresmonitoresBundle:Participantes:participantePrivado.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(), "sesiones" => $sesionesCliente, "idSesion" => $id, "cliente" => $cliente));
    }

    private function getArrayEntidades($repository, $array, $idMonitor) {
        for ($i = 0; $i < count($array); $i++) {
            if ($repository->find($array[$i])->getIdMonitor() == $idMonitor)
                $resultado[$i] = $repository->find($array[$i]);
        }
        return $resultado;
    }

    private function findEntity($id, $em, $repository) {
        $entity = $em->getRepository($repository)->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Entidad no encontrada');
        }
        return $entity;
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

    private function changeStateNotification($id, $idUsuario) {
        $repositoryN = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Notificaciones");
        if ($repositoryN->getNotificacionEntidadParticipantes($id, $idUsuario, $this->getUser()->getId())) {
            $repositoryN->getNotificacionEntidadParticipantes($id, $idUsuario, $this->getUser()->getId())[0]->setEstado("Leido");
            $this->getDoctrine()->getManager()->flush();
        }
    }

    private function changeStateNotificationPrivado($id) {
        $repositoryN = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Notificaciones");
        if ($repositoryN->getNotificacionEntidad($id, $this->getUser()->getId())) {
            $repositoryN->getNotificacionEntidad($id, $this->getUser()->getId())[0]->setEstado("Leido");
            $this->getDoctrine()->getManager()->flush();
        }
    }

}
