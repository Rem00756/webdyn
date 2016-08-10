<?php

namespace AD\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="titre1", type="string", length=255)
     */
    private $titre1;

    /**
     * @var string
     *
     * @ORM\Column(name="titre2", type="string", length=255)
     */
    private $titre2;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="AD\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="AD\PlatformBundle\Entity\ImageArticle", mappedBy="Article", cascade={"persist"})
     *
     */
    private $imagearticle;
    
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
     * Set titre1
     *
     * @param string $titre1
     *
     * @return Article
     */
    public function setTitre1($titre1)
    {
        $this->titre1 = $titre1;

        return $this;
    }

    /**
     * Get titre1
     *
     * @return string
     */
    public function getTitre1()
    {
        return $this->titre1;
    }

    /**
     * Set titre2
     *
     * @param string $titre2
     *
     * @return Article
     */
    public function setTitre2($titre2)
    {
        $this->titre2 = $titre2;

        return $this;
    }

    /**
     * Get titre2
     *
     * @return string
     */
    public function getTitre2()
    {
        return $this->titre2;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param \AD\UserBundle\Entity\User $user
     *
     * @return Article
     */
    public function setUser(\AD\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AD\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set imagearticle
     *
     * @param \AD\PlatformBundle\Entity\ImageArticle $imagearticle
     *
     * @return Article
     */
    public function setImagearticle(\AD\PlatformBundle\Entity\ImageArticle $imagearticle = null)
    {
        $this->imagearticle = $imagearticle;

        return $this;
    }

    /**
     * Get imagearticle
     *
     * @return \AD\PlatformBundle\Entity\ImageArticle
     */
    public function getImagearticle()
    {
        return $this->imagearticle;
    }
}
