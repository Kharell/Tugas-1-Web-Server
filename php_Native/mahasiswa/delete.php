<?php
session_start();
require_once '../helper/connection.php';

$nim = $_GET['nim'];

$result = mysqli_query($connection, "DELETE FROM mahasiswa WHERE nim='$nim'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ?page=mahasiswa');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ?page=mahasiswa');
}
