<?php

namespace App\Models;

use CodeIgniter\Model;

class PersentaseModel extends Model
{
    protected $table            = 'persentase';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nilai_persentase'];
}