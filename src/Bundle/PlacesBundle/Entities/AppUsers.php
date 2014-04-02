<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * AppUsers
 */
class AppUsers  implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $booActive;

    /**
     * @var \DateTime
     */
    private $timeStamp;


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
     * Set txtLogin
     *
     * @param string $txtLogin
     * @return AppUsers
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get txtLogin
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set txtPassword
     *
     * @param string $txtPassword
     * @return string
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }
    
       public function getPassword()
    {
        return $this->password;  
    }
    



    /**
     * Set txtEmail
     *
     * @param string $txtEmail
     * @return AppUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get txtEmail
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set booActive
     *
     * @param boolean $booActive
     * @return AppUsers
     */
    public function setBooActive($booActive)
    {
        $this->booActive = $booActive;
    
        return $this;
    }

    /**
     * Get booActive
     *
     * @return boolean 
     */
    public function getBooActive()
    {
        return $this->booActive;
    }

    /**
     * Set timeStamp
     *
     * @param \DateTime $timeStamp
     * @return AppUsers
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;
    
        return $this;
    }

    /**
     * Get timeStamp
     *
     * @return \DateTime 
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }
    
    
    ////////////////////////////

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return '';
    }


    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
}