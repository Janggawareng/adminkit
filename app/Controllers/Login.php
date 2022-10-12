<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->user = new \App\Models\UserModel();
    }

    public function auth()
    {
        $username = $this->get['username'];
        $password = $this->get['password'];

        $check_user = $this->user->where('username', $username)->first();

        // Check Username
        if (!$check_user) {
            session()->setFlashdata('false', 'username not found.');
            return redirect()->to('/');
        }

        // Check Password
        if ($check_user['password'] != $password) {
            session()->setFlashdata('false', 'wrong password.');
            return redirect()->to('/');
        }

        // Check ID Aktif
        if ($check_user['status_user'] != 'Aktif') {
            session()->setFlashdata('false', 'user is no longer active.');
            return redirect()->to('/');
        }

        // Landing Page Admin
        if ($check_user['id_app'] == 1) {

            $data_ses =
                [
                    'administrator' => true,
                    'user' => $check_user,
                ];

            $this->session->set($data_ses);

            session()->setFlashdata('true', 'welcome back my Boss.');
            return redirect()->to('/admin');
        }

        session()->setFlashdata('false', 'data not found.');
        return redirect()->to('/');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}
