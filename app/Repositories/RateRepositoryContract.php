<?php

namespace App\Repositories;

use App\Entities\RateEntityContract;

interface RateRepositoryContract
{
    public function store(RateEntityContract $rate): void;

    public function findByCurrency(string $currency): RateEntityContract;
}
