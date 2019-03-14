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
Route::get('/',"SkillsController@index");
Route::get('/skills',"SkillsController@info");

Route::get('/test',function(){
  $data = Skills::all();
  dd($data);
});
