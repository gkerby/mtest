<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConvertRequest;
use App\Http\Resources\ConvertResource;
use App\Services\Contracts\RateConverterServiceContract;
use Carbon\Carbon;

class ConvertController extends Controller
{
    /**
     * @var RateConverterServiceContract
     */
    private $converter;

    public function __construct(RateConverterServiceContract $converter)
    {
        $this->converter = $converter;
    }

    public function convert(ConvertRequest $request): ConvertResource
    {
        $validated = $request->validated();

        $currencyFrom = $validated['currency_from'];
        $currencyTo = $validated['currency_to'];
        $value = $validated['value'];

        $convertedValue = $this->converter->convert($currencyFrom, $currencyTo, $value);

        return new ConvertResource(
            [
                'currency_from' => $currencyFrom,
                'currency_to' => $currencyTo,
                'value' => $value,
                'converted_value' => $convertedValue,
                'rate' => $convertedValue / $value,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
