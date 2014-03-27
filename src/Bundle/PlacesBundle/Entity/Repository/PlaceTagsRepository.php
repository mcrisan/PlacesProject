<?php

namespace Bundle\PlacesBundle\Entity\Repository;

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
    
    public function getTagName($placeid){
        //echo "234";
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder()
                ->select('pt.placeId, t.tag')
                ->from('BundlePlacesBundle:PlaceTags', 'pt')
                ->innerJoin('BundlePlacesBundle:Tags', 't', 'WITH', 'pt.tagId = t.id')
                ->where('pt.placeId= :id')
                ->setParameter('id', $placeid)
                ->getQuery()
                ->getResult();
        
        return $qb;
    }
    
    // Delete places from place_tags
    public function deletePlaces($id){
        
        $em = $this->getEntityManager();

        $query = $em
        ->createQuery("
                DELETE 
                FROM Bundle\PlacesBundle\Entity\PlaceTags pt
                WHERE pt.placeId = :id
            ")
        ->setParameter('id',$id);

        return $query;
    }
}
