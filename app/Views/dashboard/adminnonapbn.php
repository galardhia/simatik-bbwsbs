<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Non APBN</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .primary-bg {
            background-color: #1D2185 !important;
        }
        .primary-text {
            color: #1D2185 !important;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            transition: all 0.3s;
        }
        .topbar {
            background-color: rgb(243, 244, 249);
            color: white;
            padding: 15px 20px;
            width: 100%;
            display: flex;
            align-items: center;
            height: 60px;
            margin-left: -15px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #1D2185;
            color: white !important;
        }
        .menu-title {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            color: #6c757d;
            margin: 10px 0 5px 10px;
        }
        .submenu {
            list-style: none;
            padding-left: 20px;
            display: none;
        }
        .submenu .nav-link {
            font-size: 14px;
            padding: 8px 15px;
        }
        .content {
            display: none;
        }
        .content.active {
            display: block;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-light sidebar d-flex flex-column p-3">
        <div class="text-center mb-2">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="width: 100px;">
            <h2 class="mt-2 primary-text fw-bold">SIMATIK</h2>
            <p class="primary-text fw">SI Manajemen Aset TIK</p>
        </div>

        <p class="menu-title">Main Menu</p>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-target="dashboard">
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
                        <a class="nav-link" href="#" data-target="master-data">
                            <i class="bi bi-box-seam"></i> Master Data Aset
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" data-target="master-user">
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

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <nav class="topbar">
            <h4 class="primary-text fw-bold fs-3">Selamat Datang di Dashboard Admin Non APBN</h4>
        </nav>

        <!-- Dashboard Content -->
        <div id="dashboard" class="content active mt-5">
            <div class="container mt-4">
                <!-- Semua Aset APBN -->
                <div class="card shadow-sm p-3 mb-3">
                    <h5 class="fw-bold primary-text">1.245</h5>
                    <div class="primary-bg text-white p-3 rounded d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Aset TIK</p>
                            <p class="fw-bold mb-1">Semua Aset</p>
                            <h5 class="mb-1">Non APBN</h5>
                        </div>
                        <h5 class="fw-bold mb-0">100%</h5>
                    </div>
                </div>

                <div class="row">
                    <!-- Aset Baik -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3">
                            <h5 class="fw-bold primary-text">1.100 </h5>
                            <div class="primary-bg text-white p-2 rounded d-flex justify-content-between align-items-center">
                                <span>Aset TIK Non APBN<p><h6 class="fw-bold">Baik</h6></p></span>
                                <span class="fw-bold"><h5>70%</h5></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Aset Rusak Ringan -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3">
                            <h5 class="fw-bold primary-text">100</h5>
                            <div class="primary-bg text-white p-2 rounded d-flex justify-content-between align-items-center">
                                <span>Aset TIK Non APBN<p><h6 class="fw-bold">Rusak Ringan</h6></p></span>
                                <span class="fw-bold"><h5>20%</h5></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Aset Rusak Berat -->
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3">
                            <h5 class="fw-bold primary-text">45</h5>
                            <div class="primary-bg text-white p-2 rounded d-flex justify-content-between align-items-center">
                                <span>Aset TIK Non APBN<p><h6 class="fw-bold">Rusak Berat</h6></p></span>
                                <span class="fw-bold"><h5>10%</h5></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Content -->
        <div id="master-data" class="content">
            <?php echo view('barang/master_data'); ?>
        </div>

        <!-- Master User Content -->
        <div id="master-user" class="content">
            <?php echo view('admin/master_user_view'); ?>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Toggle Dropdown untuk Master Data
    let masterDataToggle = document.getElementById("masterDataToggle");
    if (masterDataToggle) {
        masterDataToggle.addEventListener("click", function(event) {
            event.preventDefault();
            let submenu = this.nextElementSibling;
            submenu.style.display = submenu.style.display === "block" ? "none" : "block";
        });
    }

    // Sidebar Navigation
    document.querySelectorAll(".nav-link[data-target]").forEach(item => {
        item.addEventListener("click", function(event) {
            event.preventDefault();

            // Menghapus kelas active dari semua link
            document.querySelectorAll(".nav-link").forEach(link => link.classList.remove("active"));
            this.classList.add("active");

            // Menampilkan konten yang sesuai
            document.querySelectorAll(".content").forEach(content => content.classList.remove("active"));
            let targetContent = document.getElementById(this.dataset.target);
            if (targetContent) {
                targetContent.classList.add("active");
            }
        });
    });
});
</script>

</body>
</html>
