<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Entities\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * Description of PlaceCategoriesRepository
 *
 * @author mcrisan
 */
class PlaceEventsRepository extends EntityRepository{
    //put your code here
    
    public function findEvents() {
        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder()
                ->select('events.placeid,events.id, events.title, events.description, events.eventdate, events.image')
                ->from('BundlePlacesBundle:PlaceEvents', 'events')
                ->getQuery()
                ->getResult();
        return $qb;
    }
}
