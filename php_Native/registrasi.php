<?php
require_once 'helper/connection.php';
session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
      header('Location: login.php');
    } else {
      echo "Error: " . mysqli_error($connection);
    }
  } else {
    echo "Passwords do not match.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; UNDIPA❤️</title>
  </head>

<body>
  <br> <br> <br> <br> <br> <br>
  <center>
  <div class="register-container">
    <section>
      <div class="register-form">
        <div class="form-header">
          <h4>Registrasi Akun</h4>
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
            <span onclick="togglePasswordVisibility('password', 'togglePasswordIcon')">
              <i id="togglePasswordIcon" class="fa fa-eye"></i>
            </span>
          </div>
          <br>
          <div class="form-group">
            <label for="confirm_password">Confirm Password :</label>
            <input id="confirm_password" type="password" name="confirm_password" required>
            <span onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPasswordIcon')">
              <i id="toggleConfirmPasswordIcon" class="fa fa-eye"></i>
            </span>
          </div>
          <br>
          <div class="form-group">
            <button name="submit" type="submit">Register</button>
          </div>
          <br>
          <div class="form-footer">
            <a href="/login.php">Klik Di sini Untuk Login!</a>
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
    function togglePasswordVisibility(inputId, iconId) {
      const passwordInput = document.getElementById(inputId);
      const toggleIcon = document.getElementById(iconId);
      
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
.register-container {
  width: 100%;
  max-width: 400px;  
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);   */
  text-align: center;
}
</style>