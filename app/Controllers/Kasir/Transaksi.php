<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\KaryawanModel;
use App\Models\VarianModel;
use App\Models\PersentaseModel;
use App\Models\BiayaTambahanModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $karyawanModel;
    protected $varianModel;
    protected $persentaseModel;
    protected $biayaTambahanModel;

    public function __construct()
    {
        $this->transaksiModel     = new TransaksiModel();
        $this->karyawanModel      = new KaryawanModel();
        $this->varianModel        = new VarianModel();
        $this->persentaseModel    = new PersentaseModel();
        $this->biayaTambahanModel = new BiayaTambahanModel();
    }

    public function index()
    {
        $data = [
            'title'          => 'Aplikasi Kasir',
            'karyawan'       => $this->karyawanModel->findAll(),
            'varian'         => $this->varianModel->findAll(),
            'persentase'     => $this->persentaseModel->findAll(),
            'biaya_tambahan' => $this->biayaTambahanModel->findAll(),
        ];
        return view('kasir/transaksi', $data);
    }

    public function save()
    {
        $id_karyawan       = $this->request->getPost('id_karyawan');
        $id_varian         = $this->request->getPost('id_varian');
        $id_persentase     = $this->request->getPost('id_persentase');
        $id_biaya_tambahan = $this->request->getPost('id_biaya_tambahan');
        
        $varian     = $this->varianModel->find($id_varian);
        $persentase = $this->persentaseModel->find($id_persentase);
        $biaya      = !empty($id_biaya_tambahan) ? $this->biayaTambahanModel->find($id_biaya_tambahan) : null;

        $harga_varian = $varian['harga'];
        $nilai_persen = $persentase['nilai_persentase'] / 100;
        $harga_biaya  = $biaya ? $biaya['harga'] : 0;

        $total_pendapatan = ($harga_varian * $nilai_persen) + ($harga_biaya * $nilai_persen);

        $this->transaksiModel->save([
            'tanggal'           => date('Y-m-d'),
            'id_kasir'          => session()->get('id'),
            'id_karyawan'       => $id_karyawan,
            'id_varian'         => $id_varian,
            'id_persentase'     => $id_persentase,
            'id_biaya_tambahan' => empty($id_biaya_tambahan) ? null : $id_biaya_tambahan,
            'total_pendapatan'  => $total_pendapatan
        ]);

        return redirect()->to(base_url('kasir/transaksi'))->with('success', 'Transaksi berhasil disimpan');
    }
}