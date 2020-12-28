<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController {
    protected $user_model;

    public function __construct() {
        $this->user_model = new UserModel();
    }

    public function profile($id) {
        $data['user'] = $this->user_model->getUserById($id);

        echo view('profile', $data);
    }
    
    // public function create() {
    //     return view('user/create');
    // }

    public function save() {
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'asal_provinsi' => 'required',
            'jenis_kelamin' => 'required'
        ]))) {
            $username = $this->request->getVar('username');
            
            if ($this->user_model->getUserByName($username) === NULL) {
                $password = $this->request->getVar('password');
                $password2 = $this->request->getVar('password2');
                if ($password === $password2) {
                    $this->user_model->save([
                        'name' => $this->request->getVar('name'),
                        'username' => $this->request->getVar('username'),
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'asal_provinsi' => $this->request->getVar('asal_provinsi'),
                        'jenis_kelamin' => $this->request->getVar('jenis_kelamin')
                    ]);
        
                    return redirect()->to('/login');
                }
            }
        }
        return view('register');
    }

    public function login_verify() {
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'username' => 'required',
            'password' => 'required'
        ]))) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $this->user_model->getUserByName($username);
            if ($data) {
                // $password = $this->request->getVar('password');
                // $password2 = $this->request->getVar('password2');
                if (password_verify($password, $data['password'])) {
                    // $this->user_model->save([
                    //     'name' => $this->request->getVar('name'),
                    //     'username' => $this->request->getVar('username'),
                    //     'password' => password_hash($password, PASSWORD_DEFAULT),
                    //     'asal_provinsi' => $this->request->getVar('asal_provinsi'),
                    //     'jenis_kelamin' => $this->request->getVar('jenis_kelamin')
                    // ]);
                    $session = \Config\Services::session();
                    $data_login = [
                        'id' => $data['id'],
                        'logged_in' => TRUE
                    ];

                    $session->set($data_login);
                    
                    // print_r($session->get('id'));
                    return redirect()->to('/');
                }
            }
        }
        // return view('register');
    }

    public function update($id) {
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'asal_provinsi' => 'required',
            'jenis_kelamin' => 'required'
        ]))) {
            $this->user_model->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'asal_provinsi' => $this->request->getVar('asal_provinsi'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin')
            ]);

            return redirect()->to('/');
        } else {
            return view('/');
        }
    }

    // public function delete($id) {
    //     $this->dosen_model->delete($id);

    //     return redirect()->to('/dosen');
    // }

    public function edit($id) {
        $data['user'] = $this->user_model->getUserById($id);

        return view('edit', $data);
    }
}