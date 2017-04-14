<?php

namespace Werd\IotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Werd\IotBundle\Entity\DeviceModel;
/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="Werd\IotBundle\Repository\DeviceRepository")
 */
class Device
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
     * @ORM\ManyToOne(targetEntity="Werd\IotBundle\Entity\DeviceModel", inversedBy="device")
     * @ORM\JoinColumn(name="model",fieldName="id" , referencedColumnName="id", onDelete="SET NULL" )
     */
    protected $model;
    /**
     * @var string
     *
     * @ORM\Column(name="hostname", type="string", length=50, unique=true)
     */
    private $hostName;

    /**
     * @var smallint
     *
     * @ORM\Column(name="wifi_channel", type="smallint", options={"unsigned"=true})
     */
    private $wifi_channel = 0;

    /**
     * @var smallint
     *
     * @ORM\Column(name="wifi_rssi", type="smallint", options={"unsigned"=true})
     */
    private $wifi_rssi = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="id_addr", type="string", length=25, unique=false)
     */
    private $ip_addr;

    /**
     * @var string
     *
     * @ORM\Column(name="wifi_mac_addr", type="string", length=25, unique=true)
     */
    private $wifi_mac_addr;

    /**
     * @var string
     *
     * @ORM\Column(name="core_version", type="string", length=50, unique=false)
     */
    private $core_version;

    /**
     * @var string
     *
     * @ORM\Column(name="sdk_version", type="string", length=50, unique=false)
     */
    private $sdk_version;

    /**
     * @var string
     *
     * @ORM\Column(name="boot_version", type="string", length=50, unique=false)
     */
    private $boot_version;

    /**
     * @var string
     *
     * @ORM\Column(name="boot_mode", type="string", length=50, unique=false)
     */
    private $boot_mode;

    /**
     * @var integer
     *
     * @ORM\Column(name="sketch_size", type="integer", options={"unsigned"=true})
     */
    private $sketch_size = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="free_sketch_space", type="integer", options={"unsigned"=true})
     */
    private $free_sketch_space = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpu_freq", type="integer", options={"unsigned"=true})
     */
    private $cpu_freq = 80;

    /**
     * @var integer
     *
     * @ORM\Column(name="flash_chip_size", type="integer", options={"unsigned"=true})
     */
    private $flash_chip_size = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="flash_chip_speed", type="integer", options={"unsigned"=true})
     */
    private $flash_chip_speed = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="flash_chip_id", type="integer", options={"unsigned"=true})
     */
    private $flash_chip_id = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="flash_chip_mode", type="integer", options={"unsigned"=true})
     */
    private $flash_chip_mode = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_seen", type="datetime", nullable=true)
     */
    private $lastSeen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="added_date", type="datetime", nullable=true)
     */
    private $addedDate;


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
     * @return Device
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
     * Set macAddr
     *
     * @param string $macAddr
     *
     * @return Device
     */
    public function setMacAddr($macAddr)
    {
        $this->macAddr = $macAddr;

        return $this;
    }

    /**
     * Get macAddr
     *
     * @return string
     */
    public function getMacAddr()
    {
        return $this->macAddr;
    }

    /**
     * Set lastSeen
     *
     * @param \DateTime $lastSeen
     *
     * @return Device
     */
    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;

        return $this;
    }

    /**
     * Get lastSeen
     *
     * @return \DateTime
     */
    public function getLastSeen()
    {
        return $this->lastSeen;
    }

    /**
     * Set addedDate
     *
     * @param \DateTime $addedDate
     *
     * @return Device
     */
    public function setAddedDate($addedDate)
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * Get addedDate
     *
     * @return \DateTime
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Set hostName
     *
     * @param string $hostName
     *
     * @return Device
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;

        return $this;
    }

    /**
     * Get hostName
     *
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * Set wifiChannel
     *
     * @param integer $wifiChannel
     *
     * @return Device
     */
    public function setWifiChannel($wifiChannel)
    {
        $this->wifi_channel = $wifiChannel;

        return $this;
    }

    /**
     * Get wifiChannel
     *
     * @return integer
     */
    public function getWifiChannel()
    {
        return $this->wifi_channel;
    }

    /**
     * Set wifiRssi
     *
     * @param integer $wifiRssi
     *
     * @return Device
     */
    public function setWifiRssi($wifiRssi)
    {
        $this->wifi_rssi = $wifiRssi;

        return $this;
    }

    /**
     * Get wifiRssi
     *
     * @return integer
     */
    public function getWifiRssi()
    {
        return $this->wifi_rssi;
    }

    /**
     * Set ipAddr
     *
     * @param string $ipAddr
     *
     * @return Device
     */
    public function setIpAddr($ipAddr)
    {
        $this->ip_addr = $ipAddr;

        return $this;
    }

    /**
     * Get ipAddr
     *
     * @return string
     */
    public function getIpAddr()
    {
        return $this->ip_addr;
    }

    /**
     * Set wifiMacAddr
     *
     * @param string $wifiMacAddr
     *
     * @return Device
     */
    public function setWifiMacAddr($wifiMacAddr)
    {
        $this->wifi_mac_addr = $wifiMacAddr;

        return $this;
    }

    /**
     * Get wifiMacAddr
     *
     * @return string
     */
    public function getWifiMacAddr()
    {
        return $this->wifi_mac_addr;
    }

    /**
     * Set coreVersion
     *
     * @param string $coreVersion
     *
     * @return Device
     */
    public function setCoreVersion($coreVersion)
    {
        $this->core_version = $coreVersion;

        return $this;
    }

    /**
     * Get coreVersion
     *
     * @return string
     */
    public function getCoreVersion()
    {
        return $this->core_version;
    }

    /**
     * Set sdkVersion
     *
     * @param string $sdkVersion
     *
     * @return Device
     */
    public function setSdkVersion($sdkVersion)
    {
        $this->sdk_version = $sdkVersion;

        return $this;
    }

    /**
     * Get sdkVersion
     *
     * @return string
     */
    public function getSdkVersion()
    {
        return $this->sdk_version;
    }

    /**
     * Set bootVersion
     *
     * @param string $bootVersion
     *
     * @return Device
     */
    public function setBootVersion($bootVersion)
    {
        $this->boot_version = $bootVersion;

        return $this;
    }

    /**
     * Get bootVersion
     *
     * @return string
     */
    public function getBootVersion()
    {
        return $this->boot_version;
    }

    /**
     * Set bootMode
     *
     * @param string $bootMode
     *
     * @return Device
     */
    public function setBootMode($bootMode)
    {
        $this->boot_mode = $bootMode;

        return $this;
    }

    /**
     * Get bootMode
     *
     * @return string
     */
    public function getBootMode()
    {
        return $this->boot_mode;
    }

    /**
     * Set sketchSize
     *
     * @param integer $sketchSize
     *
     * @return Device
     */
    public function setSketchSize($sketchSize)
    {
        $this->sketch_size = $sketchSize;

        return $this;
    }

    /**
     * Get sketchSize
     *
     * @return integer
     */
    public function getSketchSize()
    {
        return $this->sketch_size;
    }

    /**
     * Set freeSketchSpace
     *
     * @param integer $freeSketchSpace
     *
     * @return Device
     */
    public function setFreeSketchSpace($freeSketchSpace)
    {
        $this->free_sketch_space = $freeSketchSpace;

        return $this;
    }

    /**
     * Get freeSketchSpace
     *
     * @return integer
     */
    public function getFreeSketchSpace()
    {
        return $this->free_sketch_space;
    }

    /**
     * Set cpuFreq
     *
     * @param integer $cpuFreq
     *
     * @return Device
     */
    public function setCpuFreq($cpuFreq)
    {
        $this->cpu_freq = $cpuFreq;

        return $this;
    }

    /**
     * Get cpuFreq
     *
     * @return integer
     */
    public function getCpuFreq()
    {
        return $this->cpu_freq;
    }

    /**
     * Set flashChipSize
     *
     * @param integer $flashChipSize
     *
     * @return Device
     */
    public function setFlashChipSize($flashChipSize)
    {
        $this->flash_chip_size = $flashChipSize;

        return $this;
    }

    /**
     * Get flashChipSize
     *
     * @return integer
     */
    public function getFlashChipSize()
    {
        return $this->flash_chip_size;
    }

    /**
     * Set flashChipSpeed
     *
     * @param integer $flashChipSpeed
     *
     * @return Device
     */
    public function setFlashChipSpeed($flashChipSpeed)
    {
        $this->flash_chip_speed = $flashChipSpeed;

        return $this;
    }

    /**
     * Get flashChipSpeed
     *
     * @return integer
     */
    public function getFlashChipSpeed()
    {
        return $this->flash_chip_speed;
    }

    /**
     * Set flashChipId
     *
     * @param integer $flashChipId
     *
     * @return Device
     */
    public function setFlashChipId($flashChipId)
    {
        $this->flash_chip_id = $flashChipId;

        return $this;
    }

    /**
     * Get flashChipId
     *
     * @return integer
     */
    public function getFlashChipId()
    {
        return $this->flash_chip_id;
    }

    /**
     * Set flashChipMode
     *
     * @param integer $flashChipMode
     *
     * @return Device
     */
    public function setFlashChipMode($flashChipMode)
    {
        $this->flash_chip_mode = $flashChipMode;

        return $this;
    }

    /**
     * Get flashChipMode
     *
     * @return integer
     */
    public function getFlashChipMode()
    {
        return $this->flash_chip_mode;
    }

    /**
     * Set model
     *
     * @param \Werd\IotBundle\Entity\Devicemodel $model
     *
     * @return Device
     */
    public function setModel(\Werd\IotBundle\Entity\Devicemodel $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \Werd\IotBundle\Entity\Devicemodel
     */
    public function getModel()
    {
        return $this->model;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
