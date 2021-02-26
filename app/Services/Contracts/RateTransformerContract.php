<?php

namespace App\Services\Contracts;

use App\Entities\RateEntityContract;
use Illuminate\Support\Collection;

interface RateTransformerContract
{
    /**
     * Преобразует значение
     *
     * @param float $sourceValue
     * @param int|null $digits
     * @return float
     */
    public function transformRateValue(float $sourceValue, ?int $digits = null): float;

    /**
     * Преобразует сущность курса, представленную реализациец интерфейса RateEntityContract
     *
     * @param RateEntityContract $rate
     * @return RateEntityContract
     */
    public function transformRate(RateEntityContract $rate): RateEntityContract;

    /**
     * Преобразует коллекцию курсов
     *
     * @param Collection $collection
     * @return Collection
     */
    public function transformCollection(Collection $collection): Collection;
}
