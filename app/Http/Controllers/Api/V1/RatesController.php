<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RateResourceCollection;
use App\Repositories\ApiRateRepositoryContract;
use App\Services\Contracts\RateTransformerContract;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * @var RateTransformerContract
     */
    private $transformer;

    /**
     * @var ApiRateRepositoryContract
     */
    private $repo;

    public function __construct(RateTransformerContract $transformer, ApiRateRepositoryContract $repo)
    {
        $this->transformer = $transformer;
        $this->repo = $repo;
    }

    public function index(Request $request): RateResourceCollection
    {
        return new RateResourceCollection(
            $this->transformer->transformCollection(
                $this->repo->findByRequestFilter($request)
            )
        );
    }
}
