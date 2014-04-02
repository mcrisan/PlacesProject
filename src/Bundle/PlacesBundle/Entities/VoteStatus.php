<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoteStatus
 */
class VoteStatus
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
    private $userIp;


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
     * @return VoteStatus
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
     * Set userIp
     *
     * @param string $userIp
     * @return VoteStatus
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;
    
        return $this;
    }

    /**
     * Get userIp
     *
     * @return string 
     */
    public function getUserIp()
    {
        return $this->userIp;
    }
}