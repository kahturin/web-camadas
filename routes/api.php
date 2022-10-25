<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\ItemdopedidoController;
use App\Http\Controllers\Api\PassportAuthController;

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

/*
    DB_CONNECTION=mysql
    DB_HOST=144.22.231.213
    DB_PORT=3306
    DB_DATABASE=SenacBikeStore
    DB_USERNAME=usuariobike
    DB_PASSWORD=Senac@1976
*/

Route::apiResource('produtos', ProdutoController::class);

//rota para categorias
Route::apiResource('categorias', CategoriaController::class)->middleware('auth:api');

//Rota de segurança para registro de usuário
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('logout', [PassportAuthController::class, 'logout'])->middleware('auth:api');
Route::post('userInfo', [PassportAuthController::class, 'userInfo'])->middleware('auth:api');