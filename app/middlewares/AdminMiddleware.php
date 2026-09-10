<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class AdminMiddleware
{
    public function handle($next)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        if (($_SESSION['user']['role'] ?? '') !== 'admin') {
            header('Location: /users');
            exit;
        }

        return $next();
    }
}