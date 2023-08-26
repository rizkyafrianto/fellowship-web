<?php
session_start();

if (isset($_SESSION['auth'])) {

   // Redirect ke Views/index.php
   header("Location: Views/index.php");
   exit;
} else {
   header("Location: Views/login.php");
   exit;
}
