<?php namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model {
    protected $table = 'test_history';
    protected $allowedFields = ['user_id', 'test_type', 'result', 'created_at'];
    
    public function insertData($data)
    {
        $builder = $this->db->table('test_history');
        // print_r($data);

        $builder->insert($data);
    }

    public function getAllData() {
        $id = session()->get('id');
        
        return $this->select('*')
                    ->where(['user_id' => $id])
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}