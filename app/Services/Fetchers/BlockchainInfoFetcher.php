<?php

namespace App\Services\Fetchers;

use App\Factories\BlockchainInfoRateFactory;
use App\Repositories\RateRepositoryContract;
use App\Services\Contracts\RateFetcherContract;
use Illuminate\Support\Facades\Http;

class BlockchainInfoFetcher implements RateFetcherContract
{
    public function fetchRates(): RateRepositoryContract
    {
        $response = Http::get('https://blockchain.info/ticker');

        return $this->createRepository($response->json());
    }

    protected function createRepository(array $json): RateRepositoryContract
    {
        $factory = new BlockchainInfoRateFactory();

        /** @var RateRepositoryContract $repo */
        $repo = app()->make(RateRepositoryContract::class);

        foreach ($json as $id => $item) {
            $repo->store($factory->makeFromArray($id, $item));
        }

        return $repo;
    }
}
