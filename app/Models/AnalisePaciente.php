<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalisePaciente extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'analisepacientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_atendimento',
        'idade',
        'sexo',
        'peso',
        'altura',
        'desenv_cefalico',
        'form_olho',
        'form_pescoco',
        'form_coluna',
        'form_mao_pe',
        'form_labio_palato',
        'caracteristica_lingua',
        'desenv_pelo',
        'form_orgao_rep',
        'form_nariz',
        'form_orelha',
        'hist_cardiopatico',
        'idade_materna',
        'idade_paterna',
        'aquisicao_linguagem',
        'atraso_neuropsicomotor',
        'desenv_extremidade'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'fk_atendimento' => [
            'label' => 'Atendimento',
            'rules' => 'required|is_unique[analisepacientes.fk_atendimento]'
        ],
        'fk_paciente' => [
            'label' => 'Paciente',
            'rules' => 'required'
        ],
        'idade' => [
            'label' => "Idade",
            'rules' => 'required'
        ],
        'sexo' => [
            'label' => 'Sexo',
            'rules' => 'required'
        ],
        'peso' => [
            'label' => 'Peso',
            'rules' => 'required'
        ],
        'altura' => [
            'label' => 'Altura',
            'rules' => 'required'
        ],
        'desenv_cefalico' => [
            'label' => 'Desenvolvimento Cefálico',
            'rules' => 'required'
        ],
        'form_olho' => [
            'label' => 'Forma dos Olhos',
            'rules' => 'required'
        ],
        'form_pescoco' => [
            'label' => 'Forma do Pescoço',
            'rules' => 'required'
        ],
        'form_coluna' => [
            'label' => 'Forma da Coluna',
            'rules' => 'required'
        ],
        'form_mao_pe' => [
            'label' => 'Forma das Mãos e Pés',
            'rules' => 'required'
        ],
        'form_labio_palato' => [
            'label' => 'Forma do Lábio e Palato',
            'rules' => 'required'
        ],
        'caracteristica_lingua' => [
            'label' => 'Característica da Língua',
            'rules' => 'required'
        ],
        'desenv_pelo' => [
            'label' => 'Desenvolvimento do Pelo',
            'rules' => 'required'
        ],
        'form_orgao_rep' => [
            'label' => 'Forma dos Órgãos Reprodutivos',
            'rules' => 'required'
        ],
        'form_nariz' => [
            'label' => 'Forma do Nariz',
            'rules' => 'required'
        ],
        'form_orelha' => [
            'label' => 'Forma das Orelhas',
            'rules' => 'required'
        ],
        'hist_cardiopatico' => [
            'label' => 'Histórico Cardiopático',
            'rules' => 'required'
        ],
        'idade_materna' => [
            'label' => 'Idade Materna',
            'rules' => 'required'
        ],
        'idade_paterna' => [
            'label' => 'Idade Paterna',
            'rules' => 'required'
        ],
        'aquisicao_linguagem' => [
            'label' => 'Aquisição da Linguagem',
            'rules' => 'required'
        ],
        'atraso_neuropsicomotor' => [
            'label' => 'Atraso Neuropsicomotor',
            'rules' => 'required'
        ],
        'desenv_extremidade' => [
            'label' => 'Desenvolvimento das Extremidades',
            'rules' => 'required'
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
