<?php

namespace App\Models;

use CodeIgniter\Model;

class Atendimentos extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atendimentos';
    protected $primaryKey       = 'id_atendimento';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'localizacao',
        'ip',
        'profissao_usuario'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'data_hora';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [
        'localizacao' => [
            'label' => 'Localização',
            'rules' => 'required'
        ],
        'ip' => [
            'rules' => 'required|is_unique[atendimentos.ip]'
        ],
        'profissao_usuario' => [
            'label' => 'Profissão do usuário',
            'rules' => 'required'
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
