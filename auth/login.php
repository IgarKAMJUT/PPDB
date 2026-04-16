<?php
include '../config/koneksi.php';

// Jika sudah ada session (sudah login), tendang langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: ../dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    
    // Cek apakah username ada di database
    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_assoc($cek);
        
        // Cek kecocokan password yang diketik dengan yang di database
        if (password_verify($password, $data['password'])) {
            // Buat Session
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            
            header("Location: ../dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login LSP</title>
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="text-center mb-4">Login PPDB</h4>
                
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger p-2 text-center"><?= $error ?></div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-success w-100">Login</button>
                    <div class="text-center mt-3">
                        <a href="register.php" class="text-decoration-none">Belum punya akun? Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>