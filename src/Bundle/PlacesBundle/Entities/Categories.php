<?php

namespace Bundle\PlacesBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Categories
 *
 * @author mcrisan
 */
class Categories {
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $category;

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
     * Set category
     *
     * @param string $category
     * @return Categories
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
}