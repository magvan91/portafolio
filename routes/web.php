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
/*use App\User;
Route::get('create_user',function() {
    $usuario = new User;

    $usuario->name = 'Marco';
    $usuario->password = Hash::make('admin');
    $usuario->email = 'mag.van.gam@gmail.com';
    $usuario->save();

});*/

Route::get('/',"HomeController@index");

Route::middleware(['ajax'])->group(function () {
    Route::get('/skills',"SkillsController@info");
    Route::get('/profiles',"ProfilesController@profiles");
    Route::get('/jobs',"JobsController@jobs");
});


Route::prefix('admin')->group(function () {
    Route::get('login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('login','Auth\LoginController@showLoginForm');
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::get('/','CrudMainController@index');
});

Auth::routes();
Route::resource('crudskills','CrudSkillsController');
Route::resource('crudprofile','CrudProfilesController');
