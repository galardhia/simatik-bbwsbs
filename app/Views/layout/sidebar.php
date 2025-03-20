
<div class="bg-light sidebar d-flex flex-column p-3">
    <div class="text-center mb-2">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="width: 100px;">
        <h2 class="mt-2 primary-text fw-bold">SIMATIK</h2>
        <p class="primary-text fw">SI Manajemen Aset TIK</p>
    </div>

    <p class="menu-title">Main Menu</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('dashboard/superadmin') ?>">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>

        <p class="menu-title">Master Data</p>
        <li class="nav-item">
            <a class="nav-link" href="#" id="masterDataToggle">
                <i class="bi bi-database"></i> Master Data <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a class="nav-link" href="<?= base_url('barang/master_data_apbn') ?>">
                        <i class="bi bi-box-seam"></i> Master Data Aset
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="<?= base_url('admin/master_user') ?>">
                        <i class="bi bi-person-lines-fill"></i> Master Data User
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Tombol Logout -->
    <div class="mt-auto">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>
