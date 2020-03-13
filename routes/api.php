<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('throttle:60,1')->prefix('v1')->group(function (){
   Route::get('/articles','Api\PostController@index');
   Route::get('article/{id}', 'Api\PostController@detail')->where(['id'=>'[1-9]{1}[0-9]*']);

});



Route::prefix('auth')->group(function($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
});

Route::middleware('refresh.token')->group(function($router) {
    $router->get('profile','UserController@profile');
});
