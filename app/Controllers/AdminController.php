<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BarangModel;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends ResourceController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function getAdmins()
    {
        return $this->respond($this->adminModel->findAll());
    }

    public function addAdmin()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ];

        if ($this->adminModel->insert($data)) {
            return $this->respond(['status' => 'success', 'message' => 'User berhasil ditambahkan']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal menambahkan user']);
        }
    }

    public function deleteAdmin($id)
    {
        // Periksa apakah ID ada di database
        $admin = $this->adminModel->find($id);
        if (!$admin) {
            return $this->respond(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        // Hapus admin
        if ($this->adminModel->delete($id)) {
            return $this->respond(['status' => 'success', 'message' => 'User berhasil dihapus']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal menghapus user']);
        }
    }
    public function index()
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->findAll(); // Ambil semua data barang

        return view('dashboard/superadmin', ['barang' => $barang]); // Kirim data ke view superadmin.php
    }
    
}
