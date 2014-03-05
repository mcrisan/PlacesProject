<?php

namespace Bundle\PlacesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceRatings
 */
class PlaceRatings
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
    private $totalVotes;

    /**
     * @var integer
     */
    private $votesCount;


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
     * @return PlaceRatings
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
     * Set totalVotes
     *
     * @param integer $totalVotes
     * @return PlaceRatings
     */
    public function setTotalVotes($totalVotes)
    {
        $this->totalVotes = $totalVotes;
    
        return $this;
    }

    /**
     * Get totalVotes
     *
     * @return integer 
     */
    public function getTotalVotes()
    {
        return $this->totalVotes;
    }

    /**
     * Set votesCount
     *
     * @param integer $votesCount
     * @return PlaceRatings
     */
    public function setVotesCount($votesCount)
    {
        $this->votesCount = $votesCount;
    
        return $this;
    }

    /**
     * Get votesCount
     *
     * @return integer 
     */
    public function getVotesCount()
    {
        return $this->votesCount;
    }
}