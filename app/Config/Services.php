<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Autoloader\FileLocator;

class Services extends BaseService
{
    public static function routes(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('routes');
        }

        $locator = Services::locator();
        $modules = config('Modules');
        $routing = config('Routing'); // Tambahkan ini

        return new RouteCollection($locator, $modules, $routing); // Perbaiki di sini
    }
}
