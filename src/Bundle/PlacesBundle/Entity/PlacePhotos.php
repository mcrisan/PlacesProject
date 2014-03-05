<?php

namespace Bundle\PlacesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacePhotos
 */
class PlacePhotos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $placeId;

    /**
     * @var string
     */
    private $imgRef;

    /**
     * @var string
     */
    private $imgUrl;

    /**
     * @var string
     */
    private $origin;


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
     * @param string $placeId
     * @return PlacePhotos
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    
        return $this;
    }

    /**
     * Get placeId
     *
     * @return string 
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * Set imgRef
     *
     * @param string $imgRef
     * @return PlacePhotos
     */
    public function setImgRef($imgRef)
    {
        $this->imgRef = $imgRef;
    
        return $this;
    }

    /**
     * Get imgRef
     *
     * @return string 
     */
    public function getImgRef()
    {
        return $this->imgRef;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return PlacePhotos
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    
        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string 
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set origin
     *
     * @param string $origin
     * @return PlacePhotos
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    
        return $this;
    }

    /**
     * Get origin
     *
     * @return string 
     */
    public function getOrigin()
    {
        return $this->origin;
    }
}