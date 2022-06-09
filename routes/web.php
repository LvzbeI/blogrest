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

//ruta raiz
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Controlador para el Login
$router->get('/login/{user}/{pass}', 'AuthController@login');

//proteger el acceso desde la url si no es usuario administrador
$router->group(
    ['middleware' => ['auth', 'cors']],
    function () use ($router) {



        // Ejecutar Controlador USer en la ur: /u (consulta de registros de usuarios)
        $router->get('/usuario', 'UserController@index');  //nombre controlador@nombre de la funcion

        // Buscar usuario por medio de id : /public/u/1
        $router->get('/usuario/{user}', 'UserController@get');

        //Crear usuario nuevo
        $router->post('/usuario', 'UserController@create');

        //Actualizar usuario
        $router->put('/usuario/{user}', 'UserController@update');

        //Eliminar usuario
        $router->delete('/usuario/{user}', 'UserController@destroy');






        $router->get('/topic', 'TopicController@index');
        $router->get('/topic/{id}', 'TopicController@get');
        $router->post('/topic', 'TopicController@create');
        $router->put('/topic/{id}', 'TopicController@update');
        $router->delete('/topic/{id}', 'TopicController@destroy');

        $router->get('/post', 'PostController@index');
        $router->get('/post/{id_topic}', 'PostController@get');
        $router->post('/post', 'PostController@create');
        $router->put('/post/{id}', 'PostController@update');
        $router->delete('/post/{id}', 'PostController@destroy');



        //$router->get('/topic', 'TopicController@destroy');
    }
);
