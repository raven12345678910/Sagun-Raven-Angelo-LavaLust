<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class AuthMiddleware
{
    public function handle($next)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $next();
    }
}