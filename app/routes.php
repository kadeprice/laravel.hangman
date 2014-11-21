<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    if(!Session::has("word")) Words::get ();
    return View::make('home');
});

Route::get("/generateword",function(){
    Words::get ();
    return Redirect::to("/");
});

Route::post('guess/{guess}','WordController@guess');
