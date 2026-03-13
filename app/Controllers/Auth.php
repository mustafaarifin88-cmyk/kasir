<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            }
            return redirect()->to(base_url('kasir/dashboard'));
        }
        return view('auth/login');
    }

    public function login()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'           => $user['id'],
                'username'     => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'role'         => $user['role'],
                'foto'         => $user['foto'],
                'isLoggedIn'   => true
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                return redirect()->to(base_url('kasir/dashboard'));
            }
        }

        return redirect()->back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}