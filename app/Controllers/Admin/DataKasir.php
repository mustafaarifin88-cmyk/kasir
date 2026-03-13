<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DataKasir extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kasir',
            'kasir' => $this->userModel->where('role', 'kasir')->findAll()
        ];
        return view('admin/data_kasir', $data);
    }

    public function save()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'default.png';

        if ($fileFoto->isValid() && ! $fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/kasir', $namaFoto);
        }

        $this->userModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'kasir',
            'foto'         => $namaFoto
        ]);

        return redirect()->to(base_url('admin/datakasir'))->with('success', 'Kasir berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->isValid() && ! $fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/kasir', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $this->userModel->update($id, $data);

        return redirect()->to(base_url('admin/datakasir'))->with('success', 'Kasir berhasil diupdate');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/datakasir'))->with('success', 'Kasir berhasil dihapus');
    }
}