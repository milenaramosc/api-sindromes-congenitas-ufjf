<?php

// override core en language system validation or define your own en language validation message
return [
    'required' => 'Campo {field} é obrigatório',
    'max_length' => 'O campo {field} não pode ter mais de {param} caracter(es). Você enviou "{value}"',
    'min_length' => 'O campo {field} não pode ter menos de {param} caracter(es). Você enviou "{value}"',
    'exact_length' => 'O campo {field} deve ter exatamente {param} caracter(es). Você enviou "{value}"',
    'alpha' => 'O campo {field} deve conter apenas caracteres alfabéticos',
    'alpha_numeric' => 'O campo {field} deve conter apenas caracteres alfanuméricos',
    'alpha_numeric_space' => 'O campo {field} deve conter apenas caracteres alfanuméricos e espaços',
    'alpha_dash' => 'O campo {field} deve conter apenas caracteres alfanuméricos, sublinhados e traços',
    'numeric' => 'O campo {field} deve conter apenas números',
    'is_numeric' => 'O campo {field} deve conter apenas caracteres numéricos',
    'integer' => 'O campo {field} deve conter um número inteiro',
    'regex_match' => 'O campo {field} não está no formato correto',
    'matches' => 'O campo {field} não corresponde ao campo {param}',
    'is_unique' => 'O campo {field} deve conter um valor único',
];
