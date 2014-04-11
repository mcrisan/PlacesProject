<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacePhotos
 */
class PlaceEvents {

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
     * @var string
     */
    private $placeid;

    /**
     * @var datetime
     */
    private $eventdate;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Get eventdate
     *
     * @return sting 
     */
    public function getEventdate() {
        return $this->eventdate;
    }

    /**
     * Set eventdate
     *
     * @param string $eventdate
     * @return eventdate
     */
    public function setEventdate($eventdate) {
        $this->eventdate = $eventdate;

        return $this;
    }
    
    /**
     * Set image
     *
     * @param string $image
     * @return PlacePhotos
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Set placeid
     *
     * @param string $image
     * @return PlacePhotos
     */
    public function setPlaceid($placeid) {
        $this->placeid = $placeid;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Get placeid
     *
     * @return string 
     */
    public function getPlaceid() {
        return $this->placeid;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return title
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return description
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

}
