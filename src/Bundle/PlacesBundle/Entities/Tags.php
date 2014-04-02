<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 */
class Tags
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tag;


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
     * Set type
     *
     * @param string $type
     * @return Types
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }
}