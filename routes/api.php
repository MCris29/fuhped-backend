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
Route::get('publications', 'App\\Http\\Controllers\\PublicationController@index');
Route::post('publications', 'App\\Http\\Controllers\\PublicationController@store');
Route::get('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@show');
Route::delete('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@delete');
Route::put('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@update');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('logout', 'App\\Http\\Controllers\\UserController@logout');

    //Partners
    Route::get('partners', 'App\\Http\\Controllers\\PartnerController@index');

    //Afiliates
    Route::get('afiliates', 'App\\Http\\Controllers\\AfiliateController@index');

    //Publications

});
