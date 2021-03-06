<?php

namespace Werd\TesterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 *
 * @ORM\Table(name="tester_response")
 * @ORM\Entity(repositoryClass="Werd\TesterBundle\Repository\ResponseRepository")
 */
class Response
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
     * @ORM\Column(name="name", type="string", length=255, options={"default" : ""})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=255, nullable=true, options={"default" : ""})
     */
    private $pattern = "";

    /**
     * @var string
     *
     * @ORM\Column(name="output", type="text", nullable=true, options={"default" : ""})
     */
    private $output = "";

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\Target")
     * @ORM\JoinColumn(name="target",fieldName="id" , referencedColumnName="id", onDelete="SET NULL" )
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=50)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\OsState")
     * @ORM\JoinColumn(name="os_state", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $osState;


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
     * @return Response
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
     * Set pattern
     *
     * @param string $pattern
     *
     * @return Response
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set output
     *
     * @param string $output
     *
     * @return Response
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Get output
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set target
     *
     * @param integer $target
     *
     * @return Response
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return int
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Response
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set osState
     *
     * @param string $osState
     *
     * @return Response
     */
    public function setOsState($osState)
    {
        $this->osState = $osState;

        return $this;
    }

    /**
     * Get osState
     *
     * @return string
     */
    public function getOsState()
    {
        return $this->osState;
    }
}
