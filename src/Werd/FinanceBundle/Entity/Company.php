<?php

namespace Werd\FinanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="finance_company")
 * @ORM\Entity(repositoryClass="Werd\FinanceBundle\Repository\CompanyRepository")
 */
class Company
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="web_page", type="string", length=500, nullable=true)
     */
    private $webPage;

    /**
     * @var array
     *
     * @ORM\Column(name="trade_as", type="array", nullable=true)
     */
    private $tradeAs;

    /**
     * @var string
     *
     * @ORM\Column(name="industry", type="string", length=255, nullable=true)
     */
    private $industry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="founded", type="datetime")
     */
    private $founded;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_employees", type="integer")
     */
    private $numberOfEmployees;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=20, unique=true)
     */
    private $symbol;


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
     * @return Company
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
     * Set webPage
     *
     * @param string $webPage
     *
     * @return Company
     */
    public function setWebPage($webPage)
    {
        $this->webPage = $webPage;

        return $this;
    }

    /**
     * Get webPage
     *
     * @return string
     */
    public function getWebPage()
    {
        return $this->webPage;
    }

    /**
     * Set tradeAs
     *
     * @param array $tradeAs
     *
     * @return Company
     */
    public function setTradeAs($tradeAs)
    {
        $this->tradeAs = $tradeAs;

        return $this;
    }

    /**
     * Get tradeAs
     *
     * @return array
     */
    public function getTradeAs()
    {
        return $this->tradeAs;
    }

    /**
     * Set industry
     *
     * @param string $industry
     *
     * @return Company
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return string
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set founded
     *
     * @param \DateTime $founded
     *
     * @return Company
     */
    public function setFounded($founded)
    {
        $this->founded = $founded;

        return $this;
    }

    /**
     * Get founded
     *
     * @return \DateTime
     */
    public function getFounded()
    {
        return $this->founded;
    }

    /**
     * Set numberOfEmployees
     *
     * @param integer $numberOfEmployees
     *
     * @return Company
     */
    public function setNumberOfEmployees($numberOfEmployees)
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    /**
     * Get numberOfEmployees
     *
     * @return int
     */
    public function getNumberOfEmployees()
    {
        return $this->numberOfEmployees;
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     *
     * @return Company
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
}
