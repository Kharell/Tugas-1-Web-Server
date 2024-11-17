<?php
require_once '../helper/connection.php';

// Mengambil data dari tabel mahasiswa
$result = mysqli_query($connection, "SELECT * FROM mahasiswa");

// Menghitung jumlah data yang ditemukan
$data_count = mysqli_num_rows($result);
?>

<section>
  <div>
    <h1><b>Data Mahasiswa</b></h1> 
    <br>
    <a href="?page=tambahMhs">Tambah Mahasiswa</a>
  </div>
  <br>
  <div>
    <div>
      <div>
        <div>
          <table border="1" cellpadding="8" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Jenis Kelamin</th>
                <th style="text-align: center;">Kota Kelahiran</th>
                <th style="text-align: center;">Tanggal Lahir</th>
                <th style="text-align: center;">Alamat</th>
                <th style="text-align: center;">Program Studi</th>
                <th style="text-align: center;">Tahun Masuk</th>
                <th style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($data_count > 0): ?>
                <?php $no = 1; ?>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr>
                    <td style="text-align: center;"><?= $no++ ?></td> 
                    <td style="text-align: center;"><?= $data['nim'] ?></td>
                    <td style="text-align: center;"><?= $data['nama'] ?></td>
                    <td style="text-align: center;"><?= $data['jenis_kelamin'] ?></td>
                    <td style="text-align: center;"><?= $data['kota_kelahiran'] ?></td>
                    <td style="text-align: center;"><?= $data['tanggal_kelahiran'] ?></td>
                    <td style="text-align: center;"><?= $data['alamat'] ?></td>
                    <td style="text-align: center;"><?= $data['program_studi'] ?></td>
                    <td style="text-align: center;"><?= $data['tahun_masuk'] ?></td>
                    <td style="text-align: center;">
                      <a href="?page=lihatMhs&nim=<?= $data['nim'] ?>">Lihat</a>
                      <a href="?page=editMhs&nim=<?= $data['nim'] ?>">Edit</a>
                      <a href="?page=hapushMhs&nim=<?= $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                  </tr>
                <?php
                endwhile;
                ?>
              <?php else: ?>
                <tr>
                  <td colspan="10" style="text-align: center;">Data Kosong Silahkan Tambah Data Baru</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
