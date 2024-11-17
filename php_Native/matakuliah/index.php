<?php

require_once '../helper/connection.php';

// Mengambil data dari tabel matakuliah
$result = mysqli_query($connection, "SELECT * FROM matakuliah");

// Menghitung jumlah data yang ditemukan
$data_count = mysqli_num_rows($result);
?>

<section>
  <div>
    <h1><b>Data Mata Kuliah</b></h1> 
    <br>
    <a href="?page=tambahMatkul">Tambah Mata Kuliah</a>
  </div>
  <br>
  <div>
    <div>
      <div>
        <div>
          <table border="1" cellspacing="0" width="36%">
            <thead>
              <tr style="text-align: center;">
                <th>No</th>
                <th>Kode Matkul</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($data_count > 0): ?>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)):
                ?>
                  <tr style="text-align: center;">
                    <td><?= $no ?></td>
                    <td><?= $data['kode_matkul'] ?></td>
                    <td><?= $data['nama_matkul'] ?></td>
                    <td><?= $data['sks'] ?></td>
                    <td>
                      <a href="?page=lihatMatkul&kode_matkul=<?= $data['kode_matkul'] ?>">Lihat</a>
                      <a href="?page=editMatkul&kode_matkul=<?= $data['kode_matkul'] ?>">Edit</a>
                      <a href="?page=hapusMatkul&kode_matkul=<?= $data['kode_matkul'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                  </tr>
                <?php
                  $no++;
                endwhile;
                ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" style="text-align: center;">Data Kosong Silahkan Tambah Data Baru</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
