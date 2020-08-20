<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::get("personas", "PersonaController@listPerson");
Route::post("personas/create", "PersonaController@createPerson");
Route::post("personas/edit", "PersonaController@editPeson");
Route::post("personas/{id}", "PersonaController@findPerson");
Route::post("personas/delete/{id}", "PersonaController@deletePerson");
