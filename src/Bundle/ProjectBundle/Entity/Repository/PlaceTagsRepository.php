<?php

namespace Bundle\ProjectBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PlaceTagsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlaceTagsRepository extends EntityRepository
{
    // out of date
    public function idTagCombination($id, $idTag){
        $qb = $this->createQueryBuilder('tag')
                ->select('tag.id')
                ->where('tag.placeId = :id')
                ->andWhere('tag.tagId = :idTag')
                ->setParameter('id', $id)
                ->setParameter('idTag', $idTag)
                ->getQuery()
                ->getResult();
        
        if (count($qb)>=1) {
            return true;
        } else {
            return false;
        }
        
    }
    
    // is place in place_tags tb
    public function isPlaceInserted($id){
        $qb = $this->createQueryBuilder('tag')
                ->select('tag.id')
                ->where('tag.placeId = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult();
        
        if (count($qb)>=1) {
            return true;
        } else {
            return false;
        }
    }
    
    // Delete places from place_tags
    public function deletePlaces($id){
        
        $em = $this->getEntityManager();

        $query = $em
        ->createQuery("
                DELETE 
                FROM Bundle\ProjectBundle\Entity\PlaceTags pt
                WHERE pt.placeId = :id
            ")
        ->setParameter('id',$id);

        return $query;
    }
}
