<?php

namespace App\Models;

use CodeIgniter\Model;

class Categorias_model extends Model{

    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['nombre_categoria'];
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];

}