<?php
require_once '../helper/connection.php';

// Mengambil jumlah data dari setiap tabel di database
$mahasiswa = mysqli_query($connection, "SELECT COUNT(*) FROM mahasiswa");
$dosen = mysqli_query($connection, "SELECT COUNT(*) FROM dosen");
$matakuliah = mysqli_query($connection, "SELECT COUNT(*) FROM matakuliah");
$nilai = mysqli_query($connection, "SELECT COUNT(*) FROM nilai");

$total_mahasiswa = mysqli_fetch_array($mahasiswa)[0];
$total_dosen = mysqli_fetch_array($dosen)[0];
$total_matakuliah = mysqli_fetch_array($matakuliah)[0];
$total_nilai = mysqli_fetch_array($nilai)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undipa Dashboard</title>
    <style>
        /* Layout untuk sisi kiri dan kanan */
        .dashboard-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .left-side, .right-side {
            width: 48%; 
        }

        .dashboard-card {
            /* border: 1px solid #ccc; */
            padding: 15px;
            margin-bottom: 10px;
            /* background-color: #f9f9f9; */
        }

        .dashboard-card h4 {
            margin: 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
<section>
    <div>
        <h1><b>Undipa Dashboard ❤️</b></h1>
        <br>
    </div>
    <div class="dashboard-container">
        <!-- Sisi kiri: Total Dosen dan Total Mahasiswa -->
        <div class="left-side">
            <div class="dashboard-card">
                <h4>Total Dosen</h4>
                <div><?= $total_dosen ?></div>
            </div>
            <div class="dashboard-card">
                <h4>Total Mahasiswa</h4>
                <div><?= $total_mahasiswa ?></div>
            </div>
        </div>

        <!-- Sisi kanan: Total Mata Kuliah dan Total Nilai Masuk -->
        <div class="right-side">
            <div class="dashboard-card">
                <h4>Total Mata Kuliah</h4>
                <div><?= $total_matakuliah ?></div>
            </div>
            <div class="dashboard-card">
                <h4>Total Nilai Masuk</h4>
                <div><?= $total_nilai ?></div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
