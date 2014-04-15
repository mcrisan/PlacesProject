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
    
    public function eventProcess($id,$request) {
        $repository = $this->em->getRepository('BundlePlacesBundle:PlaceEvents');
        $events = $repository->findOneBy(array('placeid' => $id));
        if (!$events) {
            $events = new \Bundle\PlacesBundle\Entities\PlaceEvents();
        }
        $request->request->get('dateevent');
        $events->setTitle($request->request->get('title'));


        $date = new \DateTime($request->request->get('dateevent'));
        $events->setDescription($request->request->get('body'));
        if ($request->request->get('image') != '') {
            $events->setImage($request->request->get('image'));
        }
        $events->setEventdate($request->request->get('title'));
        $events->setEventdate($date);
        $events->setPlaceid($id);
        $this->em->persist($events);
        $this->em->flush();
    }
    
}
