<?php

namespace Crivero\PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartidoController extends Controller {

    public function partidosAction() {
        $repositoryPartidos = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Partidos");
        $partidos=$repositoryPartidos->findAll();
        $repositoryCompeticiones = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Competiciones");
        $repositoryEquipos = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Equipos");
        $repositoryCanchas = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Canchas");

        foreach ($partidos as $partido=>$valor){
            $competiciones[$partido] = $repositoryCompeticiones->find($valor->getIdCompeticion());   
            $equiposLocales[$partido] = $repositoryEquipos->find($valor->getIdEquipoLocal());
            $equiposVisitantes[$partido] = $repositoryEquipos->find($valor->getIdEquipoVisitante());
            $canchas[$partido] = $repositoryCanchas->find($valor->getIdCancha());   
        }     
        return $this->render('CriveroPruebaBundle:Competiciones:partidos.html.twig', array("partidos"=>$partidos, "competiciones"=>$competiciones,
                             "equiposLocales"=>$equiposLocales,"equiposVisitantes"=>$equiposVisitantes, "canchas"=>$canchas));
    }

    public function partidoAction($id) {
        $repositoryPartido = $this->getDoctrine()->getRepository("CriveroPruebaBundle:Partidos");
        $partido=$repositoryPartido->find($id);
        return $this->render('CriveroPruebaBundle:Competiciones:partido.html.twig', array("partido"=>$partido));
    }
}