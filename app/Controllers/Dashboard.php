<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']); // Tambahkan form helper untuk CSRF
    }

    private function checkLogin()
    {
        $session = session();
        if (!$session->has('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.')->send();
            exit(); // Hentikan eksekusi setelah redirect
        }
    }

    public function superadmin()
    {
        $this->checkLogin();
        return view('dashboard/superadmin');
    }

    public function adminapbn()
    {
        $this->checkLogin();
        return view('dashboard/adminapbn');
    }

    public function adminnonapbn()
    {
        $this->checkLogin();
        return view('dashboard/adminnonapbn');
    }
}
