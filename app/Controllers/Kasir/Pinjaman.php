<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\PinjamanModel;
use App\Models\KaryawanModel;

class Pinjaman extends BaseController
{
    protected $pinjamanModel;
    protected $karyawanModel;

    public function __construct()
    {
        $this->pinjamanModel = new PinjamanModel();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Pinjaman Karyawan',
            'pinjaman' => $this->pinjamanModel->select('pinjaman.*, karyawan.nama_lengkap')
                                              ->join('karyawan', 'karyawan.id = pinjaman.id_karyawan')
                                              ->findAll(),
            'karyawan' => $this->karyawanModel->findAll()
        ];
        return view('kasir/pinjaman', $data);
    }

    public function save()
    {
        $this->pinjamanModel->save([
            'tanggal'         => $this->request->getPost('tanggal'),
            'id_karyawan'     => $this->request->getPost('id_karyawan'),
            'jumlah_pinjaman' => $this->request->getPost('jumlah_pinjaman')
        ]);

        return redirect()->to(base_url('kasir/pinjaman'))->with('success', 'Pinjaman berhasil dicatat');
    }

    public function update($id)
    {
        $this->pinjamanModel->update($id, [
            'tanggal'         => $this->request->getPost('tanggal'),
            'id_karyawan'     => $this->request->getPost('id_karyawan'),
            'jumlah_pinjaman' => $this->request->getPost('jumlah_pinjaman')
        ]);

        return redirect()->to(base_url('kasir/pinjaman'))->with('success', 'Pinjaman berhasil diupdate');
    }

    public function delete($id)
    {
        $this->pinjamanModel->delete($id);
        return redirect()->to(base_url('kasir/pinjaman'))->with('success', 'Pinjaman berhasil dihapus');
    }
}