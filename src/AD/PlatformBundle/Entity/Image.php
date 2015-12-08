<?php

namespace AD\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class Image
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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;
    
    private $file;
    private $tempFileName;

    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        $this->file = $file;
        
        if (null !== $this->url)
        {
            $this->tempFileName = $this->url;
            $this->url=null;
            $this->alt=null;
        }
    }
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
     * Set url
     *
     * @param string $url
     *
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null === $this->file)
        {
            return;
        }
        
        
        //On add un extension pour le fichier.
        $this->url = $this->file->guessExtension();
        //Le alt est le nom du fichier du client.
        $this->alt=  $this->file->getClientOriginalName();
        
    }
    
    /**
     * 
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     * 
     */
    public function upload()
    {
        if(null=== $this->file)
        {
            return;
        }
        
        //Si ancien fichier on supprime
        if(null !== $this->tempFileName)
        {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFileName;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
        }
        
        //On deplace
        $this->file->move
        (
            $this->getUploadRootDir(),
            $this->id.'.'.$this->url    
        );
    }
    
    /**
     *@ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFileName = $this->getUploadRootDir().'/'.$this->id.'.'.$this->url;
    }
    
    /**
     * 
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if(file_exists($this->tempFileName))
        {
            unlink($this->tempFileName);
        }
    }
    public function getUploadDir()
    {
        return 'upload/img/';
    }
    
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    public function __toString()
    {
        return $this->getUploadDir().$this->id.'.'.$this->getUrl();
    }
}
