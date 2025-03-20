<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Aset NON APBN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container mt-4">
        <h3 class="mb-3">Master Data Aset NON APBN</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Barang</th>
                    <th>NUP</th>
                    <th>Merk</th>
                    <th>Kondisi</th>
                    <th>Detail</th>
                    <th>QR Code</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($assets)) : ?>
                    <?php foreach ($assets as $asset) : ?>
                        <tr>
                            <td><?= esc($asset['kode_nama_id']) ?></td>
                            <td><?= esc($asset['NUP']) ?></td>
                            <td><?= esc($asset['merk']) ?></td>
                            <td><?= esc($asset['kondisi']) ?></td>
                            <td><?= esc($asset['detail']) ?></td>
                            <td>
                                <img src="<?= base_url('assets/qrcodes/' . $asset['qr_code']) ?>" width="80">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data aset NON APBN.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Kembali</a>
    </div>
</body>
</html>
