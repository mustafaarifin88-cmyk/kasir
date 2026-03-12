<?php

namespace App\Models;

use CodeIgniter\Model;

class VarianModel extends Model
{
    protected $table            = 'varian_harga';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_varian', 'harga'];
}