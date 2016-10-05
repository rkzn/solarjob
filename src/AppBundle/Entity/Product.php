<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $hostingproduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corderdetail = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hostingproduct = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Add hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     * @return Product
     */
    public function addHostingproduct(\AppBundle\Entity\Hostingproduct $hostingproduct)
    {
        $this->hostingproduct[] = $hostingproduct;

        return $this;
    }

    /**
     * Remove hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     */
    public function removeHostingproduct(\AppBundle\Entity\Hostingproduct $hostingproduct)
    {
        $this->hostingproduct->removeElement($hostingproduct);
    }

    /**
     * Get hostingproduct
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHostingproduct()
    {
        return $this->hostingproduct;
    }
}
