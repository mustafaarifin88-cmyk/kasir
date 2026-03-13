<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DataAdmin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Admin',
            'admins' => $this->userModel->where('role', 'admin')->findAll()
        ];
        return view('admin/data_admin', $data);
    }

    public function save()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'default.png';

        if ($fileFoto->isValid() && ! $fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/admin', $namaFoto);
        }

        $this->userModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'admin',
            'foto'         => $namaFoto
        ]);

        return redirect()->to(base_url('admin/dataadmin'))->with('success', 'Admin berhasil ditambahkan');
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
            $fileFoto->move('uploads/admin', $namaFoto);
            $data['foto'] = $namaFoto;

            if (session()->get('id') == $id) {
                session()->set('foto', $namaFoto);
            }
        }

        if (session()->get('id') == $id) {
            session()->set('nama_lengkap', $data['nama_lengkap']);
        }

        $this->userModel->update($id, $data);

        return redirect()->to(base_url('admin/dataadmin'))->with('success', 'Admin berhasil diupdate');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/dataadmin'))->with('success', 'Admin berhasil dihapus');
    }
}