<?php

namespace App\Entities;

class MemoryRateEntity implements RateEntityContract {
    /** @var string */
    private $currency;

    /** @var float */
    private $_15m;

    /** @var float */
    private $last;

    /** @var float */
    private $buy;

    /** @var float */
    private $sell;

    /** @var string */
    private $symbol;

    public function getCurrency():string
    {
        return $this->currency;
    }

    public function setCurrency(string $id): void
    {
        $this->currency = $id;
    }

    public function get15m():float
    {
        return $this->_15m;
    }

    public function set15m(float $_15m): void
    {
        $this->_15m = $_15m;
    }

    public function getLast():float
    {
        return $this->last;
    }

    public function setLast(float $last): void
    {
        $this->last = $last;
    }

    public function getBuy():float
    {
        return $this->buy;
    }

    public function setBuy(float $buy): void
    {
        $this->buy = $buy;
    }

    public function getSell():float
    {
        return $this->sell;
    }

    public function setSell(float $sell): void
    {
        $this->sell = $sell;
    }

    public function getSymbol():string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }
}
