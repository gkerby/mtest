<?php

namespace App\Repositories;

use App\Entities\RateEntityContract;
use Illuminate\Support\Collection;

class RateCollectionRepository extends Collection implements RateRepositoryContract
{
    public function store(RateEntityContract $rate): void
    {
        $this->put($rate->getCurrency(), $rate);
    }

    public function findByCurrency(string $currency): RateEntityContract
    {
        return $this->get($currency);
    }
}
