<?php

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settlement
 *
 * @ORM\Table(name="settlement")
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
    private $coordinateX;

    /**
     * @var int
     *
     * @ORM\Column(name="coordinateY", type="integer", options={"unsigned"=true})
     */
    private $coordinateY;


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
}
