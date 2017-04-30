<?php

namespace Crivero\PruebaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PartidosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartidosRepository extends EntityRepository
{
    public function getPartidosPorCompeticion($id) {
        return $this->getEntityManager()
                        ->createQuery('SELECT p FROM CriveroPruebaBundle:Partidos p WHERE p.idCompeticion= :id')
                        ->setParameter('id', $id)
                        ->getResult();
    }
}
