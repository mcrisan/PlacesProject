<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bundle\PlacesBundle\Service;

use Bundle\PlacesBundle\Command\InsertPlacesCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Bundle\PlacesBundle\Command\InsertAllDetailsCommand;
use Bundle\PlacesBundle\Service\PlaceOperations;
use Bundle\PlacesBundle\Entity\Places;

/**
 * Description of FormsService
 *
 * @author mcrisan
 */
class FormsOperations {

    private $container;
    private $formDao;
    private $alldet;
    private $placeop;
    private $opDAO;
    private $insertPlaces;

    public function __construct(FormsOperationsDAO $dao, ContainerInterface $container, InsertAllDetailsCommand $alldet, PlaceOperations $placeop, PlaceOperationsDAO $opdao, InsertPlacesCommand $insPlace) {
        $this->container = $container;
        $this->formDao = $dao;
        $this->alldet = $alldet;
        $this->placeop = $placeop;
        $this->opDAO = $opdao;
        $this->insertPlaces = $insPlace;
    }

    public function getPlacesNames($input) {

        return $this->formDao->getPlacesNames($input);
    }

    public function getAllPlacesNames() {

        return $this->formDao->getAllPlacesNames();
    }


}
