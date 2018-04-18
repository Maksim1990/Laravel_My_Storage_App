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


        Route::get('books/list/{idUser?}', [
            'as' => 'books.index',
            'uses' => 'BookController@index'
        ]);
        Route::resource('/books', 'BookController', ['except' => 'index']);
        Route::resource('/photos', 'PhotoController');

        Route::get('movies/list/{idUser?}', [
            'as' => 'movies.index',
            'uses' => 'MovieController@index'
        ]);
        Route::resource('/movies', 'MovieController', ['except' => 'index']);

        Route::resource('/events', 'EventController');
        Route::resource('/profiles', 'ProfileController');
        Route::resource('/categories', 'CategoryController');
        Route::get('/categories/{id}/{userId}', 'CategoryController@showItemsPerUser');
        Route::get('/test', 'BookController@testFunction');
        Route::get('/favorites/{id}', 'FavoriteController@myFavorites');
        Route::get('/comments/{id}', 'CommentController@myComments');
        Route::get('/ratings/{id}', 'RatingController@myRatings');
        Route::get('/statistics', 'HomeController@statistics');


        Route::post('add_comment', 'CommentController@addComment');


        Route::get('import_books_main', 'MaatwebsiteDemoController@importBooksMain');
        Route::get('import_movies_main', 'MaatwebsiteDemoController@importMoviesMain');
        Route::get('downloadExcel_books/{type}', 'MaatwebsiteDemoController@downloadBooks');
        Route::get('downloadExcel_movies/{type}', 'MaatwebsiteDemoController@downloadMovies');
        Route::post('import_books', 'MaatwebsiteDemoController@importBooks');
        Route::post('import_movies', 'MaatwebsiteDemoController@importMovies');
        Route::get('/import_export', function () {
            return view('import.index');
        });


        Route::post('/filter_book_list', 'BookController@filterBookList');
        Route::post('/get_book_quantity', 'BookController@getAllBooksQuantity');
        Route::post('/get_movie_quantity', 'MovieController@getAllMoviesQuantity');
        Route::post('/filter_movie_list', 'MovieController@filterMovieList');
        Route::get('/upload_images/{id}/{module_id}', 'PhotoController@uploadMultipleImages');


        Route::get('user/{id}/info', 'InfoController@getUserInfo');

        Route::get('/users/{id}/edit/profile', 'ProfileController@editProfile');
        Route::get('/users/{id}/edit/password', 'UserController@editPassword');
        Route::get('/users/{id}/edit/image', 'UserController@editImage');
        Route::get('/books/{id}/edit/image', 'BookController@editImage');
        Route::get('/movies/{id}/edit/image', 'MovieController@editImage');
        Route::patch('/users/update/password/{id}','UserController@updatePassword');
        Route::patch('/users/update/image/{id}','UserController@updateImage');
        Route::patch('/books/update/image/{id}','BookController@assignImage');
        Route::patch('/movies/update/image/{id}','MovieController@assignImage');


        Route::post('/delete_image_ajax', 'PhotoController@deleteImage');
        Route::post('/register_rating_ajax', 'RatingController@registerRating');
        Route::post('/show_tutorial_ajax', 'UserController@changeShowTutorialAction');


        Route::post('/delete_multiple_books_ajax', 'BookController@deleteMultipleBooks');
        Route::post('/delete_multiple_movies_ajax', 'MovieController@deleteMultipleMovies');
        Route::post('/add_book_to_favorite_ajax', 'FavoriteController@addBookToFavorite');
        Route::post('/add_movie_to_favorite_ajax', 'FavoriteController@addBookToFavorite');
        Route::post('/delete_books_comment_ajax', 'CommentController@deleteComment');
        Route::post('/delete_movies_comment_ajax', 'CommentController@deleteComment');
        Route::post('/delete_rating_ajax', 'RatingController@deleteRating');
        Route::post('/assign_image_book_ajax', 'BookController@assignImageAjax');
        Route::post('/assign_image_movie_ajax', 'MovieController@assignImageAjax');

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


        Route::get('/guide', function () {
            return view('guide.index');
        });

        Route::get('/plans','SubscriptionController@plans');
        //-- STRIPE block
        Route::post('/register_plan','SubscriptionController@store');
        Route::group(['prefix'=>'subscription','middleware'=>'auth'], function (){

            Route::get('/',[
                'as'=> 'subscription',
                'uses'=>'SubscriptionController@index'
            ]);

            Route::get('/new','SubscriptionController@create');
            Route::get('/cancel','SubscriptionController@cancel');
            Route::get('/resume','SubscriptionController@resume');
            Route::get('/change/{plan}','SubscriptionController@change');

            Route::post(
                'stripe/webhook',
                '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
            );

        });





    });

});