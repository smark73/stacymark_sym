<?php

namespace StacyMark\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ptg_details")
 */
class Painting
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column (type="string")
     */
    protected $image;
    
     /**
     * @ORM\Column (type="string")
     */
    protected $thumb;
    
    /**
     * @ORM\Column (type="string")
     */
    protected $title;
            
    /**
     * @ORM\Column (type="string")
     */
    protected $medium;
    
    /**
     * @ORM\Column (type="integer")
     */
    protected $date_fin;
    
    /**
     * @ORM\Column (type="string")
     */
    protected $dim;
    
    /**
     * @ORM\Column (type="string")
     */
    protected $available;
    

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
     * Set title
     *
     * @param string $title
     * @return Painting
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set medium
     *
     * @param string $medium
     * @return Painting
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;
    
        return $this;
    }

    /**
     * Get medium
     *
     * @return string 
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Set date_fin
     *
     * @param integer $dateFin
     * @return Painting
     */
    public function setDateFin($dateFin)
    {
        $this->date_fin = $dateFin;
    
        return $this;
    }

    /**
     * Get date_fin
     *
     * @return integer 
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * Set dim
     *
     * @param string $dim
     * @return Painting
     */
    public function setDim($dim)
    {
        $this->dim = $dim;
    
        return $this;
    }

    /**
     * Get dim
     *
     * @return string 
     */
    public function getDim()
    {
        return $this->dim;
    }

    /**
     * Set available
     *
     * @param string $available
     * @return Painting
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    
        return $this;
    }

    /**
     * Get available
     *
     * @return string 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Painting
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set thumb
     *
     * @param string $thumb
     * @return Painting
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    
        return $this;
    }

    /**
     * Get thumb
     *
     * @return string 
     */
    public function getThumb()
    {
        return $this->thumb;
    }
}