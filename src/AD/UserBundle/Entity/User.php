<?php

namespace AD\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="AD\UserBundle\Entity\ImageProfile", cascade={"persist"})
     */
    private $imageprofile;

    /**
     * @ORM\ManyToMany(targetEntity="AD\PlatformBundle\Entity\Cars")
     */
    private $favourites;

    /**
     * Set imageprofile
     *
     * @param \AD\UserBundle\Entity\ImageProfile $imageprofile
     *
     * @return User
     */
    public function setImageprofile(\AD\UserBundle\Entity\ImageProfile $imageprofile = null)
    {
        $this->imageprofile = $imageprofile;

        return $this;
    }

    /**
     * Get imageprofile
     *
     * @return \AD\UserBundle\Entity\ImageProfile
     */
    public function getImageprofile()
    {
        return $this->imageprofile;
    }

    /**
     * Add favourite
     *
     * @param \AD\PlatformBundle\Entity\Cars $favourite
     *
     * @return User
     */
    public function addFavourite(\AD\PlatformBundle\Entity\Cars $favourite)
    {
        $this->favourites[] = $favourite;
        return $this;
    }

    /**
     * Remove favourite
     *
     * @param \AD\PlatformBundle\Entity\Cars $favourite
     */
    public function removeFavourite(\AD\PlatformBundle\Entity\Cars $favourite)
    {
        $this->favourites->removeElement($favourite);
    }

    /**
     * Get favourites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFavourites()
    {
        return $this->favourites;
    }
}
