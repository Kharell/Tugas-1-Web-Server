<?php
require_once '../helper/connection.php';

// Proses mendapatkan data jika ada parameter `kode_matkul`
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['kode_matkul'])) {
    $kode_matkul = $_GET['kode_matkul'];
    $query = mysqli_query($connection, "SELECT * FROM matakuliah WHERE kode_matkul='$kode_matkul'");
    $data = mysqli_fetch_array($query);
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];

    // Query update
    $query = mysqli_query($connection, "UPDATE matakuliah SET nama_matkul = '$nama_matkul', sks = '$sks' WHERE kode_matkul = '$kode_matkul'");

    // Feedback berdasarkan hasil query
    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil mengubah data'
        ];
        header('Location: ?page=matakuliah');
        exit();
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
        header('Location: ?page=matakuliah');
        exit();
    }
}
?>

<!-- Halaman Form Ubah Data Mata Kuliah -->
<section>
  <div>
    <h1>Ubah Data Mata Kuliah</h1>
    <a href="?page=matakuliah">Kembali</a>
  </div>
  <div>
    <div>
      <div>
        <div>
          <!-- Form untuk mengubah data -->
          <form action="" method="POST">
            <input type="hidden" name="kode_matkul" value="<?= $data['kode_matkul'] ?>">
            <table cellpadding="8" width="30%">
              <tr>
                <td>Kode Mata Kuliah</td>
                <td><input type="text" required value="<?= $data['kode_matkul'] ?>" disabled></td>
              </tr>
              <tr>
                <td>Nama Mata Kuliah</td>
                <td><input type="text" name="nama_matkul" required value="<?= $data['nama_matkul'] ?>"></td>
              </tr>
              <tr>
                <td>SKS</td>
                <td><input type="number" name="sks" max="6" required value="<?= $data['sks'] ?>"></td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="proses" value="Ubah">
                  <a href="?page=matakuliah">Batal</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
