<?php

namespace Bundle\PlacesBundle\Entities\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{
    public function getCommentsForPlace($placeId, $approved = true) {
        $qb = $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.place = :placeId')
                ->addOrderBy('p.created','DESC')
                ->setParameter('placeId', $placeId);

        if (false === is_null($approved))
            $qb->andWhere('p.approved = :approved')
                    ->setParameter('approved', $approved);

        return $qb->getQuery()
                        ->getResult();
    }
}