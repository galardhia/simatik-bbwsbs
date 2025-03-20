<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    public string $csrfProtection = 'cookie'; // Jangan pakai `true`, harus string 'cookie' atau 'session'
    public bool $tokenRandomize = true;
    public string $tokenName = 'csrf_test_name';
    public string $headerName = 'X-CSRF-TOKEN';
    public string $cookieName = 'csrf_cookie_name';
    public int $expires = 7200;
    public bool $regenerate = true;
    public bool $redirect = (ENVIRONMENT === 'production');
}
