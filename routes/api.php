<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/show/{id}', 'ProductController@show')->name('show');
    Route::post('/update/{id}', 'ProductController@update')->name('update');
    Route::post('/store', 'ProductController@store')->name('store');
    Route::post('/delete/{id}', 'ProductController@destroy')->name('delete');

    Route::get('/task1', 'UserController@task1')->name('task1');
    Route::get('/task2', 'UserController@task2')->name('task2');

    Route::get('/sqlRefactoring', 'OrderController@getorder')->name('sqlRefactoring');


});
