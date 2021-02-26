<?php

namespace App\Providers;

use App\Entities\MemoryRateEntity;
use App\Entities\RateEntityContract;
use App\Http\Resources\RateResourceCollection;
use App\Repositories\ApiRateRepositoryContract;
use App\Repositories\RateDatabaseRepository;
use App\Repositories\RateCollectionRepository;
use App\Repositories\RateRepositoryContract;
use App\Services\Contracts\ImportServiceContract;
use App\Services\Contracts\RateConverterContract;
use App\Services\Contracts\RateConverterServiceContract;
use App\Services\Contracts\RateFetcherContract;
use App\Services\Contracts\RateTransformerContract;
use App\Services\Converters\DefaultRateConverter;
use App\Services\ImportService;
use App\Services\Fetchers\BlockchainInfoFetcher;
use App\Services\RateConverterService;
use App\Services\Transformers\DefaultRateTransformer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(RateFetcherContract::class, BlockchainInfoFetcher::class);
        $this->app->singleton(RateTransformerContract::class, DefaultRateTransformer::class);
        $this->app->singleton(RateConverterContract::class, DefaultRateConverter::class);

        $this->app->singleton(RateConverterServiceContract::class, RateConverterService::class);
        $this->app->singleton(ImportServiceContract::class, ImportService::class);

        $this->app->bind(RateEntityContract::class, MemoryRateEntity::class);
        $this->app->bind(RateRepositoryContract::class, RateCollectionRepository::class);
        $this->app->bind(ApiRateRepositoryContract::class, RateDatabaseRepository::class);

        RateResourceCollection::withoutWrapping();
    }
}
