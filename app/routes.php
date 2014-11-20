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
    if(!Session::has("word")) Session::put('word',file_get_contents("http://randomword.setgetgo.com/get.php"));
    return View::make('home');
});

Route::get("/generateword",function(){
     Session::put('word',file_get_contents("http://randomword.setgetgo.com/get.php"));
    return Redirect::back();
});
