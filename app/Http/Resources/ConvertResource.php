<?php

namespace App\Http\Resources;

use App\Entities\RateEntityContract;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RateResource
 * @package App\Http\Resources
 *
 * @property array $resource
 */
class ConvertResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->resource;
    }
}
