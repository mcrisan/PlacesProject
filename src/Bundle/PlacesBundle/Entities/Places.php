<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Places
 */
class Places
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $extId;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $detailsRef;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var integer
     */
    private $hasOwner;
    
    /**
     * @var \Bundle\PlacesBundle\Entities\PlaceDetails
     */
    private $placeDetails;


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
     * Set extId
     *
     * @param string $extId
     * @return Places
     */
    public function setExtId($extId)
    {
        $this->extId = $extId;
    
        return $this;
    }

    /**
     * Get extId
     *
     * @return string 
     */
    public function getExtId()
    {
        return $this->extId;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Places
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set detailsRef
     *
     * @param string $detailsRef
     * @return Places
     */
    public function setDetailsRef($detailsRef)
    {
        $this->detailsRef = $detailsRef;
    
        return $this;
    }

    /**
     * Get detailsRef
     *
     * @return string 
     */
    public function getDetailsRef()
    {
        return $this->detailsRef;
    }

    /**
     * Set origin
     *
     * @param string $origin
     * @return Places
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

    /**
     * Set hasOwner
     *
     * @param integer $hasOwner
     * @return Places
     */
    public function setHasOwner($hasOwner)
    {
        $this->hasOwner = $hasOwner;
    
        return $this;
    }

    /**
     * Get hasOwner
     *
     * @return integer 
     */
    public function getHasOwner()
    {
        return $this->hasOwner;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add comments
     *
     * @param \Bundle\PlacesBundle\Entities\Comment $comments
     * @return Places
     */
    public function addComment(\Bundle\PlacesBundle\Entities\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Bundle\ProjectBundle\Entity\Comment $comments
     */
    public function removeComment(\Bundle\PlacesBundle\Entities\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    /**
     * Set placeDetails
     *
     * @param \Bundle\PlacesBundle\Entities\PlaceDetails $placeDetails
     * @return Place
     */
    public function setPlaceDetails(\Bundle\PlacesBundle\Entities\PlaceDetails $placeDetails = null) {
        $this->placeDetails = $placeDetails;

        return $this;
    }

    /**
     * Get placeDetails
     *
     * @return \Bundle\PlacesBundle\Entities\PlaceDetails 
     */
    public function getPlaceDetails() {
        return $this->placeDetails;
    }
}