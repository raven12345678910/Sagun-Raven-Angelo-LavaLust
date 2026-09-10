<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|-------------------------------------------------------------------
| URI ROUTING
|-------------------------------------------------------------------
*/

$router->get('users', 'UserController::index')
       ->middleware('auth');

$router->get('users/create', 'UserController::create')
       ->middleware(['auth', 'admin']);

$router->post('users/store', 'UserController::store')
       ->middleware(['auth', 'admin']);

$router->get('users/edit/{id}', 'UserController::edit')
       ->middleware(['auth', 'admin']);

$router->post('users/update/{id}', 'UserController::update')
       ->middleware(['auth', 'admin']);

$router->get('users/delete/{id}', 'UserController::delete')
       ->middleware(['auth', 'admin']);


/*
|-------------------------------------------------------------------
| LOGIN
|-------------------------------------------------------------------
*/

$router->get('login', 'LoginController::index');

$router->post('login', 'LoginController::login');


/*
|-------------------------------------------------------------------
| LOGOUT
|-------------------------------------------------------------------
*/

$router->get('logout', 'LoginController::logout')
       ->middleware('auth');
$router->get('users/view/{id}', 'UserController::view')
       ->middleware('auth');
       
