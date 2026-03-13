<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\PinjamanModel;
use App\Models\KaryawanModel;
use App\Models\SettingModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $transaksiModel;
    protected $pinjamanModel;
    protected $karyawanModel;
    protected $settingModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->pinjamanModel  = new PinjamanModel();
        $this->karyawanModel  = new KaryawanModel();
        $this->settingModel   = new SettingModel();
    }

    public function index()
    {
        $id_karyawan = $this->request->getGet('id_karyawan');
        $start_date  = $this->request->getGet('start_date');
        $end_date    = $this->request->getGet('end_date');

        $transaksi = $this->transaksiModel->select('transaksi.*, karyawan.nama_lengkap, varian_harga.nama_varian, biaya_tambahan.nama_biaya')
                                          ->join('karyawan', 'karyawan.id = transaksi.id_karyawan')
                                          ->join('varian_harga', 'varian_harga.id = transaksi.id_varian')
                                          ->join('biaya_tambahan', 'biaya_tambahan.id = transaksi.id_biaya_tambahan', 'left');

        $pinjaman = $this->pinjamanModel->select('pinjaman.*, karyawan.nama_lengkap')
                                        ->join('karyawan', 'karyawan.id = pinjaman.id_karyawan');

        if ($id_karyawan) {
            $transaksi->where('transaksi.id_karyawan', $id_karyawan);
            $pinjaman->where('pinjaman.id_karyawan', $id_karyawan);
        }
        if ($start_date && $end_date) {
            $transaksi->where('transaksi.tanggal >=', $start_date)->where('transaksi.tanggal <=', $end_date);
            $pinjaman->where('pinjaman.tanggal >=', $start_date)->where('pinjaman.tanggal <=', $end_date);
        }

        $data = [
            'title'       => 'Laporan Gajian',
            'karyawan'    => $this->karyawanModel->findAll(),
            'transaksi'   => $transaksi->findAll(),
            'pinjaman'    => $pinjaman->findAll(),
            'id_karyawan' => $id_karyawan,
            'start_date'  => $start_date,
            'end_date'    => $end_date
        ];

        return view('kasir/laporan', $data);
    }

    public function cetakPdf()
    {
        $id_karyawan = $this->request->getGet('id_karyawan');
        $start_date  = $this->request->getGet('start_date');
        $end_date    = $this->request->getGet('end_date');

        $transaksi = $this->transaksiModel->select('transaksi.*, karyawan.nama_lengkap, varian_harga.nama_varian, biaya_tambahan.nama_biaya')
                                          ->join('karyawan', 'karyawan.id = transaksi.id_karyawan')
                                          ->join('varian_harga', 'varian_harga.id = transaksi.id_varian')
                                          ->join('biaya_tambahan', 'biaya_tambahan.id = transaksi.id_biaya_tambahan', 'left');

        $pinjaman = $this->pinjamanModel->select('pinjaman.*, karyawan.nama_lengkap')
                                        ->join('karyawan', 'karyawan.id = pinjaman.id_karyawan');

        if ($id_karyawan) {
            $transaksi->where('transaksi.id_karyawan', $id_karyawan);
            $pinjaman->where('pinjaman.id_karyawan', $id_karyawan);
        }
        if ($start_date && $end_date) {
            $transaksi->where('transaksi.tanggal >=', $start_date)->where('transaksi.tanggal <=', $end_date);
            $pinjaman->where('pinjaman.tanggal >=', $start_date)->where('pinjaman.tanggal <=', $end_date);
        }

        $data = [
            'setting'   => $this->settingModel->first(),
            'transaksi' => $transaksi->findAll(),
            'pinjaman'  => $pinjaman->findAll(),
            'start_date'=> $start_date,
            'end_date'  => $end_date
        ];

        $html = view('admin/cetak_pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan_Gajian_Kasir.pdf', ['Attachment' => false]);
    }
}