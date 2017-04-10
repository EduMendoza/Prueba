<?php

namespace Crivero\PruebaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * HorariosCanchasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HorariosCanchasRepository extends EntityRepository {

    public function getHorario($cancha, $dia) {
        return $this->getEntityManager()
                        ->createQuery('SELECT h.periodo FROM CriveroPruebaBundle:HorariosCanchas h WHERE h.cancha = :canchaId AND h.fechaInicio = :dia')
                        ->setParameter('canchaId', $cancha)
                        ->setParameter('dia', $dia)
                        ->getResult();
    }

    public function getInstancia($cancha, $dia) {
        return $this->getEntityManager()
                        ->createQuery('SELECT h FROM CriveroPruebaBundle:HorariosCanchas h WHERE h.cancha = :canchaId AND h.fechaInicio = :dia')
                        ->setParameter('canchaId', $cancha)
                        ->setParameter('dia', $dia)
                        ->getResult();
    }

}
