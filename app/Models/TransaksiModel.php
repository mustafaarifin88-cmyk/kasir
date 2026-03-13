<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal', 'id_kasir', 'id_karyawan', 'id_varian', 'id_persentase', 'id_biaya_tambahan', 'total_pendapatan', 'created_at'];
}