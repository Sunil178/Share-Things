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

$router->get('login', [ 'uses' => 'UserController@login', 'as' => 'auth.index' ]);
$router->post('login', [ 'uses' => 'UserController@authenticate', 'as' => 'auth.authenticate' ]);

$router->group(['prefix' => 'thing', 'middleware' => 'auth'], function () use ($router) {
    $router->get('', [ 'uses' => 'ThingController@index', 'as' => 'thing.index' ]);
    $router->get('show/{id}', [ 'uses' => 'ThingController@show', 'as' => 'thing.show' ]);
    $router->get('create', [ 'uses' => 'ThingController@create', 'as' => 'thing.create' ]);
    $router->post('store', [ 'uses' => 'ThingController@store', 'as' => 'thing.store' ]);
    $router->get('edit/{id}', [ 'uses' => 'ThingController@edit', 'as' => 'thing.edit' ]);
    $router->put('update/{id}', [ 'uses' => 'ThingController@update', 'as' => 'thing.update' ]);
    $router->delete('delete/{id}', [ 'uses' => 'ThingController@destroy', 'as' => 'thing.destroy' ]);
});

