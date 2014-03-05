<?php

namespace Bundle\PlacesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceTags
 */
class PlaceTags
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
    private $tagId;

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
     * @return PlaceTags
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
     * Set tagId
     *
     * @param integer $tagId
     * @return PlaceTags
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;
    
        return $this;
    }

    /**
     * Get tagId
     *
     * @return integer 
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Set main
     *
     * @param string $main
     * @return PlaceTags
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