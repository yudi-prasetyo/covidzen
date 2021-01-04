<?php namespace App\Models;

use CodeIgniter\Model;

class TraceModel extends Model {
    protected $table = 'tracing_history';
    protected $allowedFields = ['user_id', 'latlng', 'created_at'];
    
    public function insertData($loc_data)
    {
        $builder = $this->db->table($this->table);

        $builder->insert($loc_data);
    }

    public function getAllData() {
        $id = session()->get('id');
        
        return $this->select('*')
                    ->where(['user_id' => $id])
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}