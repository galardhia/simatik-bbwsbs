<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
}
