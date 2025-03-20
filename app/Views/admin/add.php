<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<body>
<div class="container mt-5">
    <h3 class="mb-3">Tambah User</h3>

    <!-- Form Tambah User -->
    <form id="addUserForm">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-control" required>
                <option value="super_admin">Super Admin</option>
                <option value="admin_apbn">Admin APBN</option>
                <option value="admin_non_apbn">Admin Non APBN</option>
            </select>
        </div>

        <!-- Tombol Simpan & Batal -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/master_user') ?>" class="btn btn-secondary">Batal</a>
    </form>

    <!-- Notifikasi -->
    <div id="alertMessage" class="mt-3"></div>
</div>

<script>
document.getElementById("addUserForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("<?= base_url('admin/add') ?>", { // Sesuaikan dengan routes.php
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        let alertMessage = document.getElementById("alertMessage");
        if (result.status === "success") {
            alertMessage.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
            document.getElementById("addUserForm").reset();
        } else {
            alertMessage.innerHTML = `<div class="alert alert-danger">${result.message}</div>`;
        }
    })
    .catch(error => {
        console.error("Error adding admin:", error);
        document.getElementById("alertMessage").innerHTML = `<div class="alert alert-danger">Terjadi kesalahan saat menambah user.</div>`;
    });
});
</script>

</body>
</html>
