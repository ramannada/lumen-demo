<?php

use App\Http\Middleware;


// user router
$router->get('api/user', ['middleware' => 'auth', 'uses' => 'UserController@all']);

$router->get('api/user/{id}', 'UserController@get');

$router->post('api/user', 'UserController@add');

$router->put('api/user', 'UserController@put');

$router->delete('api/user', "UserController@remove");


// post router
$router->post('api/post', 'PostController@add');

$router->get('api/post', 'PostController@all');

$router->get('api/post/{id}', 'PostController@get');

$router->put('api/post', 'PostController@put');

$router->delete('api/post', 'PostController@remove');


// comment router
$router->post('api/comment', 'CommentController@add');

$router->get('api/comment', 'CommentController@all');

$router->get('api/comment/{id}', 'CommentController@get');

$router->put('api/comment', 'CommentController@updateWithVerification');

$router->delete('api/comment', 'CommentController@remove');
