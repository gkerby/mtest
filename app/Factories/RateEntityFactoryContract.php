<?php

namespace App\Factories;

use App\Entities\RateEntityContract;

interface RateEntityFactoryContract
{
    public function makeFromArray(string $id, array $data): RateEntityContract;
}
