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

        $users = $this->UserModel->getAll();

        $user = null;

        foreach ($users as $row) {

            if (strcasecmp(trim($row['email']), $email) === 0) {
                $user = $row;
                break;
            }
        }

        if ($user) {

            $_SESSION['user'] = [
                'id'        => $user['id'],
                'firstname' => $user['firstname'],
                'lastname'  => $user['lastname'],
                'email'     => $user['email'],
                'username'  => $user['username']
            ];

            header('Location: /users');
            exit;
        }

        $data = [
            'error' => 'Email not found.'
        ];

        $this->call->view('Login', $data);
    }

    public function logout()
    {
        unset($_SESSION['user']);

        session_destroy();

        header('Location: /login');
        exit;
    }
}
?>