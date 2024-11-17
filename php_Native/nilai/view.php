<?php
require_once '../helper/connection.php';

// Ambil parameter id dari URL
$id = $_GET['id'] ?? null;

// Pastikan id ada dan valid
if ($id) {
    // Query dengan join tabel nilai dan mahasiswa
    $query = "SELECT nilai.*, mahasiswa.nama 
              FROM nilai
              JOIN mahasiswa ON nilai.nim = mahasiswa.nim
              WHERE nilai.id = '$id'";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        // Jika data tidak ditemukan
        echo "<script>alert('Data nilai tidak ditemukan'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid'); window.location.href='index.php';</script>";
}
?>

<section>
  <div>
    <h1>Detail Data Nilai Mahasiswa</h1>
  </div>
  <div>
    <div>
      <div>
        <div>
          
            <div>
              <h5><strong>Nama Mahasiswa :</strong> <?= $data['nama'] ?></h5>
              <h5><strong>NIM :</strong> <?= $data['nim'] ?></h5>
              <h5><strong>Kode Mata Kuliah :</strong> <?= $data['kode_matkul'] ?></h5>
              <h5><strong>Semester :</strong> <?= $data['semester'] ?></h5>
              <h5><strong>Nilai :</strong> <?= $data['nilai'] ?></h5>
            </div>
        
        </div>
      </div>
    </div>
    <a href="?page=nilai">Kembali</a>
  </div>
</section>
