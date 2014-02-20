<?php

namespace Bundle\ProjectBundle\Entity;

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
    private $txtLogin;

    /**
     * @var string
     */
    private $txtPassword;

    /**
     * @var string
     */
    private $txtEmail;

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
    public function setTxtLogin($txtLogin)
    {
        $this->txtLogin = $txtLogin;
    
        return $this;
    }

    /**
     * Get txtLogin
     *
     * @return string 
     */
    public function getTxtLogin()
    {
        return $this->txtLogin;
    }

    /**
     * Set txtPassword
     *
     * @param string $txtPassword
     * @return AppUsers
     */
    public function setTxtPassword($txtPassword)
    {
        $this->txtPassword = $txtPassword;
    
        return $this;
    }

    /**
     * Get txtPassword
     *
     * @return string 
     */
    public function getTxtPassword()
    {
        return $this->txtPassword;
    }

    /**
     * Set txtEmail
     *
     * @param string $txtEmail
     * @return AppUsers
     */
    public function setTxtEmail($txtEmail)
    {
        $this->txtEmail = $txtEmail;
    
        return $this;
    }

    /**
     * Get txtEmail
     *
     * @return string 
     */
    public function getTxtEmail()
    {
        return $this->txtEmail;
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
    public function getUsername()
    {
        return $this->txtLogin;
    }

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
    public function getPassword()
    {
        return $this->txtPassword;
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