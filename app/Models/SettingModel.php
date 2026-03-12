<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'setting';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_barbershop', 'nama_pimpinan', 'alamat', 'logo'];
}