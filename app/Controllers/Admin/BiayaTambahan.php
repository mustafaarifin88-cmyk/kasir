<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BiayaTambahanModel;

class BiayaTambahan extends BaseController
{
    protected $biayaTambahanModel;

    public function __construct()
    {
        $this->biayaTambahanModel = new BiayaTambahanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Biaya Tambahan',
            'biaya' => $this->biayaTambahanModel->findAll()
        ];
        return view('admin/biaya_tambahan', $data);
    }

    public function save()
    {
        $this->biayaTambahanModel->save([
            'nama_biaya' => $this->request->getPost('nama_biaya'),
            'harga'      => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/biayatambahan'))->with('success', 'Biaya Tambahan berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->biayaTambahanModel->update($id, [
            'nama_biaya' => $this->request->getPost('nama_biaya'),
            'harga'      => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/biayatambahan'))->with('success', 'Biaya Tambahan berhasil diupdate');
    }

    public function delete($id)
    {
        $this->biayaTambahanModel->delete($id);
        return redirect()->to(base_url('admin/biayatambahan'))->with('success', 'Biaya Tambahan berhasil dihapus');
    }
}