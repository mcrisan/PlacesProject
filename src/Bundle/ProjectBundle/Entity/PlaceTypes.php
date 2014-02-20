<?php

namespace Bundle\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceTypes
 */
class PlaceTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $placeId;

    /**
     * @var integer
     */
    private $typeId;

    /**
     * @var string
     */
    private $main;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set placeId
     *
     * @param integer $placeId
     * @return PlaceTypes
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    
        return $this;
    }

    /**
     * Get placeId
     *
     * @return integer 
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return PlaceTypes
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    
        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set main
     *
     * @param string $main
     * @return PlaceTypes
     */
    public function setMain($main)
    {
        $this->main = $main;
    
        return $this;
    }

    /**
     * Get main
     *
     * @return string 
     */
    public function getMain()
    {
        return $this->main;
    }
}