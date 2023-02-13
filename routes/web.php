<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// category
$router->get('/category','CategoryController@index');
$router->post('/category','CategoryController@create');
$router->get('/category/{id}','CategoryController@show');
$router->put('/category/{id}','CategoryController@update');
$router->delete('/category/{id}','CategoryController@destroy');

// // product
$router->get('/product','ProductController@index');
$router->post('/product','ProductController@create');
$router->get('/product/{id}','ProductController@show');
$router->put('/product/{id}','ProductController@update');
$router->delete('/product/{id}','ProductController@destroy');

// // image
$router->get('/image','ImageController@index');
$router->post('/image','ImageController@create');
$router->get('/image/{id}','ImageController@show');
$router->put('/image/{id}','ImageController@update');
$router->delete('/image/{id}','ImageController@destroy');