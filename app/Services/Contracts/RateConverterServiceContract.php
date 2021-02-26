<?php

namespace App\Services\Contracts;

use App\Entities\RateEntityContract;
use App\Repositories\RateRepositoryContract;

interface RateConverterServiceContract
{
    public function convert($currencyFrom, $currencyTo, $value):float;
}
