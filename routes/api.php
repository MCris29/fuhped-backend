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

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('logout', 'App\\Http\\Controllers\\UserController@logout');

    //Afiliates
    Route::get('afiliates', 'App\\Http\\Controllers\\AfiliateController@index');
    Route::post('afiliates', 'App\\Http\\Controllers\\AfiliateController@store');
    Route::get('afiliates/{afiliate}', 'App\\Http\\Controllers\\AfiliateController@show');
    Route::put('afiliates/{afiliate}', 'App\\Http\\Controllers\\AfiliateController@update');

    //Partners
    Route::get('partners', 'App\\Http\\Controllers\\PartnerController@index');
    Route::post('partners', 'App\\Http\\Controllers\\PartnerController@store');
    Route::get('partners/{partner}', 'App\\Http\\Controllers\\PartnerController@show');
    Route::put('partners/{partner}', 'App\\Http\\Controllers\\PartnerController@update');

    //Publications
    Route::post('publications', 'App\\Http\\Controllers\\PublicationController@store');
    Route::get('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@show');
    Route::delete('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@delete');
    Route::put('publications/{publication}', 'App\\Http\\Controllers\\PublicationController@update');

});
