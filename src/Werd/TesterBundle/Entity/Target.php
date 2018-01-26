<?php

namespace Werd\TesterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Target
 *
 * @ORM\Table(name="tester_target")
 * @ORM\Entity(repositoryClass="Werd\TesterBundle\Repository\TargetRepository")
 */
class Target
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
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="managed", type="boolean", options={"default" : true})
     */
    private $managed;

    /**
     * @var bool
     *
     * @ORM\Column(name="manager", type="boolean", options={"default" : false})
     */
    private $manager;


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
     * @return Target
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
     * Set managed
     *
     * @param boolean $managed
     *
     * @return Target
     */
    public function setManaged($managed)
    {
        $this->managed = $managed;

        return $this;
    }

    /**
     * Get managed
     *
     * @return bool
     */
    public function getManaged()
    {
        return $this->managed;
    }

    /**
     * Set manager
     *
     * @param boolean $manager
     *
     * @return Target
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return bool
     */
    public function getManager()
    {
        return $this->manager;
    }
}
