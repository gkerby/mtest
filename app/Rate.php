<?php

namespace App;

use App\Entities\RateEntityContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rate
 * @package App
 *
 * @property string $currency
 * @property float $_15m
 * @property float $last
 * @property float $buy
 * @property float $sell
 * @property string $symbol
 * @property Carbon $imported_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Rate extends Model implements RateEntityContract
{
    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $id): void
    {
        $this->currency = $id;
    }

    public function get15m(): float
    {
        return $this->_15m;
    }

    public function set15m(float $_15m): void
    {
        $this->_15m = $_15m;
    }

    public function getLast(): float
    {
        return $this->last;
    }

    public function setLast(float $last): void
    {
        $this->last = $last;
    }

    public function getBuy(): float
    {
        return $this->buy;
    }

    public function setBuy(float $buy): void
    {
        $this->buy = $buy;
    }

    public function getSell(): float
    {
        return $this->sell;
    }

    public function setSell(float $sell): void
    {
        $this->sell = $sell;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }
}
