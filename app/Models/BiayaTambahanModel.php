<?php

namespace App\Models;

use CodeIgniter\Model;

class BiayaTambahanModel extends Model
{
    protected $table            = 'biaya_tambahan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_biaya', 'harga'];
}