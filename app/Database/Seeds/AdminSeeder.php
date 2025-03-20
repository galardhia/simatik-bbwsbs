<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Data admin yang akan dimasukkan
        $data = [
            [
                'username'   => 'admin1',
                'email'      => 'admin1@email.com',
                'pass'       => password_hash('123', PASSWORD_DEFAULT), // Hashing password
                'role'       => 'super_admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin2',
                'email'      => 'admin2@email.com',
                'pass'       => password_hash('123', PASSWORD_DEFAULT),
                'role'       => 'admin_apbn',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin3',
                'email'      => 'admin3@email.com',
                'pass'       => password_hash('123', PASSWORD_DEFAULT),
                'role'       => 'admin_non_apbn',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Masukkan data ke database
        $this->db->table('admins')->insertBatch($data);
    }
}
