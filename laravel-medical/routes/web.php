<?php

use Illuminate\Support\Facades\Route;


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



Auth::routes();

Route::middleware(['auth'])->group(function (){

	Route::get('/index', 'ContactController@index');

	Route::get('/', 'ContactController@index');


	// DOCUMENTS CONTROLLER

	Route::prefix('documents')->group(function () {

		Route::get('/', 'DocumentController@index');

		Route::post('/', 'DocumentController@create');
	
		Route::post('/send/', 'DocumentController@send');

	});

	Route::prefix('products')->group(function(){

		Route::get('/','ProductController@index');

	});
	
});


Route::prefix('documents')->group(function(){

	Route::get('/get/{fileName}', 'DocumentController@downloadFile');

});


