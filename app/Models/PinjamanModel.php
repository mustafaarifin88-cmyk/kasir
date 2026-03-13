<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
    protected $table            = 'pinjaman';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal', 'id_karyawan', 'jumlah_pinjaman', 'created_at'];
}