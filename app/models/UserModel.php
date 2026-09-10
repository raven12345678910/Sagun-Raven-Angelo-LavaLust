<?php

class UserModel
{
    protected $db;

    public function __construct()
    {
        $this->db = load_class('database', 'database');
        $this->db = $this->db::instance('main');
    }

    public function getAll()
    {
        return $this->db
            ->table('users')
            ->get_all();
    }

    public function getById($id)
    {
        return $this->db
            ->table('users')
            ->where('id', $id)
            ->get();
    }

    public function getByEmail($email)
    {
        return $this->db
            ->table('users')
            ->where('email', $email)
            ->get();
    }

    public function create($data)
    {
        return $this->db
            ->table('users')
            ->insert($data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->db
            ->table('users')
            ->where('id', $id)
            ->delete();
    }
}