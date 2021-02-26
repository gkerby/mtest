<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ApiRateRepositoryContract extends RateRepositoryContract
{
    public function findByRequestFilter($request): Collection;
}
