<?php


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return view('welcome');
    });


    Auth::routes();

    Route::get('/norights', function () {
        return view('includes.norights');
    });


    Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
//
    Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

//Route::get('login/{social}', 'Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
    Route::group(['middleware' => 'admin'], function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('/users', 'UserController');
        Route::resource('/books', 'BookController');
        Route::resource('/photos', 'PhotoController');
        Route::resource('/movies', 'MovieController');
        Route::resource('/events', 'EventController');
        Route::resource('/categories', 'CategoryController');
        Route::get('/categories/{id}/{userId}', 'CategoryController@showItemsPerUser');

        Route::post('add_comment', 'CommentController@addComment');


        Route::get('importExport', 'MaatwebsiteDemoController@importExport');
        Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
        Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

        Route::post('/filter_book_list', 'BookController@filterBookList');
        Route::post('/get_book_quantity', 'BookController@getAllBooksQuantity');
        Route::post('/get_movie_quantity', 'MovieController@getAllMoviesQuantity');
        Route::post('/filter_movie_list', 'MovieController@filterMovieList');
        Route::get('/upload_images/{id}/{module_id}', 'PhotoController@uploadMultipleImages');


        Route::get('user/{id}/info', 'InfoController@getUserInfo');

        Route::get('/users/{id}/edit/profile', 'UserController@editProfile');
        Route::get('/users/{id}/edit/password', 'UserController@editPassword');



        Route::get('/search', function () {
            return view('search.search');
        });
        Route::get('/search/books', function () {
            return view('search.searchBooks');
        });

        Route::get('/search/users', function () {
            return view('search.searchUsers');
        });
        Route::get('/search/movies', function () {
            return view('search.searchMovies');
        });

    });

});