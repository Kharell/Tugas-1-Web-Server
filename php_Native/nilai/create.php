<?php
require_once '../helper/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses tambah data
    $nim = $_POST['nim'];
    $matkul = $_POST['matkul'];
    $semester = $_POST['semester'];
    $nilai = $_POST['nilai'];

    $query = mysqli_query($connection, "INSERT INTO nilai (nim, kode_matkul, semester, nilai) 
                                        VALUES ('$nim', '$matkul', '$semester', '$nilai')");

    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data'
        ];
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
    }
    header('Location: ?page=nilai');
    exit();
} else {
    // Ambil data mahasiswa dan mata kuliah untuk ditampilkan di form
    $mahasiswa = mysqli_query($connection, "SELECT nim, nama FROM mahasiswa");
    $matkul = mysqli_query($connection, "SELECT kode_matkul, nama_matkul FROM matakuliah");
}
?>

<section>
  <div>
    <h1>Tambah Nilai</h1>
    <a href="?page=nilai">Kembali</a>
  </div>
  <div>
    <form action="" method="POST">
      <table cellpadding="8" width="30%">
        <tr>
          <td>Nama Mahasiswa</td>
          <td>
            <select name="nim" id="nim" required>
              <option value="">--Pilih Mahasiswa--</option>
              <?php
              while ($r = mysqli_fetch_array($mahasiswa)) :
              ?>
                <option value="<?= $r['nim'] ?>"><?= $r['nama'] ?></option>
              <?php
              endwhile;
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Mata Kuliah</td>
          <td>
            <select name="matkul" id="matkul" required>
              <option value="">--Pilih Matakuliah--</option>
              <?php
              while ($r = mysqli_fetch_array($matkul)) :
              ?>
                <option value="<?= $r['kode_matkul'] ?>"><?= $r['nama_matkul'] ?></option>
              <?php
              endwhile;
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Semester</td>
          <td>
            <select name="semester" id="semester" required>
              <option value="">--Pilih Semester--</option>
              <?php
              for ($x = 1; $x <= 12; $x++) {
              ?>
                <option value="<?= $x ?>"><?= $x ?></option>
              <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nilai</td>
          <td><input type="number" name="nilai" max="100" required></td>
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
