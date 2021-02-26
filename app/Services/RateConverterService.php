<?php

namespace App\Services;

use App\Repositories\ApiRateRepositoryContract;
use App\Services\Contracts\RateConverterContract;
use App\Services\Contracts\RateConverterServiceContract;
use App\Services\Contracts\RateTransformerContract;

class RateConverterService implements RateConverterServiceContract
{
    /**
     * @var ApiRateRepositoryContract
     */
    private $repo;

    /**
     * @var RateTransformerContract
     */
    private $transformer;

    /**
     * @var RateConverterContract
     */
    private $converter;

    public function __construct(
        ApiRateRepositoryContract $repo,
        RateTransformerContract $transformer,
        RateConverterContract $converter
    ) {
        $this->repo = $repo;
        $this->transformer = $transformer;
        $this->converter = $converter;
    }

    public function convert($currencyFrom, $currencyTo, $value): float
    {
        $isSelling = $currencyTo !== 'BTC';

        if ($isSelling) {
            $rate = $this->repo->findByCurrency($currencyTo);
            $value = $this->transformer->transformRateValue($this->converter->fromBTC($rate, $value));
        } else {
            $rate = $this->repo->findByCurrency($currencyFrom);
            $value = $this->transformer->transformRateValue($this->converter->toBTC($rate, $value), RateConverterContract::RATE_ROUND_TO_DIGITS);
        }

        return $value;
    }
}
