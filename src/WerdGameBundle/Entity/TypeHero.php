<?php

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * TypeHero
 *
 * @ORM\Table(name="g_type_hero")
 * @ORM\Entity(repositoryClass="WerdGameBundle\Repository\TypeHeroRepository")
 * @UniqueEntity("name")
 */
class TypeHero
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", options={"unsigned"=true, "default"=500})
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="power_attack", type="float", options={"default"=0})
     */
    private $powerAttack;

    /**
     * @var float
     *
     * @ORM\Column(name="power_attack_speed", type="float", options={"default"=0})
     */
    private $powerAttackSpeed;

    /**
     * @var float
     *
     * @ORM\Column(name="power_attack_accuracy", type="float", options={"default"=0})
     */
    private $powerAttackAccuracy;

    /**
     * @var float
     *
     * @ORM\Column(name="power_defense", type="float", options={"default"=0})
     */
    private $powerDefense;

    /**
     * @var float
     *
     * @ORM\Column(name="power_defense_agility", type="float", options={"default"=0})
     */
    private $powerDefenseAgility;

    /**
     * @var float
     *
     * @ORM\Column(name="power_movement", type="float", options={"default"=0})
     */
    private $powerMovement;

    /**
     * @var float
     *
     * @ORM\Column(name="power_accuracy", type="float", options={"default"=0})
     */
    private $powerAccuracy;

    /**
     * @ORM\ManyToOne(targetEntity="WerdGameBundle\Entity\TypeHeroRace")
     * @ORM\JoinColumn(name="hero_race", fieldName="id", referencedColumnName="id", onDelete="SET NULL" )
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $heroRace;

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
     * @return TypeHero
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
     * Set price
     *
     * @param integer $price
     *
     * @return TypeHero
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set powerAttack
     *
     * @param float $powerAttack
     *
     * @return TypeHero
     */
    public function setPowerAttack($powerAttack)
    {
        $this->powerAttack = $powerAttack;

        return $this;
    }

    /**
     * Get powerAttack
     *
     * @return float
     */
    public function getPowerAttack()
    {
        return $this->powerAttack;
    }

    /**
     * Set powerDefense
     *
     * @param float $powerDefense
     *
     * @return TypeHero
     */
    public function setPowerDefense($powerDefense)
    {
        $this->powerDefense = $powerDefense;

        return $this;
    }

    /**
     * Get powerDefense
     *
     * @return float
     */
    public function getPowerDefense()
    {
        return $this->powerDefense;
    }

    /**
     * Set powerMovement
     *
     * @param float $powerMovement
     *
     * @return TypeHero
     */
    public function setPowerMovement($powerMovement)
    {
        $this->powerMovement = $powerMovement;

        return $this;
    }

    /**
     * Get powerMovement
     *
     * @return float
     */
    public function getPowerMovement()
    {
        return $this->powerMovement;
    }

    /**
     * Set powerAccuracy
     *
     * @param float $powerAccuracy
     *
     * @return TypeHero
     */
    public function setPowerAccuracy($powerAccuracy)
    {
        $this->powerAccuracy = $powerAccuracy;

        return $this;
    }

    /**
     * Get powerAccuracy
     *
     * @return float
     */
    public function getPowerAccuracy()
    {
        return $this->powerAccuracy;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set powerAttackSpeed
     *
     * @param float $powerAttackSpeed
     *
     * @return TypeHero
     */
    public function setPowerAttackSpeed($powerAttackSpeed)
    {
        $this->powerAttackSpeed = $powerAttackSpeed;

        return $this;
    }

    /**
     * Get powerAttackSpeed
     *
     * @return float
     */
    public function getPowerAttackSpeed()
    {
        return $this->powerAttackSpeed;
    }

    /**
     * Set powerAttackAccuracy
     *
     * @param float $powerAttackAccuracy
     *
     * @return TypeHero
     */
    public function setPowerAttackAccuracy($powerAttackAccuracy)
    {
        $this->powerAttackAccuracy = $powerAttackAccuracy;

        return $this;
    }

    /**
     * Get powerAttackAccuracy
     *
     * @return float
     */
    public function getPowerAttackAccuracy()
    {
        return $this->powerAttackAccuracy;
    }

    /**
     * Set heroRace
     *
     * @param \WerdGameBundle\Entity\TypeHeroRace $heroRace
     *
     * @return TypeHero
     */
    public function setHeroRace(\WerdGameBundle\Entity\TypeHeroRace $heroRace = null)
    {
        $this->heroRace = $heroRace;

        return $this;
    }

    /**
     * Get heroRace
     *
     * @return \WerdGameBundle\Entity\TypeHeroRace
     */
    public function getHeroRace()
    {
        return $this->heroRace;
    }

    /**
     * Set powerDefenseAgility
     *
     * @param float $powerDefenseAgility
     *
     * @return TypeHero
     */
    public function setPowerDefenseAgility($powerDefenseAgility)
    {
        $this->powerDefenseAgility = $powerDefenseAgility;

        return $this;
    }

    /**
     * Get powerDefenseAgility
     *
     * @return float
     */
    public function getPowerDefenseAgility()
    {
        return $this->powerDefenseAgility;
    }
}
