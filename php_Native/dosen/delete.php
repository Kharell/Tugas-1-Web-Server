<?php
session_start();
require_once '../helper/connection.php';

$nidn = $_GET['nidn'];

$result = mysqli_query($connection, "DELETE FROM dosen WHERE nidn='$nidn'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ?page=dosen');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ?page=dosen');
}
