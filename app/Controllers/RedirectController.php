<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RedirectController extends Controller
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');

        $rolePermissions = [
            'super_admin'   => '/dashboard/superadmin',
            'admin_apbn'    => '/dashboard/adminapbn',
            'admin_non_apbn' => '/dashboard/adminnonapbn'
        ];

        if (isset($rolePermissions[$role])) {
            return redirect()->to($rolePermissions[$role]);
        }

        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
}
