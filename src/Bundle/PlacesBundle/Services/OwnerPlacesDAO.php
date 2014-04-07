<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OwnerPlaces
 *
 * @author vtapu
 */
namespace Bundle\PlacesBundle\Services;
use Doctrine\ORM\EntityManager;

class OwnerPlacesDAO {
    
    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function getPlaceForUser($ownerid) {
       $placeOwner = $this->em->createQueryBuilder()
                    ->select('pd.placeName')
                    ->from('BundlePlacesBundle:PlaceDetails', 'pd')
                    ->innerJoin('BundlePlacesBundle:Places', 'p', 'WITH', 'p.id = pd.placeId')
                    ->where('p.hasOwner = :ownerid')
                    ->setParameter('ownerid', $ownerid)
                    ->getQuery()
                    ->getResult();
       return $placeOwner;
    }
    
}
