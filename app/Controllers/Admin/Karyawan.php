<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\CabangModel;

class Karyawan extends BaseController
{
    protected $karyawanModel;
    protected $cabangModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->cabangModel = new CabangModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Karyawan',
            'karyawan' => $this->karyawanModel->select('karyawan.*, cabang.nama_cabang')
                                              ->join('cabang', 'cabang.id = karyawan.id_cabang')
                                              ->findAll(),
            'cabang'   => $this->cabangModel->findAll()
        ];
        return view('admin/karyawan', $data);
    }

    public function save()
    {
        $this->karyawanModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'id_cabang'    => $this->request->getPost('id_cabang'),
        ]);

        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->karyawanModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'id_cabang'    => $this->request->getPost('id_cabang'),
        ]);

        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil diupdate');
    }

    public function delete($id)
    {
        $this->karyawanModel->delete($id);
        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil dihapus');
    }
}