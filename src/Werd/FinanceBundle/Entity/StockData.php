<?php

namespace Werd\FinanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StockData
 *
 * @ORM\Table(name="finance_stock_data")
 * @ORM\Entity(repositoryClass="Werd\FinanceBundle\Repository\StockDataRepository")
 */
class StockData
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
     * @var \stdClass
     *
     * @ORM\Column(name="company", type="object")
     */
    private $company;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tradeDate", type="date")
     */
    private $tradeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tradeTime", type="time")
     */
    private $tradeTime;

    /**
     * @var float
     *
     * @ORM\Column(name="tradePrice", type="float")
     */
    private $tradePrice;


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
     * Set company
     *
     * @param \stdClass $company
     *
     * @return StockData
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \stdClass
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set tradeDate
     *
     * @param \DateTime $tradeDate
     *
     * @return StockData
     */
    public function setTradeDate($tradeDate)
    {
        $this->tradeDate = $tradeDate;

        return $this;
    }

    /**
     * Get tradeDate
     *
     * @return \DateTime
     */
    public function getTradeDate()
    {
        return $this->tradeDate;
    }

    /**
     * Set tradeTime
     *
     * @param \DateTime $tradeTime
     *
     * @return StockData
     */
    public function setTradeTime($tradeTime)
    {
        $this->tradeTime = $tradeTime;

        return $this;
    }

    /**
     * Get tradeTime
     *
     * @return \DateTime
     */
    public function getTradeTime()
    {
        return $this->tradeTime;
    }

    /**
     * Set tradePrice
     *
     * @param float $tradePrice
     *
     * @return StockData
     */
    public function setTradePrice($tradePrice)
    {
        $this->tradePrice = $tradePrice;

        return $this;
    }

    /**
     * Get tradePrice
     *
     * @return float
     */
    public function getTradePrice()
    {
        return $this->tradePrice;
    }
}
