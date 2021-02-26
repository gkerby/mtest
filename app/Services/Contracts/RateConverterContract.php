<?php

namespace App\Services\Contracts;

use App\Entities\RateEntityContract;

interface RateConverterContract
{
    public function fromBTC(RateEntityContract $rate, float $value): float;

    public function toBTC(RateEntityContract $rate, float $value): float;
}
