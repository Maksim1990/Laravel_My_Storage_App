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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/norights',function(){
    return view('includes.norights');
});



Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

//Route::get('login/{social}', 'Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::group(['middleware'=>'admin'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users','UserController');
    Route::resource('/books','BookController');
    Route::resource('/photos','PhotoController');


    Route::get('importExport', 'MaatwebsiteDemoController@importExport');
    Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
    Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

    Route::post('/filter_book_list','BookController@filterBookList');
    Route::get('/upload_images/{id}','PhotoController@uploadMultipleImages');

});

