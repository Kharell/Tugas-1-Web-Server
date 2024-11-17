<?php
session_start(); // Pastikan session dimulai di atas
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNDIPA ❤️</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        header {
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
             text-align: right;
        }

        /* Sidebar */
        .Sidebar ul li a b {
            color: black;
        }
        nav {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 80px;
            left: 0;
            bottom: 0;
            padding-top: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            padding: 15px 20px;
        }

        nav ul li a {
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        /* Main Content */
        main {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            margin-top: 80px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-header h2 {
            font-size: 24px;
        }

        .content-header a {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* User Profile Dropdown */
        .navbar-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-right .nav-link-user {
            display: flex;
            align-items: center;
        }

        .navbar-right .nav-link-user img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    
<header>
  <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
    <h2 style="margin: 0;">Universitas Dipa Makassar 😘</h2>
    <ul style="list-style-type: none; padding: 0; margin: 0; display: flex; align-items: center;">
      <div>
        <a href="#">
          <!-- Menampilkan gambar profil, gunakan gambar default jika tidak ada -->
          <!-- <img alt="image" src="<?php echo isset($_SESSION['login']['profile_picture']) ? $_SESSION['login']['profile_picture'] : 'default-profile.jpg'; ?>"> -->
          <div>
            Hello, <?php echo isset($_SESSION['login']['username']) ? $_SESSION['login']['username'] : 'Guest'; ?> 😁
          </div>
        </a>
        <div>
          <a href="../logout.php">
            Logout
          </a>
        </div>
      </div>
    </ul>
  </div>
</header>



 <!-- Sidebar -->
<nav class="Sidebar">
    <ul>
        <li><a href="?page=home"><b>Home</b></a></li>
        <li><a href="?page=dosen"><b>Dosen</b></a></li>
        <li><a href="?page=matakuliah"><b>Mata kuliah</b></a></li>
        <li><a href="?page=mahasiswa"><b>Mahasiswa</b></a></li>
        <li><a href="?page=nilai"><b>Nilai</b></a></li>
        <li><a href="?page=report"><b>Report</b></a></li>
    </ul>
</nav>

<!-- Main Content -->
<main class="Main_Content">
    <?php
    // Define a list of valid pages
    $valid_pages = [
        'home' => 'index.php',
        // Dosen
        'dosen' => '../dosen/index.php',
        'tambaDosen' => '../dosen/create.php',
        'lihatDosen' => '../dosen/view.php',
        'editDosen' => '../dosen/edit.php',
        'hapusDosen' => '../dosen/delete.php',

        // Matkul
        'matakuliah' => '../matakuliah/index.php',
        'tambahMatkul' => '../matakuliah/create.php',
        'lihatMatkul' => '../matakuliah/view.php',
        'editMatkul' => '../matakuliah/edit.php',
        'hapusMatkul' => '../matakuliah/delete.php',

        // Mahasiswa
        'mahasiswa' => '../mahasiswa/index.php',
        'tambahMhs' => '../mahasiswa/create.php',
        'lihatMhs' => '../mahasiswa/view.php',
        'editMhs' => '../mahasiswa/edit.php',
        'hapushMhs' => '../mahasiswa/delete.php',

        // Nilai
        'nilai' => '../nilai/index.php',
        'tambahN' => '../nilai/create.php',
        'lihatN' => '../nilai/view.php',
        'editN' => '../nilai/edit.php',
        'hapusN' => '../nilai/delete.php',

        // laporan
        'report' => '../report/index.php'
    ];

    
    $page = $_GET['page'] ?? 'home'; 

    if (array_key_exists($page, $valid_pages)) {
        include $valid_pages[$page];
    } else {
        echo 'Halaman tidak ditemukan.'; 
    }
    ?>
</main>



    <!-- Footer -->
    <footer>
        <div class="footer-left">
            Copyright &copy; 212323 Karolus_Jone_Kalang
        </div>
    </footer>
</body>

</html> 
