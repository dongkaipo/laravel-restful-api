<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => ['bindings', 'cors']], function ($api) {


    # Only for Debug
    if (env('API_DEBUG')) {
        $api->get('/test/welcome', 'App\Http\Controllers\Test\WelcomeController@welcome');
    }

    # Without auth api
    $api->get('/users', 'App\Http\Controllers\User\UserController@index');
    $api->post('/users', 'App\Http\Controllers\User\UserController@store');
    $api->get('/users/{user}', 'App\Http\Controllers\User\UserController@show')->where('user', '[0-9]+');

    # Require  Auth
    $api->group(['middleware' => ['auth:api']], function ($api) {
        $api->get('/users/my', 'App\Http\Controllers\User\UserController@my');
        $api->put('/users/{user}', 'App\Http\Controllers\User\UserController@update');

    });


});
