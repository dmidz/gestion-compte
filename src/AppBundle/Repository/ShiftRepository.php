<?php

namespace AppBundle\Repository;

/**
 * ShiftRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ShiftRepository extends \Doctrine\ORM\EntityRepository
{

    public function findFutures()
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->where('s.start > :now')
            ->setParameter('now', new \Datetime('now'))
            ->orderBy('s.start', 'ASC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}