<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nombre_usuarios', 'apellido_usuarios', 'correo_usuarios', 'telefono_usuarios', 'contraseña_usuarios', 'dni_usuarios', 'perfil_id', 'persona_estado'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $validationRules = [];
} 