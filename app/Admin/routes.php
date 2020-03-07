<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('users', UserController::class);
    $router->resource('movies', MovieController::class);
    $router->resource('posts', PostController::class);
    $router->get('manage','ManageController@index');
    $router->post('up_image', 'UploadController@upImage');

});
//Route::group([
//    'prefix'        => config('admin.route.prefix'),
//    'namespace'     => config('admin.route.namespace'),
//],function (Router $router){
//    $router->get('manage', \App\Admin\Controllers\ManageController::class);
//});


