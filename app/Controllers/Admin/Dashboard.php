<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\CabangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $karyawanModel  = new KaryawanModel();
        $cabangModel    = new CabangModel();
        $transaksiModel = new TransaksiModel();
        $userModel      = new UserModel();

        // Mengambil data transaksi khusus hari ini
        $hariIni = date('Y-m-d');
        $transaksiHariIni = $transaksiModel->where('tanggal', $hariIni)->findAll();
        
        // Menjumlahkan total pendapatan hari ini
        $pendapatanHariIni = array_sum(array_column($transaksiHariIni, 'total_pendapatan'));

        $data = [
            'title'               => 'Dashboard Admin',
            'total_karyawan'      => $karyawanModel->countAllResults(),
            'total_cabang'        => $cabangModel->countAllResults(),
            'total_kasir'         => $userModel->where('role', 'kasir')->countAllResults(),
            'total_transaksi'     => count($transaksiHariIni),
            'pendapatan_hari_ini' => $pendapatanHariIni
        ];

        return view('admin/dashboard', $data);
    }
}