<?php

namespace App\Services\Contracts;

use App\Repositories\RateRepositoryContract;

interface RateFetcherContract
{
    public function fetchRates(): RateRepositoryContract;
}
