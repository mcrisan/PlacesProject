<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ownership
 *
 * @ORM\Table(name="ownership")
 * @ORM\Entity
 */
class Ownership
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
      /**
     * @var integer
     */
    private $placeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="verify", type="integer")
     */
    private $verify;


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
     * Set name
     *
     * @param string $name
     * @return Ownership
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Ownership
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return Ownership
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }
    
    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    
     /**
     * Set verify
     *
     * @param integer $verify
     * @return Ownership
     */
    public function setVerify($verify)
    {
        $this->verify = $verify;
    
        return $this;
    }
    
      /**
     * Get verify
     *
     * @return integer 
     */
    public function getVerify()
    {
        return $this->verify;
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
}
