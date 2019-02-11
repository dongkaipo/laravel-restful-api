<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => ['bindings', 'cors']], function ($api) {


    # 测试类接口
    if (env('API_DEBUG')) {
        $api->get('/test/welcome', 'App\Http\Controllers\TestController@welcome');
    }


    $api->group(['middleware' => ['auth:api']], function ($api) {

    });


});
