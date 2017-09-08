<?php

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mine
 *
 * @ORM\Table(name="mine")
 * @ORM\Entity(repositoryClass="WerdGameBundle\Repository\MineRepository")
 */
class Mine
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\User")
     * @ORM\JoinColumn(name="user", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\Settlement")
     * @ORM\JoinColumn(name="settlement", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $settlementId;

    /**
     * @var int
     *
     * @ORM\Column(name="resourcePeerHour", type="integer", options={"unsigned"=true, "default"=3600})
     */
    private $resourcePeerHour;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceCurrent", type="integer", options={"unsigned"=true, "default"=0})
     */
    private $resourceCurrent;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceMax", type="integer", options={"unsigned"=true, "default"=36000})
     */
    private $resourceMax;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceLastFlush", type="integer", options={"unsigned"=true})
     */
    private $resourceLastFlush;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", options={"unsigned"=true, "default"=1})
     */
    private $level = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="nextLevelPrice", type="integer", options={"unsigned"=true, "default"=12000})
     */
    private $nextLevelPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="coordinateX", type="integer", options={"unsigned"=true})
     */
    private $coordinateX;

    /**
     * @var string
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
     * @return Mine
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
     * Set resourcePeerHour
     *
     * @param integer $resourcePeerHour
     *
     * @return Mine
     */
    public function setResourcePeerHour($resourcePeerHour)
    {
        $this->resourcePeerHour = $resourcePeerHour;

        return $this;
    }

    /**
     * Get resourcePeerHour
     *
     * @return int
     */
    public function getResourcePeerHour()
    {
        return $this->resourcePeerHour;
    }

    /**
     * Set resourceCurrent
     *
     * @param integer $resourceCurrent
     *
     * @return Mine
     */
    public function setResourceCurrent($resourceCurrent)
    {
        $this->resourceCurrent = $resourceCurrent;

        return $this;
    }

    /**
     * Get resourceCurrent
     *
     * @return int
     */
    public function getResourceCurrent()
    {
        return $this->resourceCurrent;
    }

    /**
     * Set resourceMax
     *
     * @param integer $resourceMax
     *
     * @return Mine
     */
    public function setResourceMax($resourceMax)
    {
        $this->resourceMax = $resourceMax;

        return $this;
    }

    /**
     * Get resourceMax
     *
     * @return int
     */
    public function getResourceMax()
    {
        return $this->resourceMax;
    }

    /**
     * Set resourceLastFlush
     *
     * @param integer $resourceLastFlush
     *
     * @return Mine
     */
    public function setResourceLastFlush($resourceLastFlush)
    {
        $this->resourceLastFlush = $resourceLastFlush;

        return $this;
    }

    /**
     * Get resourceLastFlush
     *
     * @return int
     */
    public function getResourceLastFlush()
    {
        return $this->resourceLastFlush;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Mine
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set nextLevelPrice
     *
     * @param integer $nextLevelPrice
     *
     * @return Mine
     */
    public function setNextLevelPrice($nextLevelPrice)
    {
        $this->nextLevelPrice = $nextLevelPrice;

        return $this;
    }

    /**
     * Get nextLevelPrice
     *
     * @return int
     */
    public function getNextLevelPrice()
    {
        return $this->nextLevelPrice;
    }

    /**
     * Set coordinateX
     *
     * @param integer $coordinateX
     *
     * @return Mine
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
     * @param string $coordinateY
     *
     * @return Mine
     */
    public function setCoordinateY($coordinateY)
    {
        $this->coordinateY = $coordinateY;

        return $this;
    }

    /**
     * Get coordinateY
     *
     * @return string
     */
    public function getCoordinateY()
    {
        return $this->coordinateY;
    }

    /**
     * Set userId
     *
     * @param \WerdGameBundle\Entity\User $userId
     *
     * @return Mine
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
     * Set settlementId
     *
     * @param \WerdGameBundle\Entity\Settlement $settlementId
     *
     * @return Mine
     */
    public function setSettlementId(\WerdGameBundle\Entity\Settlement $settlementId = null)
    {
        $this->settlementId = $settlementId;

        return $this;
    }

    /**
     * Get settlementId
     *
     * @return \WerdGameBundle\Entity\Settlement
     */
    public function getSettlementId()
    {
        return $this->settlementId;
    }
}
