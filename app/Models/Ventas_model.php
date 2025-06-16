<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_model extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id_ventas';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['cliente_id', 'venta_fecha'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];
} 