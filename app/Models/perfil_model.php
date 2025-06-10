<?php

namespace App\Models;

use CodeIgniter\Model;

class Perfil_model extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['perfil_descripcion'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];
} 
    