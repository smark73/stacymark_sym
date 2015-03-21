<?php

namespace StacyMark\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="ptg_details")
 * @Vich\Uploadable
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
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="ptg_image", fileNameProperty="imageName")
     *
     * @var File $image
     */
    protected $image;
    
    /**
     * @ORM\Column(type="string", length=255, name="image_name")
     *
     * @var string $imageName
     */
    protected $imageName;
    
    /**
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="ptg_thumb", fileNameProperty="thumbName")
     *
     * @var File $image
     */
    protected $thumb;
    
    /**
     * @ORM\Column(type="string", length=255, name="thumb_name")
     *
     * @var string $thumbName
     */
    protected $thumbName;
    
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
     * @ORM\Column (type="string")
     */
    protected $slug;
    

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
     * Set slug
     *
     * @param string $slug
     * @return Painting
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set image
     * 
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     * 
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImage(File $image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return File
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    
    /**
     * Set thumb
     * 
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     * 
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $thumb
     */
    public function setThumb(File $thumb)
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
    
    /**
     * @param string $thumbName
     */
    public function setThumbName($thumbName)
    {
        $this->thumbName = $thumbName;
    }

    /**
     * @return string
     */
    public function getThumbName()
    {
        return $this->thumbName;
    }
}