<?php 
include '../config/koneksi.php'; 
include '../layout/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-secondary"><i class="bi bi-folder2-open me-2"></i>Data Calon Siswa</h4>
    <a href="tambah.php" class="btn btn-primary shadow-sm rounded-pill px-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Data
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="15%" class="text-center">Pas Foto</th>
                    <th width="20%">NISN</th>
                    <th width="25%">Nama Lengkap</th>
                    <th width="20%">Asal Sekolah</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM calon_siswa ORDER BY id DESC");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                    <td class="text-center">
                        <img src="../uploads/<?= $data['foto'] ?>" width="60" height="60" class="rounded-circle object-fit-cover border shadow-sm">
                    </td>
                    <td><span class="badge bg-secondary"><?= $data['nisn'] ?></span></td>
                    <td class="fw-semibold text-dark"><?= $data['nama'] ?></td>
                    <td><?= $data['asal_sekolah'] ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Data akan dihapus permanen. Lanjutkan?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php'; ?>