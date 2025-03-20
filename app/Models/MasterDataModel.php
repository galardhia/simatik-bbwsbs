<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterDataModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_nama_id', 'Kategori_id', 'NUP', 'merk', 'kondisi', 
        'detail', 'tanggal_perolehan', 'nilai_perolehan', 'qr_code'
    ];

    public function getAssetsByCategory($category)
    {
        return $this->db->table('barang b')
            ->select('b.NUP, b.merk, b.kondisi, k.kode_barang, k.nama_barang, b.qr_code')
            ->join('kode_nama k', 'b.kode_nama_id = k.id', 'left')
            ->where('b.Kategori_id', $category)
            ->get()
            ->getResultArray();
    }

    public function getBarangByKategori($kategori)
    {
        return $this->select('barang.*, kode_nama.kode_barang')
                    ->join('kode_nama', 'kode_nama.id = barang.kode_nama_id')
                    ->join('kategori', 'kategori.id = barang.kategori_id')
                    ->where('kategori.nama', $kategori)
                    ->findAll();
    }
}
