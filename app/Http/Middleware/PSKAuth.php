<?php

namespace App\Http\Middleware;

use App\Exceptions\PskAuthErrorException;
use Closure;

class PSKAuth
{
    public function handle($request, Closure $next)
    {
        /**
         * Проверять на валидность символов токена особого смысла нет, максимум - отрезать первые 64 символа
         */
        if (substr($request->bearerToken(), 0, 64) === (string)env('API_TOKEN')) {
            return $next($request);
        }

        throw new PskAuthErrorException();
    }

}
