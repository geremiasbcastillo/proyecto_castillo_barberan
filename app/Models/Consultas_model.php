<?php

namespace App\Models;

use CodeIgniter\Model;

class Consultas_model extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_mensaje';
    
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['nombre_mensaje', 'telefono_mensaje', 'correo_mensaje', 'consulta_mensaje'];
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [
        /*'nombre' => 'required|min_length[3]|max_length[50]',
        'email' => 'required|valid_email',
        'consulta' => 'required|min_length[10]|max_length[500]', */
    ];
}