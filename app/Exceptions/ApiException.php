<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class ApiException extends Exception implements ApiExceptionContract
{
    public function render(Request $request)
    {
        return (new JsonResponse(
            $this->getApiResponseData()
        ))->setStatusCode($this->getCode());
    }

    /**
     * Возвращает данные для ответа
     * @return array
     */
    public function getApiResponseData(): array
    {
        return [
            'status' => 'error',
            'code' => $this->getCode(),
            'message' => $this->getMessage()
        ];
    }
}
