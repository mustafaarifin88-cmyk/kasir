<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CabangModel;

class Cabang extends BaseController
{
    protected $cabangModel;

    public function __construct()
    {
        $this->cabangModel = new CabangModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Cabang Toko',
            'cabang' => $this->cabangModel->findAll()
        ];
        return view('admin/cabang', $data);
    }

    public function save()
    {
        $this->cabangModel->save([
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'alamat'      => $this->request->getPost('alamat'),
        ]);

        return redirect()->to(base_url('admin/cabang'))->with('success', 'Cabang berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->cabangModel->update($id, [
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'alamat'      => $this->request->getPost('alamat'),
        ]);

        return redirect()->to(base_url('admin/cabang'))->with('success', 'Cabang berhasil diupdate');
    }

    public function delete($id)
    {
        $this->cabangModel->delete($id);
        return redirect()->to(base_url('admin/cabang'))->with('success', 'Cabang berhasil dihapus');
    }
}