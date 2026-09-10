<?php

class UserController extends Controller
{
    public function index()
    {
        $this->call->model('UserModel');

        $users = $this->UserModel->getAll();

        $data = [
            'users' => $users
        ];

        $this->call->view('Crud', $data);
    }
}