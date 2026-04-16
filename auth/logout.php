<?php
// 1. Mulai session untuk mengenali sesi mana yang sedang aktif
session_start();

// 2. Hapus semua data session yang tersimpan (seperti username dan role)
session_destroy();

// 3. Arahkan pengguna kembali ke halaman login
header("Location: login.php");
exit;
?>