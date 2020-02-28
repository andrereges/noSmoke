<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('pacientes', 'API\PacienteController')->names([
    'create' => 'pacientes.create'
]);

Route::resource('planos', 'API\PlanoController')->names([
    'create' => 'planos.create'
]);

Route::resource('acoes', 'API\AcaoController')->names([
    'create' => 'acoes.create'
]);

Route::resource('entrevistas', 'API\EntrevistaController')->names([
    'create' => 'entrevistas.create'
]);

Route::resource('perguntas', 'API\PerguntaController')->names([
    'create' => 'perguntas.create'
]);

Route::resource('cigarro-marcas', 'API\CigarroMarcaController')->names([
    'create' => 'cigarroMarcas.create'
]);