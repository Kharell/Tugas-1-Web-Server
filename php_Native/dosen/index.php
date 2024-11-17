<?php

require_once '../helper/connection.php';

// Mengambil data dari tabel dosen
$result = mysqli_query($connection, "SELECT * FROM dosen");

// Menghitung jumlah data yang ditemukan
$data_count = mysqli_num_rows($result);
?>

<section class="section">
  <div class="section-header">
    <h1>Data Dosen</h1>
    <br>
    <a href="?page=tambaDosen">Tambah Dosen</a>
  </div>
  <br>
  <div>
    <table id="table-1" border="1" cellpadding="8" cellspacing="0" width="80%">
      <thead>
        <tr>
          <th style="text-align: center;">No</th>
          <th style="text-align: center;">NIDN</th>
          <th style="text-align: center;">Nama Dosen</th>
          <th style="text-align: center;">Jenis Kelamin</th>
          <th style="text-align: center;">Alamat</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
     
      <tbody>
        <?php if ($data_count > 0): ?>
          <?php $no = 1; ?>
          <?php while ($data = mysqli_fetch_array($result)): ?>
            <tr>
              <td style="text-align: center;"><?= $no++ ?></td>
              <td style="text-align: center;"><?= $data['nidn'] ?></td>
              <td style="text-align: center;"><?= $data['nama_dosen'] ?></td>
              <td style="text-align: center;"><?= $data['jenkel_dosen'] ?></td>
              <td style="text-align: center;"><?= $data['alamat_dosen'] ?></td>
              <td style="text-align: center;">
                <a href="?page=lihatDosen&nidn=<?= $data['nidn'] ?>">Lihat</a>
                <a href="?page=editDosen&nidn=<?= $data['nidn'] ?>">Edit</a>
                <a href="?page=hapusDosen&nidn=<?= $data['nidn'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" style="text-align: center;">Data Kosong Silahkan Tambah Data Baru</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
