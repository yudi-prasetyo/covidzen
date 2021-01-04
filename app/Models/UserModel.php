<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['name', 'username', 'password', 'jenis_kelamin'];

    public function getAllUsers() {
        return $this->findAll();
    }
    
    public function getUserById($id, $pw = true) {
        if ($pw) {
            return $this->where(['id' => $id])->first();
        } else {
            return $this->select(['id', 'name', 'username', 'jenis_kelamin'])
                        ->where(['id' => $id])
                        ->first();
        }
    }

    public function getUserByName($username) {
        return $this->where(['username' => $username])->first();
    }
}