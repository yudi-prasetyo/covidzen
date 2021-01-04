<?php namespace App\Controllers;

use App\Models\TraceModel;

class Trace extends BaseController
{
    protected $trace_model;

    public function __construct()
    {
        $this->trace_model = new TraceModel();
    }

	public function postData()
	{
        $lat = $this->request->getPost('lat');
        $lng = $this->request->getPost('lng');

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'user_id' => session()->get('id'),
            'latlng' => $lat . "," . $lng,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->trace_model->insertData($data);

        echo json_encode([
            'latlng' => $data['latlng']
        ]);
    }
    
    public function showTraceHistory() {
        $data = $this->trace_model->getAllData();

        echo json_encode($data);
    }
}
