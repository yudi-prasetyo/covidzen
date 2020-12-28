<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['name', 'username', 'password', 'asal_provinsi', 'jenis_kelamin'];

    public function getAllUsers() {
        return $this->findAll();
    }
    
    public function getUserById($id) {
        return $this->where(['id' => $id])->first();
    }

    public function getUserByName($username) {
        return $this->where(['username' => $username])->first();
    }
}