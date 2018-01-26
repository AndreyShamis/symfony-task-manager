<?php

namespace Werd\IotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviceModel
 *
 * @ORM\Table(name="device_model")
 * @ORM\Entity(repositoryClass="Werd\IotBundle\Repository\DeviceModelRepository")
 */
class DeviceModel
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
     * @ORM\OneToMany(targetEntity="Werd\IotBundle\Entity\Device", mappedBy="model", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="device",fieldName="id" , referencedColumnName="id", onDelete="SET NULL" )
     * ORM\OrderBy({"id" = "ASC"})
     */
    protected $device;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="manufactor", type="string", length=255)
     */
    private $manufactor;

    /**
     * @var string
     *
     * @ORM\Column(name="datasheet", type="string", length=500)
     */
    private $datasheet;


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
     * @return DeviceModel
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
     * Set version
     *
     * @param string $version
     *
     * @return DeviceModel
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set manufactor
     *
     * @param string $manufactor
     *
     * @return DeviceModel
     */
    public function setManufactor($manufactor)
    {
        $this->manufactor = $manufactor;

        return $this;
    }

    /**
     * Get manufactor
     *
     * @return string
     */
    public function getManufactor()
    {
        return $this->manufactor;
    }

    /**
     * Set datasheet
     *
     * @param string $datasheet
     *
     * @return DeviceModel
     */
    public function setDatasheet($datasheet)
    {
        $this->datasheet = $datasheet;

        return $this;
    }

    /**
     * Get datasheet
     *
     * @return string
     */
    public function getDatasheet()
    {
        return $this->datasheet;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->device = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add device
     *
     * @param \Werd\IotBundle\Entity\Device $device
     *
     * @return DeviceModel
     */
    public function addDevice(\Werd\IotBundle\Entity\Device $device)
    {
        $this->device[] = $device;

        return $this;
    }

    /**
     * Remove device
     *
     * @param \Werd\IotBundle\Entity\Device $device
     */
    public function removeDevice(\Werd\IotBundle\Entity\Device $device)
    {
        $this->device->removeElement($device);
    }

    /**
     * Get device
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevice()
    {
        return $this->device;
    }

    public function __toString()
    {
        return $this->getName() . " " . $this->getVersion();
    }
}
