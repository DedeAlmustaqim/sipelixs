<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuth extends BaseController
{




    public function index()
    {
        $data = [
            'title' => 'Admin Login'
        ];
        return view('auth/admin/login', $data);
    }

    public function login()
    {
        $adminModel = new AdminModel();

        $admin = $adminModel
            ->where('username', $this->request->getVar('username'))

            ->first();
        if ($admin) {
            if (password_verify($this->request->getVar('password'), $admin['password'])) {

                session()->set('masuk', true);
                session()->set('login', true);
                session()->set('id', $admin['id']);
                session()->set('akses', $admin['id_akses']);
                session()->set('name', $admin['nama']);
                session()->set('email', $admin['email']);
                if ($admin['id_akses'] == 1) {
                    return redirect('admin/dashboard');
                } else if ($admin['id_akses'] == 2) {
                    return redirect('skpd/dashboard');
                }
            } else {
                return redirect('admin');
            }
        } else {
            return redirect('admin');
        }
    }
    function logout()
    {
        session()->destroy();
        return redirect('/');
    }
}
