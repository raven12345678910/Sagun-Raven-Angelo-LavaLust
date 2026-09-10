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

    public function create()
    {
        $this->call->view('UserCreate');
    }

    public function store()
    {
        $this->call->model('UserModel');

        $data = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'contact'   => $_POST['contact']
        ];

        $this->UserModel->create($data);

        header('Location: /login');
        exit;
    }

    public function edit($id)
    {
        $this->call->model('UserModel');

        $user = $this->UserModel->getById($id);

        $data = [
            'user' => $user
        ];

        $this->call->view('UserEdit', $data);
    }

    public function update($id)
    {
        $this->call->model('UserModel');

        $data = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'contact'   => $_POST['contact']
        ];

        $this->UserModel->update($id, $data);

       header('Location: /users');
        exit;
    }

    public function delete($id)
    {
        $this->call->model('UserModel');

        $this->UserModel->delete($id);

        header('Location: /LavaLust/users');
        exit;
    }
}
