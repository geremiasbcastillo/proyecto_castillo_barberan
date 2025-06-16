<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_ventas_model extends Model
{
    protected $table = 'detalle_ventas';
    protected $primaryKey = 'id_detalle';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['venta_id', 'producto_id', 'detalle_cantidad', 'detalle_precio'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];
} 