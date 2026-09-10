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
            'contact'   => $_POST['contact'],
            'role'      => 'user'
        ];

        $this->UserModel->create($data);

        header('Location: /LavaLust/users');
        exit;
    }

    // SHOW EDIT FORM
    public function edit($id)
    {
        $this->call->model('UserModel');

        $user = $this->UserModel->getById($id);

        $data = [
            'user' => $user
        ];

        $this->call->view('UserEdit', $data);
    }

    // UPDATE USER
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

        header('Location: /LavaLust/users');
        exit;
    }

    // DELETE USER
    public function delete($id)
    {
        $this->call->model('UserModel');

        $this->UserModel->delete($id);

        header('Location: /LavaLust/users');
        exit;
    }
}
