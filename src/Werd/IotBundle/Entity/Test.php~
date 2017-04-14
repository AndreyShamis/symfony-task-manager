<?php

namespace Werd\IotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="Werd\IotBundle\Repository\TestRepository")
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Werd\IotBundle\Entity\DeviceModel", inversedBy="device")
     * @ORM\JoinColumn(name="model",fieldName="id" , referencedColumnName="id", onDelete="SET NULL" )
     */
    protected $model;

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
     * Set model
     *
     * @param \Werd\IotBundle\Entity\DeviceModel $model
     *
     * @return Test
     */
    public function setModel(\Werd\IotBundle\Entity\DeviceModel $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \Werd\IotBundle\Entity\DeviceModel
     */
    public function getModel()
    {
        return $this->model;
    }
}
