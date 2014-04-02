<?php

namespace Bundle\PlacesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacePhotos
 */
class PlaceEvents
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $description;


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
    public function setImage($placeId)
    {
        $this->placeId = $placeId;
    
        return $this;
    }

    /**
     * Get placeId
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->placeId;
    }



    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return title
     */
    public function setTitle($title)
    {
        $this->imgUrl = $imgUrl;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set origin
     *
     * @param string $description
     * @return description
     */
    public function setDescription($description)
    {
        $this->origin = $description;
    
        return $this;
    }


}