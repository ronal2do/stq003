<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/pessoas', function()
{
    return \Response::json(\App\Pessoas::get());
}]);

Route::get('api/emails', ['middleware' => 'cors', function()
{
    return \Response::json(\App\Pessoas::count()->where('email','!=' '-'));
}]);