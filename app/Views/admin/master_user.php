<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data User</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container mt-4">
    <h3 class="mb-3">Master Data User</h3>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
        + Add User
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="adminTableBody">
            <tr>
                <td colspan="5" class="text-center">Memuat data...</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Admin -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin_apbn">Admin APBN</option>
                            <option value="admin_non_apbn">Admin Non APBN</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    loadAdmins();
});

// Load Data Admin
function loadAdmins() {
    fetch("<?= base_url('api/admins') ?>")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("adminTableBody");
            tableBody.innerHTML = "";

            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="5" class="text-center">Tidak ada data admin.</td></tr>`;
            } else {
                tableBody.innerHTML = data.map(admin => `
                    <tr>
                        <td>${admin.id}</td>
                        <td>${admin.username}</td>
                        <td>${admin.email}</td>
                        <td>${admin.role}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteAdmin(${admin.id})">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                `).join("");
            }
        })
        .catch(error => console.error("Error fetching data:", error));
}

// Tambah Admin
document.getElementById("addUserForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("<?= base_url('admin/add') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        if (result.status === 'success') {
            loadAdmins();
            document.getElementById("addUserForm").reset();
            let modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }
    })
    .catch(error => console.error("Error adding admin:", error));
});

// Hapus Admin
function deleteAdmin(id) {
    if (confirm('Apakah Anda yakin ingin menghapus admin ini?')) {
        let csrfToken = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

        fetch("<?= base_url('admin/delete/') ?>" + id, {
            method: "POST", // Gunakan POST agar tidak terblokir CSRF
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "<?= csrf_token() ?>=" + csrfToken
        })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            if (result.status === 'success') {
                loadAdmins(); // Refresh tabel setelah hapus
            }
        })
        .catch(error => console.error("Error deleting data:", error));
    }
}

</script>
</body>
</html>
