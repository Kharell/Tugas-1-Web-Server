<?php
require_once '../helper/connection.php';

// Proses penyimpanan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $kota_lahir = $_POST['kota_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $tahun_masuk = $_POST['tahun_masuk'];

    // Query insert
    $query = mysqli_query($connection, "INSERT INTO mahasiswa (nim, nama, jenis_kelamin, kota_kelahiran, tanggal_kelahiran, alamat, program_studi, tahun_masuk) 
        VALUES ('$nim', '$nama', '$jenkel', '$kota_lahir', '$tanggal_lahir', '$alamat', '$prodi', '$tahun_masuk')");

    // Feedback berdasarkan hasil query
    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data'
        ];
        header('Location: ?page=mahasiswa');
        exit();
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
        header('Location: ?page=mahasiswa');
        exit();
    }
}
?>

<!-- Halaman Form Tambah Mahasiswa -->
<section>
  <div>
    <h1>Tambah Mahasiswa</h1>
    <a href="?page=mahasiswa">Kembali</a>
  </div>
  <div>
    <!-- Form -->
    <form action="" method="POST">
      <table cellpadding="8" width="30%">
        <tr>
          <td>NIM</td>
          <td><input type="number" name="nim" required></td>
        </tr>
        <tr>
          <td>Nama Mahasiswa</td>
          <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <select name="jenkel" id="jenkel" required>
              <option value="">--Pilih Jenis Kelamin--</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Kota Kelahiran</td>
          <td><input type="text" name="kota_lahir" size="20" required></td>
        </tr>
        <tr>
          <td>Tanggal Kelahiran</td>
          <td><input type="date" id="datepicker" name="tanggal_lahir" required></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="alamat" required></textarea></td>
        </tr>
        <tr>
          <td>Program Studi</td>
          <td>
            <select name="prodi" id="prodi" required>
              <option value="">--Pilih Program Studi--</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Tahun Masuk</td>
          <td>
            <select name="tahun_masuk" id="tahun_masuk" required>
              <option value="">--Pilih Tahun Masuk--</option>
              <?php
              for ($x = 2015; $x <= 2021; $x++) {
              ?>
                <option value="<?= $x ?>"><?= $x ?></option>
              <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="proses" value="Simpan">
            <input type="reset" name="batal" value="Bersihkan">
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
