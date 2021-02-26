<?php

namespace App\Http\Resources;

use App\Entities\RateEntityContract;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RateResource
 * @package App\Http\Resources
 *
 * @property RateEntityContract $resource
 */
class RateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            '15m' => $this->resource->get15m(),
            'last' => $this->resource->getLast(),
            'buy' => $this->resource->getBuy(),
            'sell' => $this->resource->getSell(),
            'symbol' => $this->resource->getSymbol(),
        ];
    }
}
