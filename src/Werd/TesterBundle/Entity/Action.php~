<?php

namespace Werd\TesterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="Werd\TesterBundle\Repository\ActionRepository")
 */
class Action
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
     * @ORM\Column(name="command", type="string", length=1000, options={"default" : ""})
     */
    private $command;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\Target")
     * @ORM\JoinColumn(name="target", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $target;

    /**
     * @var int
     *
     * @ORM\Column(name="timeout", type="integer", options={"unsigned"=true, "default"=60})
     */
    private $timeout;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\OsState")
     * @ORM\JoinColumn(name="os_state", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $osState;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\PromptState")
     * @ORM\JoinColumn(name="state", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $state = "idle";

    /**
     * @var bool
     *
     * @ORM\Column(name="skip", type="boolean", options={"default" : false})
     */
    private $skip = false;

    /**
     * @var string
     *
     * @ORM\Column(name="skip_message", type="text", options={"default" : ""})
     */
    private $skipMessage = "";

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\SkipMode")
     * @ORM\JoinColumn(name="on_fail", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $onFail;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\SkipMode")
     * @ORM\JoinColumn(name="on_error", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $onError;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\SkipMode")
     * @ORM\JoinColumn(name="on_warning", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $onWarning;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\ActionVerdict")
     * @ORM\JoinColumn(name="verdict_on_error", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $verdictOnError;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\ActionVerdict")
     * @ORM\JoinColumn(name="verdict_on_fail", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $verdictOnFail;

    /**
     * @ORM\ManyToOne(targetEntity="Werd\TesterBundle\Entity\ActionVerdict")
     * @ORM\JoinColumn(name="verdict_on_warning", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     */
    private $verdictOnWarning;


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
     * Set command
     *
     * @param string $command
     *
     * @return Action
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set target
     *
     * @param integer $target
     *
     * @return Action
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
     * Set timeout
     *
     * @param integer $timeout
     *
     * @return Action
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get timeout
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set osState
     *
     * @param string $osState
     *
     * @return Action
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

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Action
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
     * Set skip
     *
     * @param boolean $skip
     *
     * @return Action
     */
    public function setSkip($skip)
    {
        $this->skip = $skip;

        return $this;
    }

    /**
     * Get skip
     *
     * @return bool
     */
    public function getSkip()
    {
        return $this->skip;
    }

    /**
     * Set skipMessage
     *
     * @param string $skipMessage
     *
     * @return Action
     */
    public function setSkipMessage($skipMessage)
    {
        $this->skipMessage = $skipMessage;

        return $this;
    }

    /**
     * Get skipMessage
     *
     * @return string
     */
    public function getSkipMessage()
    {
        return $this->skipMessage;
    }

    /**
     * Set onFail
     *
     * @param string $onFail
     *
     * @return Action
     */
    public function setOnFail($onFail)
    {
        $this->onFail = $onFail;

        return $this;
    }

    /**
     * Get onFail
     *
     * @return string
     */
    public function getOnFail()
    {
        return $this->onFail;
    }

    /**
     * Set onError
     *
     * @param string $onError
     *
     * @return Action
     */
    public function setOnError($onError)
    {
        $this->onError = $onError;

        return $this;
    }

    /**
     * Get onError
     *
     * @return string
     */
    public function getOnError()
    {
        return $this->onError;
    }

    /**
     * Set onWarning
     *
     * @param string $onWarning
     *
     * @return Action
     */
    public function setOnWarning($onWarning)
    {
        $this->onWarning = $onWarning;

        return $this;
    }

    /**
     * Get onWarning
     *
     * @return string
     */
    public function getOnWarning()
    {
        return $this->onWarning;
    }

    /**
     * Set verdictOnError
     *
     * @param string $verdictOnError
     *
     * @return Action
     */
    public function setVerdictOnError($verdictOnError)
    {
        $this->verdictOnError = $verdictOnError;

        return $this;
    }

    /**
     * Get verdictOnError
     *
     * @return string
     */
    public function getVerdictOnError()
    {
        return $this->verdictOnError;
    }

    /**
     * Set verdictOnFail
     *
     * @param string $verdictOnFail
     *
     * @return Action
     */
    public function setVerdictOnFail($verdictOnFail)
    {
        $this->verdictOnFail = $verdictOnFail;

        return $this;
    }

    /**
     * Get verdictOnFail
     *
     * @return string
     */
    public function getVerdictOnFail()
    {
        return $this->verdictOnFail;
    }

    /**
     * Set verdictOnWarning
     *
     * @param string $verdictOnWarning
     *
     * @return Action
     */
    public function setVerdictOnWarning($verdictOnWarning)
    {
        $this->verdictOnWarning = $verdictOnWarning;

        return $this;
    }

    /**
     * Get verdictOnWarning
     *
     * @return string
     */
    public function getVerdictOnWarning()
    {
        return $this->verdictOnWarning;
    }
}

