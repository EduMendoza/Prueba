<?php

namespace Crivero\PruebaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * HorariosAulasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HorariosAulasRepository extends EntityRepository {

    public function getDiaReserva($aula, $dia) {
        return $this->getEntityManager()
                        ->createQuery('SELECT h FROM CriveroPruebaBundle:HorariosAulas h WHERE h.aula = :aulaId AND h.fechaInicio = :dia')
                        ->setParameter('aulaId', $aula)
                        ->setParameter('dia', $dia)
                        ->getResult();
    }

    public function getEstadosAulas($dia) {
        return $this->getEntityManager()
                        ->createQuery('SELECT h.estado FROM CriveroPruebaBundle:HorariosAulas h WHERE h.fechaInicio = :dia')
                        ->setParameter('dia', $dia)
                        ->getResult();
    }

    public function removeHorariosAula($aula) {
        $this->getEntityManager()
                ->createQuery('DELETE FROM CriveroPruebaBundle:HorariosAulas h WHERE h.aula = :aulaId')
                ->setParameter('aulaId', $aula)
                ->execute();
    }

}
