<?php 
include '../config/koneksi.php'; 
include '../layout/header.php'; 

if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal_sekolah'];

    // Proses Upload
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../uploads/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        mysqli_query($koneksi, "INSERT INTO calon_siswa (nisn, nama, asal_sekolah, foto) VALUES ('$nisn', '$nama', '$asal', '$foto')");
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    }
}
?>

<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-white"><h5>Tambah Calon Siswa</h5></div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Foto Siswa</label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php include '../layout/footer.php'; ?>