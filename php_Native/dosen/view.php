<?php
require_once '../helper/connection.php';

// Ambil parameter nidn dari URL
$nidn = $_GET['nidn'] ?? null;

// Pastikan nidn ada dan valid
if ($nidn) {
    $result = mysqli_query($connection, "SELECT * FROM dosen WHERE nidn = '$nidn'");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        // Jika data tidak ditemukan
        echo "<script>alert('Data dosen tidak ditemukan'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('NIDN tidak valid'); window.location.href='index.php';</script>";
}
?>

<section>
  <div>
    <h1>Detail Data Dosen</h1>
  </div>
  <div>
    <div>
      <div>
        <div>
          <p><strong>NIDN :</strong> <?= $data['nidn'] ?></p>
          <p><strong>Nama Dosen :</strong> <?= $data['nama_dosen'] ?></p>
          <p><strong>Jenis Kelamin :</strong> <?= $data['jenkel_dosen'] ?></p>
          <p><strong>Alamat :</strong> <?= $data['alamat_dosen'] ?></p>
        </div>
      </div>
    </div>
    <a href="?page=dosen">Kembali</a>
  </div>
</section>
