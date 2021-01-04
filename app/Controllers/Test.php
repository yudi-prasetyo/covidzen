<?php namespace App\Controllers;

use App\Models\TestModel;

class Test extends BaseController
{
    protected $test_model;

    public function __construct()
    {
        $this->test_model = new TestModel();
    }

	public function postData()
	{
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'test_type' => 'required',
            'result' => 'required'
        ]))) {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'user_id' => session()->get('id'),
                'test_type' => $this->request->getVar('test_type'),
                'result' => $this->request->getVar('result'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->test_model->insertData($data);

            return redirect()->to('/');
        }
    }
    
    public function showTestHistory() {
        $data = $this->test_model->getAllData();

        echo json_encode($data);
    }
}