<?php

namespace Crivero\PruebaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * JugadoresRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JugadoresRepository extends EntityRepository
{
     public function findJugadoresEquipo($idEquipo)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT jugadores FROM CriveroPruebaBundle:Jugadores jugadores
                           WHERE  jugadores.idEquipo = :idEquipo')
            ->setParameter('idEquipo', $idEquipo)
            ->getResult();
    }
    
    public function searchJugadores($searchQuery) {
        return $this->getEntityManager()
            ->createQuery("SELECT jugadores FROM CriveroPruebaBundle:Jugadores jugadores"
                    . " WHERE jugadores.nombre= :nombre"
                    . " OR jugadores.dorsal = :dorsal")
            ->setParameter('nombre', $searchQuery)
            ->setParameter('dorsal', $searchQuery)
            ->getResult();
    }
    
    public function searchJugadoresEquipo($searchQuery,$id) {
        return $this->getEntityManager()
            ->createQuery("SELECT jugadores FROM CriveroPruebaBundle:Jugadores jugadores"
                    . " WHERE jugadores.idEquipo= :id"
                    . " AND (jugadores.nombre = :nombre"
                    . " OR jugadores.dorsal = :dorsal)")
            ->setParameter('id', $id)
            ->setParameter('nombre', $searchQuery)
            ->setParameter('dorsal', $searchQuery)
            ->getResult();
    }
}
