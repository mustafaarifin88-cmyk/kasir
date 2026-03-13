<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VarianModel;

class Varian extends BaseController
{
    protected $varianModel;

    public function __construct()
    {
        $this->varianModel = new VarianModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Varian Harga',
            'varian' => $this->varianModel->findAll()
        ];
        return view('admin/varian', $data);
    }

    public function save()
    {
        $this->varianModel->save([
            'nama_varian' => $this->request->getPost('nama_varian'),
            'harga'       => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/varian'))->with('success', 'Varian Harga berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->varianModel->update($id, [
            'nama_varian' => $this->request->getPost('nama_varian'),
            'harga'       => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/varian'))->with('success', 'Varian Harga berhasil diupdate');
    }

    public function delete($id)
    {
        $this->varianModel->delete($id);
        return redirect()->to(base_url('admin/varian'))->with('success', 'Varian Harga berhasil dihapus');
    }
}