<?php
require_once '../helper/connection.php';

// Proses menyimpan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];

    // Query untuk menyimpan data
    $query = mysqli_query($connection, "INSERT INTO matakuliah (kode_matkul, nama_matkul, sks) VALUES ('$kode_matkul', '$nama_matkul', '$sks')");

    // Mengecek hasil query
    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data'
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

<!-- Halaman Form Tambah Mata Kuliah -->
<section>
  <div>
    <h1>Tambah Mata Kuliah</h1>
    <a href="?page=matakuliah">Kembali</a>
  </div>
  <div>
    <div>
      <div>
        <div>
          <form action="" method="POST"> <!-- Form akan submit ke halaman ini sendiri -->
            <table cellpadding="8" width="30%">
              <tr>
                <td>Kode Mata Kuliah</td>
                <td><input type="text" name="kode_matkul" required></td>
              </tr>
              <tr>
                <td>Nama Mata Kuliah</td>
                <td><input type="text" name="nama_matkul" required></td>
              </tr>
              <tr>
                <td>SKS</td>
                <td><input type="number" max="6" name="sks" required></td>
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
      </div>
    </div>
  </div>
</section>
