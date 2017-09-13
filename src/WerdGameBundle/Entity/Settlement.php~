<?php

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settlement
 *
 * @ORM\Table(name="g_settlement")
 * @ORM\Entity(repositoryClass="WerdGameBundle\Repository\SettlementRepository")
 */
class Settlement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\User")
     * @ORM\JoinColumn(name="user", fieldName="id", referencedColumnName="id")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="coordinateX", type="integer", options={"unsigned"=true})
     */
    private $coordinateX = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="coordinateY", type="integer", options={"unsigned"=true})
     */
    private $coordinateY = 0;

//    /**
//     * @ORM\ManyToMany(targetEntity="WerdGameBundle\Entity\Mine")
//     * @ORM\JoinColumn(name="mine", fieldName="id", referencedColumnName="id")
//     * @ORM\OrderBy({"id" = "ASC"})
//     */
//    private $mine;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mine = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
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
     * @return Settlement
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
     * Set coordinateX
     *
     * @param integer $coordinateX
     *
     * @return Settlement
     */
    public function setCoordinateX($coordinateX)
    {
        $this->coordinateX = $coordinateX;

        return $this;
    }

    /**
     * Get coordinateX
     *
     * @return int
     */
    public function getCoordinateX()
    {
        return $this->coordinateX;
    }

    /**
     * Set coordinateY
     *
     * @param integer $coordinateY
     *
     * @return Settlement
     */
    public function setCoordinateY($coordinateY)
    {
        $this->coordinateY = $coordinateY;

        return $this;
    }

    /**
     * Get coordinateY
     *
     * @return int
     */
    public function getCoordinateY()
    {
        return $this->coordinateY;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }


    /**
     * Set userId
     *
     * @param \WerdGameBundle\Entity\User $userId
     *
     * @return Settlement
     */
    public function setUserId(\WerdGameBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \WerdGameBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Add mine
     *
     * @param \WerdGameBundle\Entity\Mine $mine
     *
     * @return Settlement
     */
    public function addMine(\WerdGameBundle\Entity\Mine $mine)
    {
        $this->mine[] = $mine;

        return $this;
    }

    /**
     * Remove mine
     *
     * @param \WerdGameBundle\Entity\Mine $mine
     */
    public function removeMine(\WerdGameBundle\Entity\Mine $mine)
    {
        $this->mine->removeElement($mine);
    }

    /**
     * Get mine
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMine()
    {
        return $this->mine;
    }
}
