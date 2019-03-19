<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Skills;
Route::get('/',"HomeController@index");

Route::middleware(['ajax'])->group(function () {
    Route::get('/skills',"SkillsController@info");
    Route::get('/profiles',"ProfilesController@profiles");
});
