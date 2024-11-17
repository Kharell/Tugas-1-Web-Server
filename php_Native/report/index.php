<?php
require_once '../helper/connection.php';

$result_dosen = mysqli_query($connection, "SELECT * FROM dosen");
$result_mahasiswa = mysqli_query($connection, "SELECT * FROM mahasiswa");
$result_matakuliah = mysqli_query($connection, "SELECT * FROM matakuliah");
$result_nilai = mysqli_query($connection, "SELECT * FROM nilai");
?>

<style>
  /* CSS for print styles */
  @media print {
    body * {
      visibility: hidden;
    }
    .print-section, .print-section * {
      visibility: visible;
    }
    .print-section {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }
    .btn {
      display: none;
    }

    /* Menambahkan properti CSS untuk rata tengah */
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: center; /* Menambahkan properti ini untuk meratakan teks ke tengah */
      border: 1px solid #000;
    }
  }
</style>

<section class="section print-section">
  <div class="section-header d-flex justify-content-between">
    <h1><b>Laporan Data UNDIPA❤️</b></h1>
    <br>
    <button class="btn btn-primary" onclick="window.print()">Print Laporan</button>
  </div>
  <br>
  <div class="row">
    <div class="report">
      <!-- Laporan Dosen -->
      <div>
        <h4>Data Dosen</h4>
        <table border="1" cellpadding="8" cellspacing="0" width="50%">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>NIDN</th>
              <th>Nama Dosen</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_array($result_dosen)) : ?>
              <tr style="text-align: center;">
                <td><?= $no++ ?></td>
                <td><?= $data['nidn'] ?></td>
                <td><?= $data['nama_dosen'] ?></td>
                <td><?= $data['jenkel_dosen'] ?></td>
                <td><?= $data['alamat_dosen'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <br>
      <!-- Laporan Mahasiswa -->
      <div>
        <h4>Data Mahasiswa</h4>
        <table border="1" cellpadding="8" cellspacing="0" width="100%">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Kota Kelahiran</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Program Studi</th>
              <th>Tahun Masuk</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_array($result_mahasiswa)) : ?>
              <tr style="text-align: center;">
                <td><?= $no++ ?></td>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jenis_kelamin'] ?></td>
                <td><?= $data['kota_kelahiran'] ?></td>
                <td><?= $data['tanggal_kelahiran'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['program_studi'] ?></td>
                <td><?= $data['tahun_masuk'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
        <br>

      <!-- Laporan Mata Kuliah -->
      <div>
        <h4>Data Mata Kuliah</h4>
        <table border="1" cellpadding="8" cellspacing="0" width="30%">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>Kode Matkul</th>
              <th>Nama Mata Kuliah</th>
              <th>SKS</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_array($result_matakuliah)) : ?>
              <tr style="text-align: center;">
                <td><?= $no++ ?></td>
                <td><?= $data['kode_matkul'] ?></td>
                <td><?= $data['nama_matkul'] ?></td>
                <td><?= $data['sks'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <br>
      
      <!-- Laporan Nilai Mahasiswa -->
      <div>
        <h4>Data Nilai Mahasiswa</h4>
        <table border="1" cellpadding="8" cellspacing="0" width="30%">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>NIM</th>
              <th>Kode Mata Kuliah</th>
              <th>Semester</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_array($result_nilai)) : ?>
              <tr style="text-align: center;">
                <td><?= $no++ ?></td>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['kode_matkul'] ?></td>
                <td><?= $data['semester'] ?></td>
                <td><?= $data['nilai'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
