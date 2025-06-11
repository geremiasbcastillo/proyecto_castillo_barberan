<?php

namespace App\Models;

use CodeIgniter\Model;

class Productos_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['producto_descripcion', 'producto_nombre', 'producto_categoria', 'producto_precio', 'producto_cantidad'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];
    
}