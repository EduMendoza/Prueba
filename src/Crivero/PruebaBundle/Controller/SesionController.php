<?php

namespace Crivero\PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crivero\PruebaBundle\Entity\Sesiones;
use Crivero\PruebaBundle\Entity\Notificaciones;
use Crivero\PruebaBundle\Form\SesionesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

class SesionController extends Controller {

    public function sesionesAction(Request $request) {
        $this->changeStateNotification($request->get('id'));
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        
        $searchQuery = $request->get('query');
        (!empty($searchQuery)) ? $sesiones = $repository->searchSesionesGeneralesByAdmin($searchQuery):
                                 $sesiones = $repository->getSesionesGenerales();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $sesiones, $request->query->getInt('page', 1), 5);
        return $this->render('CriveroPruebaBundle:Sesiones:sesiones.html.twig', array("pagination" => $pagination,
                    'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function sesionesClienteAction($id, Request $request) {
        $repositoryUsuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios");
        $cliente = $repositoryUsuarios->find($id);

        $idsSesionesCliente = explode('&', $cliente->getSesiones());
        $repositorySesiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesiones = $this->getArrayEntidades($repositorySesiones, $idsSesionesCliente);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($sesiones, $request->query->getInt('page', 1), 7);

        return $this->render('CriveroPruebaBundle:Sesiones:sesionesCliente.html.twig', array("pagination" => $pagination,
                    'username' => $cliente->getUsername(), 'cId' => $id,
                    'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function sesionesMonitorAction($id, Request $request) {
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesiones = $repository->getSesionesMonitor($id);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($sesiones, $request->query->getInt('page', 1), 7);

        return $this->render('CriveroPruebaBundle:Sesiones:sesionesMonitor.html.twig', array("pagination" => $pagination,
                    'username' => $sesiones[0]->getMonitor(), 'mId' => $id,
                    'notificacionesSinLeer' => $this->getNewNotification()));
    }
    
    public function horariosSesionAction($id, Request $request) {
        $repositorySesiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesion = $repositorySesiones->find($id);
        $horarios = explode("&", $sesion->getHorario());

//        $paginator = $this->get('knp_paginator');
//        $pagination = $paginator->paginate($horarios, $request->query->getInt('page', 1), 8);

        $aula = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Aulas")->find($sesion->getAula())->getNombre();

        return $this->render('CriveroPruebaBundle:Sesiones:horariosSesion.html.twig', array("sesion" => $sesion,
                    "pagination" => $horarios, 'aula' => $aula, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function dedicadasAction(Request $request) {
        $this->changeStateNotification($request->get('id'));
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        
        $searchQuery = $request->get('query');
        (!empty($searchQuery)) ? $sesiones = $repository->searchSesionesDedicadasByAdmin($searchQuery):
                                 $sesiones = $repository->getSesionesDedicadas();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $sesiones, $request->query->getInt('page', 1), 5);
        return $this->render('CriveroPruebaBundle:Sesiones:sesionesDedicadas.html.twig', array("pagination" => $pagination,
                    'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function sesionAction($id) {
        $this->changeStateNotification($id);
        $repository = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Sesiones");
        $sesion = $repository->find($id);

        $repositoryAula = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Aulas");
        $aula = $repositoryAula->find($sesion->getAula());
        return $this->render('CriveroPruebaBundle:Sesiones:sesion.html.twig', array('notificacionesSinLeer' => $this->getNewNotification(),
                    "sesion" => $sesion, "aula" => $aula, 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function aceptarSesionAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $this->findEntity($id, $em, 'CriveroPruebaBundle:Sesiones');
        $sesion->setEstado("validada");
        $sesion->setEstadoCliente("disponible");

        $aula = $this->findEntity($sesion->getAula(), $em, 'CriveroPruebaBundle:Aulas');
        ($aula->getSesiones() == null) ? $aula->setSesiones($sesion->getId()) :
                        $aula->setSesiones($aula->getSesiones() . "&" . $sesion->getId());

        $hoy = (int) date_format($sesion->getFechaInicio(), 'd');
        $mes = date_format($sesion->getFechaInicio(), 'm');
        $limite = date_format($sesion->getFechaInicio(), 't');
        $duracion = $sesion->getNSesiones();
        //$this->actualizarValores($hoy, $mes, $limite);

        $repositoryHorarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:HorariosAulas");

        $vuelta = 0;
        $diasSelect = explode('&', $sesion->getDias());
        for ($i = $hoy; $i <= $limite; $i++) {
            print_r($i);
            $flagDiaSemana = false;
            if (!$this->isWeekend($i, $mes, $vuelta)) {
                foreach ($diasSelect as $dia) {
                    if (date('l', strtotime($i . '-' . $mes . '-' . date('Y'))) == $dia) {
                        $flagDiaSemana = true;
                        break;
                    }
                }
                if (!$flagDiaSemana) {
                    if ($i >= $limite) {
                        // $this->updateMonth($i, $mes, $vuelta, $limite);
                        $i = 0;
                        if ($mes == 12) {
                            $mes = 0;
                            $vuelta = 1;
                        }
                        $mes++;
                        if ($mes < 10)
                            $mes = '0' . $mes;
                        $fecha = '01' . '-' . $mes . '-' . date('Y') + $vuelta;
                        $limite = (int) (date('t', strtotime($fecha)));
                    }
                    continue;
                }
                $diaReserva = $repositoryHorarios->getDiaReserva($sesion->getAula(), $i);
                if ($diaReserva[0]->getPeriodo() != null) {
                    $fechaReserva = $this->findFechaReserva($diaReserva[0], $mes);
                    ($sesion->getHorario() == null) ? $horarioCompleto = $fechaReserva :
                                    $horarioCompleto = $sesion->getHorario() . "&" . $fechaReserva;
                    $sesion->setHorario($horarioCompleto);
                    $em->persist($diaReserva[0]);
                    $duracion--;
                    if ($duracion == 0)
                        break;
                }
            }
            if ($i >= $limite) {
                // $this->updateMonth($i, $mes, $vuelta, $limite);
                $i = 0;
                if ($mes == 12) {
                    $mes = 0;
                    $vuelta = 1;
                }
                $mes++;
                if ($mes < 10)
                    $mes = '0' . $mes;
                $fecha = '01' . '-' . $mes . '-' . date('Y') + $vuelta;
                $limite = (int) (date('t', strtotime($fecha)));
            }
        }

        $em->persist($sesion);
        $em->persist($aula);
        $em->flush();

        $usuarios = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Usuarios")->findAll();
        foreach ($usuarios as $usuario) {
            if ($usuario->getTipo() == 1) {
                continue;
            }
            $notificacion = new Notificaciones();
            $notificacion->setIdDestinatario($usuario->getId());
            $notificacion->setIdEntidad($sesion->getId());
            if ($usuario->getId() == $sesion->getIdMonitor()) {
                $notificacion->setMensaje("Tu sesion " . $sesion->getNombre() . " ha"
                        . " sido aceptada");
            } else {
                $notificacion->setMensaje("Una nueva sesion ha sido creada");
            }
            $notificacion->setIdOrigen($this->getUser()->getId());
            $notificacion->setEstado("No leido");
            ($sesion->getCliente() == "normal") ? $notificacion->setConcepto("Publica") :
                            $notificacion->setConcepto("Privada");
            $em->persist($notificacion);
            $em->flush();
        }

        $request->getSession()->getFlashBag()->add('mensaje', 'La sesión ha sido aceptada con éxito');
        return $this->redirect($this->generateUrl('crivero_prueba_sesion', array('id' => $sesion->getId(),
                            'notificacionesSinLeer' => $this->getNewNotification())));
    }

    private function updateMonth($i, $mes, $vuelta, $limite) {
        $i = 0;
        if ($mes == 12) {
            $mes = 0;
            $vuelta = 1;
        }
        $mes++;
        $fecha = date('Y') + $vuelta . '-' . $mes . '-01';
        $limite = date('t', strtotime($fecha));
    }

    public function cancelarSesionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);

        if (!$sesion) {
            throw $this->createNotFoundException("No encontrado");
        }
        $form = $this->createCancelForm($sesion);
        return $this->render('CriveroPruebaBundle:Sesiones:cancelarSesion.html.twig', array('sesion' => $sesion,
                    'form' => $form->createView(), 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    private function createCancelForm(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(array()), $entity, array(
            'action' => $this->generateUrl('crivero_prueba_cancelar', array('id' => $entity->getId())),
            'method' => 'PUT'
        ));
        return $form;
    }

    public function cancelarAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $this->findEntity($id, $em, 'CriveroPruebaBundle:Sesiones');
        $aula = $this->findEntity($sesion->getAula(), $em, 'CriveroPruebaBundle:Aulas');

        $form = $this->createCancelForm($sesion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $observaciones = $form->get('observaciones')->getData();

            if ($observaciones != null) {
                $sesion->setEstado("cancelada");
                $sesion->setEstadoCliente("cancelada");
                $em->persist($sesion);

                $horarios = explode('&', $sesion->getHorario());
                foreach ($horarios as $clave => $horario) {
                    if ($horario{1} == '/') {
                        $horario = "0" . $horario;
                    }
                    $dias[$clave] = substr($horario, 0, 2);
                    $horas[$clave] = substr($horario, 8);
                }

                $horariosAula = $this->getDoctrine()->getRepository("CriveroPruebaBundle:HorariosAulas");
                for ($i = 0; $i < count($dias); $i++) {
                    $diaReserva = $horariosAula->getDiaReserva($sesion->getAula(), (int) $dias[$i]);
                    $horarioNoAsig = $diaReserva[0]->getPeriodo();
                    if (strpos($horarioNoAsig, $horas[$i]) === false) {
                        $diaReserva[0]->setPeriodo($horarioNoAsig . $horas[$i] . '&');
                        $em->persist($diaReserva[0]);
                    }
                }

                $this->removeSesionId($aula, $id);
                $em->persist($aula);
                $em->flush();

                $idsUsuarios = explode('&', $sesion->getIdsClientes() . '&' . $sesion->getIdMonitor());
                foreach ($idsUsuarios as $idUsuario) {
                    if ($idUsuario == 0)
                        continue;
                    $notificacion = new Notificaciones();
                    $notificacion->setIdDestinatario($idUsuario);
                    $notificacion->setIdEntidad($sesion->getId());
                    if ($idUsuario == $sesion->getIdMonitor()) {
                        $notificacion->setMensaje("Tu sesion " . $sesion->getNombre() . " ha sido cancelada");
                    } else {
                        $notificacion->setMensaje("La sesion " . $sesion->getNombre() . " del monitor " .
                                $sesion->getMonitor() . " ha sido cancelada");
                    }
                    $notificacion->setIdOrigen($this->getUser()->getId());
                    $notificacion->setEstado("No leido");
                    ($sesion->getCliente() == "normal") ? $notificacion->setConcepto("Publica") :
                                    $notificacion->setConcepto("Privada");
                    $em->persist($notificacion);
                    $em->flush();
                }


                $request->getSession()->getFlashBag()->add('mensaje', 'La sesión se canceló correctamente');
                return $this->redirect($this->generateUrl('crivero_prueba_sesion', array('id' => $sesion->getId())));
            } else {
                $form->get('observaciones')->addError(new FormError('Rellene el campo.'));
            }
        }
        return $this->render('CriveroPruebaBundle:Sesiones:cancelarSesion.html.twig', array('sesion' => $sesion,
                    'form' => $form->createView(), 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    public function rechazarSesionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);

        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createRechForm($sesion);
        return $this->render('CriveroPruebaBundle:Sesiones:rechazarSesion.html.twig', array('sesion' => $sesion,
                    'form' => $form->createView(), 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    private function createRechForm(Sesiones $entity) {
        $form = $this->createForm(new SesionesType(array()), $entity, array(
            'action' => $this->generateUrl('crivero_prueba_rechazar', array('id' => $entity->getId())),
            'method' => 'PUT'
        ));
        return $form;
    }

    public function rechazarAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sesion = $em->getRepository('CriveroPruebaBundle:Sesiones')->find($id);
        if (!$sesion) {
            throw $this->createNotFoundException("no encontrado");
        }
        $form = $this->createRechForm($sesion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sesion->setEstado("rechazada");
            $sesion->setEstadoCliente("no disponible");
            $observaciones = $form->get('observaciones')->getData();
            if ($observaciones != null) {
                $em->flush();

                $notificacion = new Notificaciones();
                $notificacion->setIdDestinatario($sesion->getIdMonitor());
                $notificacion->setIdEntidad($sesion->getId());
                $notificacion->setMensaje("Tu sesion " . $sesion->getNombre() . " ha sido rechazada");
                $notificacion->setIdOrigen($this->getUser()->getId());
                $notificacion->setEstado("No leido");
                ($sesion->getCliente() == "normal") ? $notificacion->setConcepto("Publica") :
                                $notificacion->setConcepto("Privada");
                $em->persist($notificacion);
                $em->flush();

                $request->getSession()->getFlashBag()->add('mensaje', 'La sesión se rechazó correctamente.');
                return $this->redirect($this->generateUrl('crivero_prueba_sesion', array('id' => $sesion->getId())));
            } else {
                $form->get('observaciones')->addError(new FormError('Rellene el campo gracias'));
            }
        }
        return $this->render('CriveroPruebaBundle:Sesiones:rechazarSesion.html.twig', array('sesion' => $sesion,
                    'form' => $form->createView(), 'notificacionesSinLeer' => $this->getNewNotification()));
    }

    private function findEntity($id, $em, $repository) {
        $entity = $em->getRepository($repository)->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Entidad no encontrada');
        }
        return $entity;
    }

    private function getArrayEntidades($repository, $array) {
        for ($i = 0; $i < count($array); $i++) {
            $resultado[$i] = $repository->find($array[$i]);
        }
        return $resultado;
    }

    private function removeSesionId($entity, $id) {
        $pos = strpos($entity->getSesiones(), strval($id));
        $cifra = strlen(strval($id));
        ($pos > 0) ? $entity->setSesiones(substr($entity->getSesiones(), 0, $pos - 1) . substr($entity->getSesiones(), $pos + $cifra)) :
                        $entity->setSesiones(substr($entity->getSesiones(), $pos + ($cifra + 1)));
    }

    private function actualizarValores($hoy, $mes, $limite) {
        if ($hoy > 28 && $limite == 30) {
            $mes++;
            $hoy = 1;
        } elseif ($hoy > 29 && $limite == 31) {
            $mes++;
            if ($mes == 13) {
                $mes = 1;
            }
            $hoy = 1;
        } elseif ($hoy > 26 && $mes == 02) {
            $mes++;
            $hoy = 1;
        }
    }

    private function findFechaReserva($diaReserva, $mes) {
        $pos = strpos($diaReserva->getPeriodo(), "&");
        $horaReserva = substr($diaReserva->getPeriodo(), 0, $pos);
        $diaReserva->setPeriodo(substr($diaReserva->getPeriodo(), $pos + 1));
        $fechaReserva = $diaReserva->getFechaInicio() . "/" . $mes . " : " . $horaReserva;
        return $fechaReserva;
    }

    private function isWeekend($dia, $mes, $cambio) {
        $fecha = $dia . '-' . $mes . '-' . date('Y') + $cambio;
        $diaS = date('w', strtotime($fecha));
        return ($diaS == 0 || $diaS == 6 );
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
