<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class AdminMiddleware
{
    public function handle($next)
    {
        // Check kung naka-login
        if (!isset($_SESSION['user'])) {
            header('Location: /LavaLust/login');
            exit;
        }

        // Check kung admin
        if (($_SESSION['user']['role'] ?? '') !== 'admin') {
            header('Location: /LavaLust/users');
            exit;
        }

        return $next();
    }
}