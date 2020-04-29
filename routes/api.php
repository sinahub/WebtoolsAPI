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

Route::get('organisations', 'OrganisationController@getAllOrganisations');
Route::get('organisations/{id}', 'OrganisationController@getOrganisation');
Route::post('organisations', 'OrganisationController@createOrganisation');
Route::put('organisations/{id}', 'OrganisationController@updateOrganisation');
Route::delete('organisations/{id}','OrganisationController@deleteOrganisation');