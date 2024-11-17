<?php
require_once '../helper/connection.php';

// Ambil parameter nim dari URL
$nim = $_GET['nim'] ?? null;

// Pastikan nim ada dan valid
if ($nim) {
    $result = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim = '$nim'");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        // Jika data tidak ditemukan
        echo "<script>alert('Data mahasiswa tidak ditemukan'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('NIM tidak valid'); window.location.href='index.php';</script>";
}
?>

<section>
  <div>
    <h1>Detail Data Mahasiswa</h1>
  </div>
  <div>
    <div>
      <div>
        <div>
          <br>
          
            <div>
              <h5><strong>NIM :</strong> <?= $data['nim'] ?></h5>
              <h5><strong>Nama :</strong> <?= $data['nama'] ?></h5>
              <h5><strong>Jenis Kelamin :</strong> <?= $data['jenis_kelamin'] ?></h5>
              <h5><strong>Kota Kelahiran :</strong> <?= $data['kota_kelahiran'] ?></h5>
              <h5><strong>Tanggal Lahir :</strong> <?= $data['tanggal_kelahiran'] ?></h5>
              <h5><strong>Alamat :</strong> <?= $data['alamat'] ?></h5>
              <h5><strong>Program Studi :</strong> <?= $data['program_studi'] ?></h5>
              <h5><strong>Tahun Masuk :</strong> <?= $data['tahun_masuk'] ?></h5>
            </div>
          
        </div>
      </div>
    </div>
    <a href="?page=mahasiswa">Kembali</a>
  </div>
</section>
