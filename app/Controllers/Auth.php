<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']); // Pastikan form helper ada untuk CSRF
        session();
    }

    public function login()
    {
        return view('auth/login'); // Pastikan file login.php ada di app/Views/auth/
    }

    public function processLogin()
    {
        $session = session();
        $request = service('request');
        $adminModel = new \App\Models\AdminModel(); // Panggil model

        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->to('/login')->with('error', 'Invalid CSRF Token');
        }

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        // Cek username di database
        $user = $adminModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password (pastikan password di database menggunakan hash)
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'logged_in' => true,
                    'role' => $user['role'],
                    'username' => $user['username']
                ]);

                // Redirect ke dashboard sesuai role
                switch ($user['role']) {
                    case 'super_admin':
                        return redirect()->to('/dashboard/superadmin');
                    case 'admin_apbn':
                        return redirect()->to('/dashboard/adminapbn');
                    case 'admin_non_apbn':
                        return redirect()->to('/dashboard/adminnonapbn');
                    default:
                        return redirect()->to('/');
                }
            }
        }

        return redirect()->to('/login')->with('error', 'Username atau password salah');
    }


    public function logout()
    {
        session()->destroy(); // Hapus semua sesi
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }

}
