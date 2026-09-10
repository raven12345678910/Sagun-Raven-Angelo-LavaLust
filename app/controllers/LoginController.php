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

        // Kunin lahat ng users
        $users = $this->UserModel->getAll();

        $user = null;

        // Hanapin ang email
        foreach ($users as $row) {

            if (strcasecmp(trim($row['email']), $email) === 0) {
                $user = $row;
                break;
            }
        }

        // Kapag nakita ang user
        if ($user) {

            $_SESSION['user'] = [
                'id'        => $user['id'],
                'firstname' => $user['firstname'],
                'lastname'  => $user['lastname'],
                'email'     => $user['email'],
                'role'      => $user['role']
            ];

            // Redirect sa Users
            header('Location: /LavaLust/users');
            exit;
        }

        // Kapag hindi nakita ang email
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