<?php

namespace AD\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Cars
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AD\PlatformBundle\Entity\CarsRepository")
 */
class Cars
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;
    
    /**
     *
     * @var string
     * @ORM\Column(name="motor", type="string", length=255)
     */
    private $motor;

    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="power", type="integer")
     */
    private $power;


    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     * @Assert\LessThan(
     *          value = 2017
     * )
     * @Assert\GreaterThan(
     *          value = 1800
     * )
     * @Assert\Length(
     *          min = 4,
     *          max = 4
     * )
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="displacement", type="integer")
     * @Assert\Length(
     *          min = 4,
     *          max = 5
     * )
     * @Assert\GreaterThan(
     *          value = 0
     * )
     */
    private $displacement;

    /**
     * @var string
     *
     * @ORM\Column(name="bodytype", type="string", length=255)
     */
    private $bodytype;

    /**
     * @var string
     *
     * @ORM\Column(name="fuel", type="string", length=255)
     */
    private $fuel;

    /**
     *
     * @var string
     * @ORM\Column(name="transmission", type="string", length=255)
     */
    private $transmission;
    
    /**
     *
     * @var integer
     * @ORM\Column(name="heigth", type="integer")
     */
    private $heigth;
    
    /**
     *
     * @var integer
     * @ORM\Column(name="width", type="integer")
     */
    private $width;
    
    /**
     *
     * @var integer
     * @ORM\Column(name="vmax", type="integer")
     */
    private $vmax;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="AD\PlatformBundle\Entity\Image", cascade={"persist"})
     * @Assert\Valid()
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="AD\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     *
     * @var boolean
     * @ORM\Column(name="report", type="boolean", options={"default": false})
     */
    private $report;

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
     *
     * @return Cars
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
     * Set model
     *
     * @param string $model
     *
     * @return Cars
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Cars
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set displacement
     *
     * @param integer $displacement
     *
     * @return Cars
     */
    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;

        return $this;
    }

    /**
     * Get displacement
     *
     * @return integer
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * Set bodytype
     *
     * @param string $bodytype
     *
     * @return Cars
     */
    public function setBodytype($bodytype)
    {
        $this->bodytype = $bodytype;

        return $this;
    }

    /**
     * Get bodytype
     *
     * @return string
     */
    public function getBodytype()
    {
        return $this->bodytype;
    }

    /**
     * Set fuel
     *
     * @param string $fuel
     *
     * @return Cars
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return string
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cars
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
     * Set image
     *
     * @param \AD\PlatformBundle\Entity\Image $image
     *
     * @return Cars
     */
    public function setImage(\AD\PlatformBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AD\PlatformBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Cars
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set motor
     *
     * @param string $motor
     *
     * @return Cars
     */
    public function setMotor($motor)
    {
        $this->motor = $motor;

        return $this;
    }

    /**
     * Get motor
     *
     * @return string
     */
    public function getMotor()
    {
        return $this->motor;
    }

    /**
     * Set power
     *
     * @param integer $power
     *
     * @return Cars
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     *
     * @return Cars
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set heigth
     *
     * @param integer $heigth
     *
     * @return Cars
     */
    public function setHeigth($heigth)
    {
        $this->heigth = $heigth;

        return $this;
    }

    /**
     * Get heigth
     *
     * @return integer
     */
    public function getHeigth()
    {
        return $this->heigth;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Cars
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set vmax
     *
     * @param integer $vmax
     *
     * @return Cars
     */
    public function setVmax($vmax)
    {
        $this->vmax = $vmax;

        return $this;
    }

    /**
     * Get vmax
     *
     * @return integer
     */
    public function getVmax()
    {
        return $this->vmax;
    }

    /**
     * Set report
     *
     * @param boolean $report
     *
     * @return Cars
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return boolean
     */
    public function getReport()
    {
        return $this->report;
    }
}
