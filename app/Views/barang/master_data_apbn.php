<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Aset APBN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <div class="d-flex">
        
        <!-- Main Content -->
        <div class="container mt-4">
            <h3 class="mb-3">Data Barang APBN</h3>
            <button class="btn btn-primary mb-3">+ Tambah Barang</button>
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>QR Code</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Kondisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($assets)) : ?>
                        <?php foreach ($assets as $asset) : ?>
                            <tr>
                                <td>
                                    <?php if (!empty($asset['kode_barang']) && !empty($asset['NUP'])): ?>
                                        <img src="<?= base_url('masterdata/generateQrCode/' . esc($asset['kode_barang']) . '/' . esc($asset['NUP'])) ?>" width="50">
                                    <?php else: ?>
                                        <span class="text-danger">QR Tidak Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($asset['kode_barang']) ?></td>
                                <td><?= esc($asset['nama_barang']) ?></td>
                                <td><?= esc($asset['merk']) ?></td>
                                <td>
                                    <span class="badge bg-<?php 
                                        echo ($asset['kondisi'] == 'Baik') ? 'success' : 
                                            (($asset['kondisi'] == 'Rusak Ringan') ? 'warning' : 'danger'); 
                                    ?>">
                                        <?= esc($asset['kondisi']) ?>
                                    </span>
                                </td>

                                <td>
                                    <a href="#" class="text-primary me-2"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-warning me-2"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data aset APBN.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
