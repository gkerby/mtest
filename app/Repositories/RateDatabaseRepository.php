<?php

namespace App\Repositories;

use App\Entities\RateEntityContract;
use App\Rate;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class RateDatabaseRepository implements ApiRateRepositoryContract
{
    public function store(RateEntityContract $rate): void
    {
    }

    public function findByRequestFilter($request): Collection
    {
        return QueryBuilder::for(Rate::class, $request)
            ->where('imported_at', '=', Rate::max('imported_at'))
            ->allowedFilters(['currency'])
            ->get()
            ->keyBy('currency');
    }

    public function findByCurrency(string $currency): RateEntityContract
    {
        return Rate::where('currency', $currency)
            ->where('imported_at', '=', Rate::max('imported_at'))
            ->firstOrFail();
    }
}
