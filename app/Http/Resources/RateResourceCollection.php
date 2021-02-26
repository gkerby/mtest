<?php

namespace App\Http\Resources;

use App\Entities\RateEntityContract;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RateResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }
}
