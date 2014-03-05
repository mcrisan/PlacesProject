<?php

namespace Bundle\PlacesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceReviews
 */
class PlaceReviews
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $authorUrl;

    /**
     * @var string
     */
    private $review;

    /**
     * @var string
     */
    private $ratingAspect;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var string
     */
    private $date;

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
     * Set author
     *
     * @param string $author
     * @return PlaceReviews
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set authorUrl
     *
     * @param string $authorUrl
     * @return PlaceReviews
     */
    public function setAuthorUrl($authorUrl)
    {
        $this->authorUrl = $authorUrl;
    
        return $this;
    }

    /**
     * Get authorUrl
     *
     * @return string 
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * Set review
     *
     * @param string $review
     * @return PlaceReviews
     */
    public function setReview($review)
    {
        $this->review = $review;
    
        return $this;
    }

    /**
     * Get review
     *
     * @return string 
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set ratingAspect
     *
     * @param string $ratingAspect
     * @return PlaceReviews
     */
    public function setRatingAspect($ratingAspect)
    {
        $this->ratingAspect = $ratingAspect;
    
        return $this;
    }

    /**
     * Get ratingAspect
     *
     * @return string 
     */
    public function getRatingAspect()
    {
        return $this->ratingAspect;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return PlaceReviews
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return PlaceReviews
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var \Bundle\PlacesBundle\Entity\Places
     */
    private $places;


    /**
     * Set places
     *
     * @param \Bundle\PlacesBundle\Entity\Places $places
     * @return PlaceReviews
     */
    public function setPlaces(\Bundle\PlacesBundle\Entity\Places $places = null)
    {
        $this->places = $places;
    
        return $this;
    }

    /**
     * Get places
     *
     * @return \Bundle\PlacesBundle\Entity\Places 
     */
    public function getPlaces()
    {
        return $this->places;
    }
}