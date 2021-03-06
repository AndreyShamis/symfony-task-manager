<?php
/**
 * Created by PhpStorm.
 * User: Andrey Shamis
 * Date: 09/09/17
 * Time: 15:02
 */

namespace WerdGameBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use WerdGameBundle\Model\MineInterface;
use WerdGameBundle\Model\MineType;

//implements MineInterface
/**
 * @ORM\HasLifecycleCallbacks
 */
class MineBase extends BuildingBase
{

    /**
     * @var int
     *
     * @ORM\Column(name="resourcePeerHour", type="integer", options={"unsigned"=true, "default"=3600})
     */
    protected $resourcePeerHour = 3600;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceCurrent", type="integer", options={"unsigned"=true, "default"=0})
     */
    protected $resourceCurrent = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceMax", type="integer", options={"unsigned"=true, "default"=36000})
     */
    protected $resourceMax = 36000;

    /**
     * @var int
     *
     * @ORM\Column(name="resourceLastFlush", type="integer", options={"unsigned"=true})
     */
    protected $resourceLastFlush = 0;

    /**
     * @var string
     * @ORM\Column(name="type", type="integer", options={"unsigned"=true})
     */
    protected $type;

    /**
     * @param integer $type
     * @return MineBase
     */
    public function setType($type)
    {
        if (!in_array($type, MineType::getAvailableTypes())) {
            throw new \InvalidArgumentException("Invalid mine type");
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Set resourcePeerHour
     *
     * @param integer $resourcePeerHour
     *
     * @return MineBase
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
     * @return MineBase
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
     * @return MineBase
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
     * @return MineBase
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function collectResources()
    {
        $this->setResourceLastFlush(time());
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}
