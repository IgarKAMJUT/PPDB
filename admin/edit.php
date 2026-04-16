<?php 
include '../config/koneksi.php'; 
include '../layout/header.php'; 

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM calon_siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// Proses Update Data
if (isset($_POST['update'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal_sekolah'];
    $foto_baru = $_FILES['foto']['name'];

    // Jika user mengupload foto baru
    if ($foto_baru != "") {
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "../uploads/" . $foto_baru;
        
        // Hapus foto lama
        if (is_file("../uploads/".$data['foto'])) {
            unlink("../uploads/".$data['foto']);
        }
        
        // Upload foto baru dan update database
        move_uploaded_file($tmp, $path);
        mysqli_query($koneksi, "UPDATE calon_siswa SET nisn='$nisn', nama='$nama', asal_sekolah='$asal', foto='$foto_baru' WHERE id='$id'");
    } else {
        // Jika foto tidak diganti
        mysqli_query($koneksi, "UPDATE calon_siswa SET nisn='$nisn', nama='$nama', asal_sekolah='$asal' WHERE id='$id'");
    }

    echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
}
?>

<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-white"><h5>Edit Data Calon Siswa</h5></div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" value="<?= $data['nisn'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" value="<?= $data['asal_sekolah'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Foto Saat Ini</label><br>
                <img src="../uploads/<?= $data['foto'] ?>" width="100" class="mb-2 rounded">
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">*Kosongkan jika tidak ingin mengubah foto</small>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php include '../layout/footer.php'; ?>