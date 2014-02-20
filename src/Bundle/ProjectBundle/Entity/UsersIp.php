<?php

namespace Bundle\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersIp
 */
class UsersIp
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var integer
     */
    private $count;

    /**
     * @var integer
     */
    private $voteFlag;


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
     * Set ip
     *
     * @param string $ip
     * @return UsersIp
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return UsersIp
     */
    public function setCount($count)
    {
        $this->count = $count;
    
        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set voteFlag
     *
     * @param integer $voteFlag
     * @return UsersIp
     */
    public function setVoteFlag($voteFlag)
    {
        $this->voteFlag = $voteFlag;
    
        return $this;
    }

    /**
     * Get voteFlag
     *
     * @return integer 
     */
    public function getVoteFlag()
    {
        return $this->voteFlag;
    }
}