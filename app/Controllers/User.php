<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController {
    protected $user_model;

    public function __construct() {
        $this->user_model = new UserModel();
    }

    public function profile($id) {
        $data['user'] = $this->user_model->getUserById($id, false);

        echo view('profile', $data);
    }

    public function save() {
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
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
                        'jenis_kelamin' => $this->request->getVar('jenis_kelamin')
                    ]);
        
                    return redirect()->to('/login');
                } else {
                    session()->setFlashdata('msg', 'Password does not match');
                    return redirect()->to('/register');
                }
            } else {
                session()->setFlashdata('msg', 'Username already used');
                return redirect()->to('/register');
            }
        }
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
                if (password_verify($password, $data['password'])) {
                    $session = session();
                    $data_login = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'logged_in' => TRUE
                    ];

                    $session->set($data_login);
                    
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('msg', 'Wrong password');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('msg', 'Username not found');
                return redirect()->to('/login');
            }
        }
    }

    public function update() {
        $id = session()->get('id');
        if (($this->request->getMethod() === 'post') && ($this->validate([
            'name' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required'
        ]))) {
            $username = $this->request->getVar('username');
            $temp = $this->user_model->getUserByName($username);

            if ((($temp) && ($temp['id'] === $id)) || (!$temp)) {
                $this->user_model->save([
                    'id' => $id,
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin')
                ]);
                return redirect()->to("/profile/$id");
            } else {
                session()->setFlashdata('msg', 'Username already used');
                return redirect()->to("/edit/$id");
            }
        } else {
            return view('/');
        }
    }

    public function changeProfilePic()
    {
        $id = session()->get('id');

        if ($file = $this->request->getFile('profile-pic')) {
            $file->move(ROOTPATH . 'public/profile-pic', "$id.jpg");
        }

        return redirect()->to("/profile/$id");
    }

    public function edit($id) {
        $data['user'] = $this->user_model->getUserById($id, false);

        // print_r($data['user']);
        return view('edit', $data);
    }
}