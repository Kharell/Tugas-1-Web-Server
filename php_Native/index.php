<?php
session_start();
if(isset($_SESSION['login'])){
  header('Location: dashboard/main.php');
}else{
  header('Location: ./login.php');
}