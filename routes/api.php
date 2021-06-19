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

Route::post('login', 'App\\Http\\Controllers\\UserController@authenticate');
Route::post('login_afiliate', 'App\\Http\\Controllers\\AfiliateController@authenticate');
Route::post('login_partner', 'App\\Http\\Controllers\\PartnerController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
});
