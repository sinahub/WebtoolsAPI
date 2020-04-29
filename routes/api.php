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

Route::get('branches', 'BranchController@getAllBranches');
Route::get('branches/{id}', 'BranchController@getBranch');
Route::post('branches', 'BranchController@createBranch');
Route::put('branches/{id}', 'BranchController@updateBranch');
Route::delete('branches/{id}','BranchController@deleteBranch');

Route::get('staff', 'StaffController@getAllStaff');
Route::get('staff/{id}', 'StaffController@getStaff');
Route::post('staff', 'StaffController@createStaff');
Route::put('staff/{id}', 'StaffController@updateStaff');
Route::delete('staff/{id}','StaffController@deleteStaff');