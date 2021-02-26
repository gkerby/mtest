<?php

namespace App\Factories;

use App\Entities\RateEntityContract;

class BlockchainInfoRateFactory implements RateEntityFactoryContract
{
    public function makeFromArray(string $id, array $data): RateEntityContract
    {
        $rate = app()->make(RateEntityContract::class);

        $rate->setCurrency($id);
        $rate->set15m($data['15m']);
        $rate->set15m($data['15m']);
        $rate->setLast($data['last']);
        $rate->setBuy($data['buy']);
        $rate->setSell($data['sell']);
        $rate->setSymbol($data['symbol']);

        return $rate;
    }
}
