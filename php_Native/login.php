<?php
require_once 'helper/connection.php';
session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM login WHERE username='$username' and password='$password' LIMIT 1";
  $result = mysqli_query($connection, $sql);

  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $_SESSION['login'] = $row;
    header('Location: index.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; UNDIPA❤️</title>
</head>

<body>
  <br> <br> <br> <br> <br> <br>
  <center>
  <div class="login-container">
    <section>
      <div class="login-form">
        <div class="form-header">
          <h4>Silahkan Login</h4>
        </div>

        <form method="POST" action="" novalidate="">
          <div class="form-group">
            <label for="username">Username :</label>
            <input id="username" type="text" name="username" required autofocus>
          </div>
          <br>
          <div class="form-group">
            <label for="password">Password :</label>
            <input id="password" type="password" name="password" required>
            <span onclick="togglePasswordVisibility()">
              <i id="toggleIcon" class="fa fa-eye"></i>
            </span>
          </div>
          <br>
          <div class="form-group">
            <input type="checkbox" name="remember" id="remember-me">
            <label for="remember-me">Ingat Saya</label>
          </div>
          <br>
          <div class="form-group">
            <button name="submit" type="submit">Login</button>
          </div>
          <br>
          <div class="form-footer">
            <a href="/registrasi.php">Klik Di sini Untuk Registrasi Akun!</a>
          </div>
        </form>
      </div>
  </div>
  <br>
  <br>
  <br>
      <div class="footer">
        Copyright &copy; 212323 Karolus_Jone_Kalang
      </div>
    </section>

  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>

</html>


<style>
.login-container {
  width: 100%;
  max-width: 400px;  
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);   */
  text-align: center;
}
</style>