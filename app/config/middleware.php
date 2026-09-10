<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Adding of middlewares
|--------------------------------------------------------------------------
|
| Used for adding middlewares
|
*/

require_once APP_DIR . 'middlewares/AuthMiddleware.php';
require_once APP_DIR . 'middlewares/AdminMiddleware.php';

$config['middlewares'] = [
    'auth'  => new AuthMiddleware(),
    'admin' => new AdminMiddleware()
];