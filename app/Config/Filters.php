<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\AnalisePacienteFilter;


class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'filterAnalisePaciente'   => AnalisePacienteFilter::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            //'filterAnalisePaciente'
        ],
        'after' => [
            //'filterAnalisePaciente'
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [
        'post' => [
            //'postFilter'
        ]
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'filterAnalisePaciente' => ['before' => ['atendimento/insert']],
        //'auth' => ['before' => ['atendimento/insert']]
    ];
}
