<?php
require_once '../helper/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses update data
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $kota_lahir = $_POST['kota_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $tahun_masuk = $_POST['tahun_masuk'];

    $query = mysqli_query($connection, "UPDATE mahasiswa SET 
        nama = '$nama', 
        jenis_kelamin = '$jenkel', 
        kota_kelahiran = '$kota_lahir', 
        tanggal_kelahiran = '$tanggal_lahir', 
        alamat = '$alamat', 
        program_studi = '$prodi', 
        tahun_masuk = '$tahun_masuk' 
        WHERE nim = '$nim'");

    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil mengubah data'
        ];
        header('Location: ?page=mahasiswa');
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
        header('Location: ?page=mahasiswa');
    }
    exit();
} else {
    // Tampilkan form edit data
    $nim = $_GET['nim'];
    $query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    $data = mysqli_fetch_array($query);
}
?>

<section>
  <div>
    <h1>Ubah Data Mahasiswa</h1>
    <a href="?page=mahasiswa">Kembali</a>
  </div>
  <div>
    <form action="" method="post">
      <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
      <table cellpadding="8" width="30%">
        <tr>
          <td>NIM</td>
          <td><input type="text" value="<?= $data['nim'] ?>" disabled></td>
        </tr>
        <tr>
          <td>Nama Mahasiswa</td>
          <td><input type="text" name="nama" required value="<?= $data['nama'] ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <select name="jenkel" required>
              <option value="Pria" <?= $data['jenis_kelamin'] == "Pria" ? "selected" : "" ?>>Pria</option>
              <option value="Wanita" <?= $data['jenis_kelamin'] == "Wanita" ? "selected" : "" ?>>Wanita</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Kota Kelahiran</td>
          <td><input type="text" name="kota_lahir" required value="<?= $data['kota_kelahiran'] ?>"></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td><input type="date" name="tanggal_lahir" required value="<?= $data['tanggal_kelahiran'] ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="alamat" required><?= $data['alamat'] ?></textarea></td>
        </tr>
        <tr>
          <td>Program Studi</td>
          <td>
            <select name="prodi" required>
              <option value="Teknik Informatika" <?= $data['program_studi'] == "Teknik Informatika" ? "selected" : "" ?>>Teknik Informatika</option>
              <option value="Sistem Informasi" <?= $data['program_studi'] == "Sistem Informasi" ? "selected" : "" ?>>Sistem Informasi</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Tahun Masuk</td>
          <td>
            <select name="tahun_masuk" required>
              <?php for ($x = 2015; $x <= 2021; $x++) { ?>
                <option value="<?= $x ?>" <?= $data['tahun_masuk'] == $x ? "selected" : "" ?>><?= $x ?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Ubah">
            <a href="?page=mahasiswa">Batal</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
