<?php
/**
 * @return Job[]|ArrayCollection
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{

    /**
     * @return Category[]
     */
    public function findWithActiveJobs()
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->innerJoin('c.jobs', 'j')
            ->where('j.expiresAt > :date')
            ->setParameter('date', new \DateTime())
            ->getQuery()
            ->getResult();
    }
}
