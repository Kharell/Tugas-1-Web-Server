<?php
require_once '../helper/connection.php';

// Mengecek apakah ada data yang dikirim melalui URL untuk NIDN
if (isset($_GET['nidn'])) {
    $nidn = $_GET['nidn'];

    // Mengambil data dosen berdasarkan NIDN
    $query = mysqli_query($connection, "SELECT * FROM dosen WHERE nidn='$nidn'");
    $row = mysqli_fetch_array($query);
}

// Proses Update data dosen setelah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $alamat = $_POST['alamat'];

    // Query untuk memperbarui data dosen
    $update_query = mysqli_query($connection, "UPDATE dosen SET nama_dosen = '$nama_dosen', jenkel_dosen = '$jenkel', alamat_dosen = '$alamat' WHERE nidn = '$nidn'");

    // Menyimpan hasil operasi ke dalam session
    if ($update_query) {
        // Jika update berhasil, redirect ke halaman dosen dan tampilkan pesan sukses
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil mengubah data dosen'
        ];
        header('Location: ?page=dosen'); 
        exit;
    } else {
        // Jika update gagal, redirect ke halaman dosen dan tampilkan pesan gagal
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Gagal mengubah data dosen: ' . mysqli_error($connection)
        ];
        header('Location: ?page=dosen'); 
        exit;
    }
}
?>

<section>
  <div>
    <h1>Ubah Data Dosen</h1>
    <a href="?page=dosen">Kembali</a>
  </div>
  <div>
    <!-- Form untuk mengedit data dosen -->
    <form method="POST">
      <?php if (isset($row)) { ?>
        <input type="hidden" name="nidn" value="<?= $row['nidn'] ?>">
        <table cellpadding="8" width="30%">
          <tr>
            <td>NIDN</td>
            <td><input type="number" name="nidn" size="20" required value="<?= $row['nidn'] ?>" disabled></td>
          </tr>
          <tr>
            <td>Nama Dosen</td>
            <td><input type="text" name="nama" size="20" required value="<?= $row['nama_dosen'] ?>"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              <select name="jenkel" id="jenkel" required>
                <option value="Pria" <?= ($row['jenkel_dosen'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                <option value="Wanita" <?= ($row['jenkel_dosen'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td colspan="3"><textarea name="alamat" id="alamat" required><?= $row['alamat_dosen'] ?></textarea></td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="proses" value="Ubah">
              <a href="?page=dosen">Batal</a>
            </td>
          </tr>
        </table>
      <?php } ?>
    </form>
  </div>
</section>

<?php
// Menampilkan pesan status setelah operasi
if (isset($_SESSION['info'])) {
    echo '<p>' . $_SESSION['info']['message'] . '</p>';
    unset($_SESSION['info']);
}
?>
