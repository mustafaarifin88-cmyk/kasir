<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Edit Profil',
            'user'  => $this->userModel->find(session()->get('id'))
        ];
        return view('kasir/profile', $data);
    }

    public function update()
    {
        $id = session()->get('id');
        $data = [];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->isValid() && ! $fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/kasir', $namaFoto);
            $data['foto'] = $namaFoto;
            session()->set('foto', $namaFoto);
        }

        if (!empty($data)) {
            $this->userModel->update($id, $data);
        }

        return redirect()->to(base_url('kasir/profile'))->with('success', 'Profil berhasil diupdate');
    }
}