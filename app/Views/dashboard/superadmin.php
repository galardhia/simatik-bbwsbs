<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin</title>
    
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
            background-color:rgb(243, 244, 249); /* Warna yang sama dengan sidebar */
            color: white;
            padding: 15px 20px;
            width: 100%;
            display: flex;
            align-items: center;
            height: 60px; /* Tinggi navbar */
            margin-left: -15px; /* Biar lebih rata */
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
            margin: 10px 0 5px 10px; /* Lebih rapat ke atas */
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

        <!-- Tombol Logout di Bawah -->
        <div class="mt-auto">
            <button class="btn btn-danger w-100" id="logoutBtn">
                <a href="<?= base_url('logout') ?>" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <nav class="topbar">
            <h4 class="primary-text fw-bold fs-3">Selamat Datang di Dashboard Super Admin</h4>
        </nav>


        <!-- Dashboard Content -->
        <div id="dashboard" class="content active mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="fw-bold primary-text">1.245</h5>
                        <p class="text-muted">Semua Aset</p>
                        <div class="primary-bg text-white p-2 rounded">
                            <span>Aset TIK: Semua</span>
                            <span class="float-end">100%</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="fw-bold primary-text">900</h5>
                        <p class="text-muted">Aset APBN</p>
                        <div class="primary-bg text-white p-2 rounded">
                            <span>Aset TIK: APBN</span>
                            <span class="float-end">70%</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="fw-bold primary-text">345</h5>
                        <p class="text-muted">Aset Non APBN</p>
                        <div class="primary-bg text-white p-2 rounded">
                            <span>Aset TIK: Non APBN</span>
                            <span class="float-end">30%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Master Data Content -->
        <div id="master-data" class="content mt-4">
            <h4 class="mb-3">Master Data Aset</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 text-center">
                        <img src="<?= base_url('assets/images/apbn-image.png') ?>" alt="APBN" 
                            class="img-fluid d-block mx-auto" style="width: 120px;">
                        <a href="<?= base_url('barang/master_data_apbn') ?>" class="btn w-100 mt-3 text-white" 
                            style="background-color: #1D2185; border-color: #1D2185;">
                            Semua Aset TIK APBN
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 text-center">
                        <img src="<?= base_url('assets/images/apbn-image.png') ?>" alt="NON APBN" 
                            class="img-fluid d-block mx-auto" style="width: 120px;">
                        <a href="<?= base_url('barang/master_data_non_apbn') ?>" class="btn w-100 mt-3 text-white" 
                            style="background-color: #1D2185; border-color: #1D2185;">
                            Semua Aset TIK NON APBN
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Master User Content -->
        <div id="master-user" class="content">
            <?php echo view('admin/master_user'); ?>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Toggle Dropdown untuk Master Data
    document.getElementById("masterDataToggle").addEventListener("click", function(event) {
        event.preventDefault();
        let submenu = this.nextElementSibling;
        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    });

    // Sidebar Navigation
    document.querySelectorAll(".nav-link[data-target]").forEach(item => {
        item.addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah reload

            // Menghapus kelas active dari semua link
            document.querySelectorAll(".nav-link").forEach(link => link.classList.remove("active"));

            // Menambahkan kelas active ke yang diklik
            this.classList.add("active");

            // Mengatur tampilan konten
            document.querySelectorAll(".content").forEach(content => content.classList.remove("active"));
            document.getElementById(this.dataset.target).classList.add("active");
        });
    });

</script>

</body>
</html>
