<?php
require_once '../helper/connection.php';

// Ambil parameter kode_matkul dari URL
$kode_matkul = $_GET['kode_matkul'] ?? null;

// Pastikan kode_matkul ada dan valid
if ($kode_matkul) {
    $result = mysqli_query($connection, "SELECT * FROM matakuliah WHERE kode_matkul = '$kode_matkul'");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        // Jika data tidak ditemukan
        echo "<script>alert('Data mata kuliah tidak ditemukan'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Kode Mata Kuliah tidak valid'); window.location.href='index.php';</script>";
}
?>

<section>
  <div>
    <h1>Detail Data Mata Kuliah</h1>
  </div>
  <div>
    <div>
      <div>
        <div>
          <br>
          <div>
            <h5><strong>Kode Mata Kuliah :</strong> <?= $data['kode_matkul'] ?></h5>
            <h5><strong>Nama Mata Kuliah :</strong> <?= $data['nama_matkul'] ?></h5>
            <h5><strong>SKS :</strong> <?= $data['sks'] ?></h5>
          </div>
        </div>
      </div>
    </div>
    <a href="?page=matakuliah">Kembali</a>
  </div>
</section>
