<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('\App\Http\Controllers\Api\V1')
    ->middleware(['auth.pks'])
    ->prefix('v1')->group(
        static function (Router $router) {
            $router->get('rates', 'RatesController@index');
            $router->post('convert', 'ConvertController@convert');
        }
    );

//Route::get('/v1/', function (Request $request) {
//    return '123';
//});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
