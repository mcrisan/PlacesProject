<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceCategories
 */
class PlaceCategories {
    
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
    private $categoryId;

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
     * @return PlaceCategories
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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return PlaceCategories
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    
        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}