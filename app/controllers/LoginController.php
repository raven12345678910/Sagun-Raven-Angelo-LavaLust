<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class LoginController extends Controller
{
    public function index()
    {
        $this->call->view('Login');
    }

    public function login()
    {
        $this->call->model('UserModel');

        $email = trim($_POST['email'] ?? '');

        // Hanapin ang user gamit ang email
        $user = $this->UserModel->getByEmail($email);

        // Kapag nakita ang email
        if ($user) {

            $_SESSION['user'] = [
                'id'        => $user['id'],
                'firstname' => $user['firstname'],
                'lastname'  => $user['lastname'],
                'email'     => $user['email'],
                'role'      => $user['role']
            ];

            // Redirect sa Users page
            header('Location: /LavaLust/users');
            exit;
        }

        // Kapag walang nahanap na email
        $data = [
            'error' => 'Email not found.'
        ];

        $this->call->view('Login', $data);
    }

    public function logout()
    {
        unset($_SESSION['user']);

        session_destroy();

        header('Location: /LavaLust/login');
        exit;
    }
}