<?php
/**
 * Created by PhpStorm.
 * User: Andrey Shamis
 * Date: 09/09/17
 * Time: 14:27
 */

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WerdGameBundle\Model\MineInterface;

/**
 * BuildingBase
 *
 */
class BuildingBase
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;


    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", options={"unsigned"=true, "default"=1})
     */
    protected $level = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="nextLevelPrice", type="integer", options={"unsigned"=true, "default"=12000})
     */
    protected $nextLevelPrice = 12000;

    /**
     * @var int
     *
     * @ORM\Column(name="life", type="integer", options={"unsigned"=true, "default"=1})
     */
    protected $life = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="defense", type="integer", options={"unsigned"=true, "default"=1})
     */
    protected $defense = 1;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", options={"default"=true})
     */
    protected $enabled = true;

    /**
     * @var int
     *
     * @ORM\Column(name="coordinateX", type="integer", options={"unsigned"=true})
     */
    protected $coordinateX = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="coordinateY", type="integer", options={"unsigned"=true})
     */
    protected $coordinateY = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", options={"unsigned"=true, "default"=1})
     */
    protected $size = 1;

    /**
     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\Settlement")
     * @ORM\JoinColumn(name="settlement_id", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     * @ORM\OrderBy({"id" = "ASC"})
     */
    protected $settlementId;

//    /**
//     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\User")
//     * @ORM\JoinColumn(name="user", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
//     * @ORM\OrderBy({"id" = "ASC"})
//     */
//    protected $userId;

    //******************************************************************************************************************
    //------------------------------------------------------------------------------------------------------------------
    //******************************************************************************************************************

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
     * @return int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param $life
     * @return BuildingBase
     */
    public function setLife($life)
    {
        $this->life = $life;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param $defense
     * @return BuildingBase
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return BuildingBase
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
     * Set level
     *
     * @param integer $level
     *
     * @return BuildingBase
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
     * @return BuildingBase
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
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     * @return BuildingBase
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

//    /**
//     * Set userId
//     *
//     * @param \WerdGameBundle\Entity\User $userId
//     *
//     * @return BuildingBase
//     */
//    public function setUserId(User $userId = null)
//    {
//        $this->userId = $userId;
//
//        return $this;
//    }
//
//    /**
//     * Get userId
//     *
//     * @return \WerdGameBundle\Entity\User
//     */
//    public function getUserId()
//    {
//        return $this->userId;
//    }

    /**
     * Set settlementId
     *
     * @param \WerdGameBundle\Entity\Settlement $settlementId
     *
     * @return BuildingBase
     */
    public function setSettlementId(Settlement $settlementId = null)
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

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return BuildingBase
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set coordinateX
     *
     * @param integer $coordinateX
     *
     * @return BuildingBase
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
     * @return BuildingBase
     */
    public function setCoordinateY($coordinateY)
    {
        $this->coordinateY = $coordinateY;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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

    //******************************************************************************************************************
    //------------------------------------------------------------------------------------------------------------------
    //******************************************************************************************************************
    
    /**
     * @return mixed
     */
    public function collectResources()
    {
        // TODO: Implement collectResources() method.
    }

    /**
     * @return mixed
     */
    public function levelUp()
    {
        // TODO: Implement levelUp() method.
    }

    /**
     * @return mixed
     */
    public function freezeProduction()
    {
        // TODO: Implement freezeProduction() method.
    }

    /**
     * @return mixed
     */
    public function updateLastFlushTime()
    {
        // TODO: Implement updateLastFlushTime() method.
    }
}