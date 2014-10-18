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

Route::get('/', function(){
    if(!Auth::check()){
    	return View::make('main');
    }else{
    	return View::make('dashboard')->with('user', Auth::user());
    }
});

/*
 * Users 
 */
Route::post('/', "UserController@login");
Route::get('logout', "UserController@logout");
Route::post('user/create', 'UserController@create');
Route::get('user/get', 'UserController@get');
Route::post('user/set', 'UserController@set');
Route::post('user/create-new-client', 'UserController@createNewClient');
Route::post('user/check-email', 'UserController@checkEmail');

/*
 * Tasks
 */
Route::controller('tasks', 'TasksController');


/*
 * Company
 */
Route::controller('company', 'CompanyController');
