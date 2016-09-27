<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group(['middleware' => 'cors'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('books', 'BooksController@index');

    Route::post('add', 'BooksController@add');

    Route::post('remove', 'BooksController@remove');
});


/*
 * composer require barryvdh/laravel-cors
 * https://github.com/igor-ribeiro/orkisapi/blob/master/app/Http/Kernel.php#L51
 * https://github.com/igor-ribeiro/orkisapi/blob/master/config/app.php#L156
 *
 *
 *
 */