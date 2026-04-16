<?php
include '../config/koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    // Enkripsi password menggunakan standar keamanan PHP
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role'];

    mysqli_query($koneksi, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="text-center mb-4">Register Akun</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="admin">Admin (Akses PPDB)</option>
                            <option value="kasir">Kasir (Akses SPP)</option>
                        </select>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary w-100">Daftar Sekarang</button>
                    <div class="text-center mt-3">
                        <a href="login.php" class="text-decoration-none">Sudah punya akun? Login di sini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>