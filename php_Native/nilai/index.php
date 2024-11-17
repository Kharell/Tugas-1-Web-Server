<?php

require_once '../helper/connection.php';

// Mengambil data dari tabel nilai
$result = mysqli_query($connection, "SELECT * FROM nilai");

// Menghitung jumlah data
$data_count = mysqli_num_rows($result);
?>

<section>
  <div>
    <h1><b>Data Nilai Mahasiswa</b></h1> 
    <br>
    <a href="?page=tambahN">Tambah Mahasiswa</a>
  </div>
  <br>
  <div>
    <div>
      <div>
        <div>
          <div>
            <table border="1" cellspacing="0" width="50%">
              <thead>
                <tr>
                  <th style="text-align: center;">No</th>
                  <th style="text-align: center;">NIM</th>
                  <th style="text-align: center;">Kode Mata Kuliah</th>
                  <th style="text-align: center;">Semester</th>
                  <th style="text-align: center;">Nilai</th>
                  <th style="text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($data_count > 0): ?>
                  <?php
                  $no = 1;
                  while ($data = mysqli_fetch_array($result)) :
                  ?>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <tr>
                      <td style="text-align: center;"><?= $no ?></td>
                      <td style="text-align: center;"><?= $data['nim'] ?></td>
                      <td style="text-align: center;"><?= $data['kode_matkul'] ?></td>
                      <td style="text-align: center;"><?= $data['semester'] ?></td>
                      <td style="text-align: center;"><?= $data['nilai'] ?></td>
                      <td style="text-align: center;">
                        <a href="?page=lihatN&id=<?= $data['id'] ?>">Lihat</a>
                        <a href="?page=editN&id=<?= $data['id'] ?>">Edit</a>
                        <a href="?page=hapusN&id=<?= $data['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  endwhile;
                  ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" style="text-align: center;">Data Kosong Silahkan Tambah Data Baru</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
