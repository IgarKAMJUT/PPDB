<?php
include '../config/koneksi.php';

$id = $_GET['id'];
// Cari foto lama untuk dihapus dari folder uploads
$query = mysqli_query($koneksi, "SELECT foto FROM calon_siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (is_file("../uploads/".$data['foto'])) {
    unlink("../uploads/".$data['foto']); // Hapus file fisik
}

mysqli_query($koneksi, "DELETE FROM calon_siswa WHERE id='$id'");
echo "<script>alert('Data terhapus!'); window.location='index.php';</script>";
?>