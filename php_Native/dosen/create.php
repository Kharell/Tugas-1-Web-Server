<?php
require_once '../helper/connection.php';

// Proses penyimpanan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitasi input untuk mencegah SQL injection
    $nidn = mysqli_real_escape_string($connection, $_POST['nidn']);
    $nama_dosen = mysqli_real_escape_string($connection, $_POST['nama']);
    $jenkel = mysqli_real_escape_string($connection, $_POST['jenkel']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);

    // Validasi data sebelum memasukkan ke database
    if (empty($nidn) || empty($nama_dosen) || empty($jenkel) || empty($alamat)) {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Semua kolom harus diisi!'
        ];
        header('Location: ?page=dosen');
        exit;
    }

    // Query untuk menyimpan data dosen
    $query = "INSERT INTO dosen (nidn, nama_dosen, jenkel_dosen, alamat_dosen) VALUES ('$nidn', '$nama_dosen', '$jenkel', '$alamat')";
    $result = mysqli_query($connection, $query);

    // Menyimpan pesan hasil operasi
    if ($result) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data dosen.'
        ];
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Gagal menambah data dosen. Error: ' . mysqli_error($connection)
        ];
    }

    // Redirect ke halaman dosen setelah proses selesai
    header('Location: ?page=dosen');
    exit;
}
?>

<section>
  <div>
    <h1>Tambah Dosen</h1>
    <a href="?page=dosen">Kembali</a>
  </div>
  <div>
    <!-- Form untuk tambah dosen -->
    <form  method="POST">
      <table cellpadding="8" width="30%">
        <tr>
          <td>NIDN</td>
          <td><input type="number" name="nidn" required></td>
        </tr>

        <tr>
          <td>Nama Dosen</td>
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
          <td>Alamat</td>
          <td><textarea name="alamat" id="alamat" required></textarea></td>
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

<?php
// Menampilkan pesan status jika ada
if (isset($_SESSION['info'])) {
    echo '<p>' . $_SESSION['info']['message'] . '</p>';
    unset($_SESSION['info']);
}
?>
