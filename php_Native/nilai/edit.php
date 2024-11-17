<?php
require_once '../helper/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses update data
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $matkul = $_POST['matkul'];
    $semester = $_POST['semester'];
    $nilai = $_POST['nilai'];

    $query = mysqli_query($connection, "UPDATE nilai SET nim='$nim', kode_matkul='$matkul', semester='$semester', nilai='$nilai' WHERE id='$id'");

    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil mengubah data'
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
    // Ambil data untuk form
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM nilai WHERE id='$id'");
    $mahasiswa = mysqli_query($connection, "SELECT nim, nama FROM mahasiswa");
    $matkul = mysqli_query($connection, "SELECT kode_matkul, nama_matkul FROM matakuliah");
    $row = mysqli_fetch_array($query);
}
?>

<section>
  <div>
    <h1>Ubah Data Nilai</h1>
    <a href="?page=nilai">Kembali</a>
  </div>
  <div>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <table cellpadding="8" width="30%">
        <tr>
          <td>Nama Mahasiswa</td>
          <td>
            <select name="nim" id="nim" required>
              <?php
              while ($r = mysqli_fetch_array($mahasiswa)) :
              ?>
                <option value="<?= $r['nim'] ?>" <?= $row['nim'] == $r['nim'] ? 'selected' : '' ?>>
                  <?= $r['nama'] ?>
                </option>
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
              <?php
              while ($r = mysqli_fetch_array($matkul)) :
              ?>
                <option value="<?= $r['kode_matkul'] ?>" <?= $row['kode_matkul'] == $r['kode_matkul'] ? 'selected' : '' ?>>
                  <?= $r['nama_matkul'] ?>
                </option>
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
              <?php
              for ($x = 1; $x <= 12; $x++) {
              ?>
                <option value="<?= $x ?>" <?= $row['semester'] == $x ? 'selected' : '' ?>><?= $x ?></option>
              <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nilai</td>
          <td><input type="number" name="nilai" max="100" value="<?= $row['nilai'] ?>" required></td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="proses" value="Simpan">
            <a href="?page=nilai">Batal</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
