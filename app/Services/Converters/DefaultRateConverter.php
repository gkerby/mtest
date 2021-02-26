<?php

namespace App\Services\Converters;

use App\Entities\RateEntityContract;
use App\Services\Contracts\RateConverterContract;

class DefaultRateConverter implements RateConverterContract
{
    public const RATE_ROUND_FROM_DIGITS = 2;
    public const RATE_ROUND_TO_DIGITS = 10;

    public function fromBTC(RateEntityContract $rate, float $value): float
    {
        return round($rate->getSell() * $value, $this->getRoundDigitsFrom());
    }

    public function toBTC(RateEntityContract $rate, float $value): float
    {
        return round($value / $rate->getBuy(), $this->getRoundDigitsTo());
    }

    protected function getRoundDigitsFrom(): int
    {
        return self::RATE_ROUND_FROM_DIGITS;
    }

    protected function getRoundDigitsTo(): int
    {
        return self::RATE_ROUND_TO_DIGITS;
    }
}
