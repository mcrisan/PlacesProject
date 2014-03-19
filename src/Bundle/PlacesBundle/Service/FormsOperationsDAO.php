<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Description of FormsOperationsDAO
 *
 * @author mcrisan
 */
class FormsOperationsDAO {

    protected $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function getPlacesNames($input) {

        return $this->em->getRepository('BundlePlacesBundle:PlaceDetails')
                    ->getPlacesNames($input);
    }

}
