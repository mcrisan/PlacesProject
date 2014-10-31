<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceDetails
 */
class PlaceDetails
{  

    /**
     * @var integer
     */
    private $placeId;

    /**
     * @var string
     */
    private $placeName;

    /**
     * @var string
     */
    private $placePhonenumber;

    /**
     * @var string
     */
    private $placeVicinity;

    /**
     * @var string
     */
    private $placeLat;

    /**
     * @var string
     */
    private $placeLng;

    /**
     * @var string
     */
    private $placeRating;

    /**
     * @var string
     */
    private $placeIcon;

    /**
     * @var string
     */
    private $placeUrl;

    /**
     * @var string
     */
    private $placeWebsite;
    
    /**
     * @var \Bundle\PlacesBundle\Entities\Places
     */
    private $place;

    public function __construct($placename=null, 
            $placePhonenumber=null, 
            $placeVicinity=null,
            $placeLat=null,
            $placeLng=null,
            $placeRating=null,
            $placeIcon=null,
            $placeUrl=null,
            $placeWebsite=null) {
        $this->placeName = $placename;
        $this->placePhonenumber = $placePhonenumber;
        $this->placeVicinity = $placeVicinity;
        $this->placeLat = $placeLat;
        $this->placeLng = $placeLng;
        $this->placeRating = $placeRating;
        $this->placeIcon = $placeIcon;
        $this->placeUrl = $placeUrl;
        $this->placeWebsite = $placeWebsite;
    }

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
     * @return PlaceDetails
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
     * Set placeName
     *
     * @param string $placeName
     * @return PlaceDetails
     */
    public function setPlaceName($placeName)
    {
        $this->placeName = $placeName;
    
        return $this;
    }

    /**
     * Get placeName
     *
     * @return string 
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * Set placePhonenumber
     *
     * @param string $placePhonenumber
     * @return PlaceDetails
     */
    public function setPlacePhonenumber($placePhonenumber)
    {
        $this->placePhonenumber = $placePhonenumber;
    
        return $this;
    }

    /**
     * Get placePhonenumber
     *
     * @return string 
     */
    public function getPlacePhonenumber()
    {
        return $this->placePhonenumber;
    }

    /**
     * Set placeVicinity
     *
     * @param string $placeVicinity
     * @return PlaceDetails
     */
    public function setPlaceVicinity($placeVicinity)
    {
        $this->placeVicinity = $placeVicinity;
    
        return $this;
    }

    /**
     * Get placeVicinity
     *
     * @return string 
     */
    public function getPlaceVicinity()
    {
        return $this->placeVicinity;
    }

    /**
     * Set placeLat
     *
     * @param string $placeLat
     * @return PlaceDetails
     */
    public function setPlaceLat($placeLat)
    {
        $this->placeLat = $placeLat;
    
        return $this;
    }

    /**
     * Get placeLat
     *
     * @return string 
     */
    public function getPlaceLat()
    {
        return $this->placeLat;
    }

    /**
     * Set placeLng
     *
     * @param string $placeLng
     * @return PlaceDetails
     */
    public function setPlaceLng($placeLng)
    {
        $this->placeLng = $placeLng;
    
        return $this;
    }

    /**
     * Get placeLng
     *
     * @return string 
     */
    public function getPlaceLng()
    {
        return $this->placeLng;
    }

    /**
     * Set placeRating
     *
     * @param string $placeRating
     * @return PlaceDetails
     */
    public function setPlaceRating($placeRating)
    {
        $this->placeRating = $placeRating;
    
        return $this;
    }

    /**
     * Get placeRating
     *
     * @return string 
     */
    public function getPlaceRating()
    {
        return $this->placeRating;
    }

    /**
     * Set placeIcon
     *
     * @param string $placeIcon
     * @return PlaceDetails
     */
    public function setPlaceIcon($placeIcon)
    {
        $this->placeIcon = $placeIcon;
    
        return $this;
    }

    /**
     * Get placeIcon
     *
     * @return string 
     */
    public function getPlaceIcon()
    {
        return $this->placeIcon;
    }

    /**
     * Set placeUrl
     *
     * @param string $placeUrl
     * @return PlaceDetails
     */
    public function setPlaceUrl($placeUrl)
    {
        $this->placeUrl = $placeUrl;
    
        return $this;
    }

    /**
     * Get placeUrl
     *
     * @return string 
     */
    public function getPlaceUrl()
    {
        return $this->placeUrl;
    }

    /**
     * Set placeWebsite
     *
     * @param string $placeWebsite
     * @return PlaceDetails
     */
    public function setPlaceWebsite($placeWebsite)
    {
        $this->placeWebsite = $placeWebsite;
    
        return $this;
    }

    /**
     * Get placeWebsite
     *
     * @return string 
     */
    public function getPlaceWebsite()
    {
        return $this->placeWebsite;
    }
    
    /**
     * Set place
     *
     * @param \Bundle\PlacesBundle\Entities\Places $place
     * @return Comment
     */
    
    public function setPlace(\Bundle\PlacesBundle\Entities\Places $place = null) {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \Bundle\PlacesBundle\Entities\Places 
     */
    
    public function getPlace() {
        return $this->place;
    }
    
    public function updateAllDetails($placename, 
            $placePhonenumber, 
            $placeVicinity,
            $placeLat,
            $placeLng,
            $placeRating,
            $placeIcon,
            $placeUrl,
            $placeWebsite){
        $this->setPlaceName($placename);
        $this->setPlacePhonenumber($placePhonenumber);
        $this->setPlaceVicinity($placeVicinity);
        $this->setPlaceLat($placeLat);
        $this->setPlaceLng($placeLng);
        $this->setPlaceRating($placeRating);
        $this->setPlaceIcon($placeIcon);
        $this->setPlaceUrl($placeUrl);
        $this->setPlaceWebsite($placeWebsite);      
    }
}