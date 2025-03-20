<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'       => \CodeIgniter\Filters\CSRF::class,
        'toolbar'    => \CodeIgniter\Filters\DebugToolbar::class,  // ✅ Tambahkan ini
        'roleFilter' => \App\Filters\RoleFilter::class, // Jika ada filter role
    ];

    public array $globals = [
        'before' => [
            'csrf' => ['except' => ['admin/delete/*', 'admin/add']]
        ],
        'after' => [
            'toolbar',  // ✅ Pastikan ada ini
        ],
    ];
}
