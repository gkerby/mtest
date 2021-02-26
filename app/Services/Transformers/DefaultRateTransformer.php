<?php

namespace App\Services\Transformers;

use App\Entities\RateEntityContract;
use App\Services\Contracts\RateTransformerContract;
use Illuminate\Support\Collection;

class DefaultRateTransformer implements RateTransformerContract
{
    public const RATE_MULTIPLIER = 1.02;
    public const RATE_ROUND_DIGITS = 2;

    /**
     * Считает значение конечной стоимости с учетом констант
     *
     * @param float $sourceValue
     * @param int|null $digits
     * @return float
     */
    public function transformRateValue(float $sourceValue, ?int $digits = null): float
    {
        return round($sourceValue * $this->getRateMultiplier(), $digits ?? $this->getRoundDigits());
    }

    protected function getRateMultiplier(): float
    {
        return self::RATE_MULTIPLIER;
    }

    protected function getRoundDigits(): int
    {
        return self::RATE_ROUND_DIGITS;
    }

    /**
     * Преобразует сущность RateEntityContract по правилам @param RateEntityContract $rate
     * @return RateEntityContract
     * @see transformRateValue
     *
     */
    public function transformRate(RateEntityContract $rate): RateEntityContract
    {
        $newRate = clone $rate;

        $newRate->set15m($this->transformRateValue($rate->get15m()));
        $newRate->setLast($this->transformRateValue($rate->getLast()));
        $newRate->setBuy($this->transformRateValue($rate->getBuy()));
        $newRate->setSell($this->transformRateValue($rate->getSell()));

        return $newRate;
    }

    /**
     * Преобразует всю коллекцию по виду @param Collection $collection
     * @return Collection
     * @see transformRate
     *
     */
    public function transformCollection(Collection $collection): Collection
    {
        return $collection->transform(
            function ($rate) {
                return $this->transformRate($rate);
            }
        );
    }
}
