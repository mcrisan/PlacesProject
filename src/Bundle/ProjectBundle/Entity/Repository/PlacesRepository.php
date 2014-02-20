<?php

namespace Bundle\ProjectBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PlacesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlacesRepository extends EntityRepository
{
    // Get place by id
    public function getPlacesById($id) {
        $qb = $this->createQueryBuilder('place')
                ->select('place')
                ->where('place.id = :id')
                ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
    
    // Get places details ref
    public function getPlacesDetailsRef(){
        $qb = $this->createQueryBuilder('places')
                ->select('places.id,places.detailsRef','places.slug')
                ->getQuery()
                ->getResult();
        return $qb;
    }
    
    // Get current id
    public function checkCurrentExtId($extId){
        $qb = $this->createQueryBuilder('place')
                ->select('place.extId')
                ->where('place.extId = :extId')
                ->setParameter('extId', $extId)
                ->getQuery()
                ->getResult();
        $rows = count($qb);
        
        if($rows == 1){
            return true;
        }else{
            return false;
        }
    }
    
    // Update table 
    public function updatePlace($id,$slug,$detailsRef) {
        $qb = $this->createQueryBuilder('')
                ->update('Bundle\ProjectBundle\Entity\Places', 'place')
                ->set('place.slug', ':slug')
                ->set('place.detailsRef', ':ref')
                ->where('place.extId = :id')
                ->setParameter('id', $id)
                ->setParameter('slug', $slug)
                ->setParameter('ref', $detailsRef);

        return $qb->getQuery();
    }
    
    // Check current slug gen. to db table slug
    public function checkCurrentSlug($slug){
        $qb = $this->createQueryBuilder('place')
                ->select('place.slug')
                ->where('place.slug = :slug')
                ->setParameter('slug', $slug)
                ->getQuery()
                ->getResult();
        $rows = count($qb);
        
        if($rows >= 1){
            return true;
        }else{
            return false;
        }
    }
    
    // get all names (slug)
    function getAllNames(){
        $qb = $this->createQueryBuilder('place')
                ->select('place.slug')
                ->getQuery()
                ->getResult();
        return $qb;
                
    }
    
    // get last slug-n for current slug
    function getLastSlug($slug){
        $qb = $this->createQueryBuilder('place')
                ->select('place.slug')
                ->where('place.slug LIKE :slug')
                ->setParameter('slug', $slug.'%')
                ->orderBy('place.slug', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getResult();
        
        if (count($qb) == 1) {
            return $qb;
        } else {
            return false;
        }
    }
}
