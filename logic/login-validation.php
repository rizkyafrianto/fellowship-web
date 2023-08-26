<?php
session_start();

require_once __DIR__ . "/../config.php";

$conn = getConnection();

$conn->beginTransaction();

// set login logic
if (isset($_POST["login"])) {

   $email = $_POST["email"];
   $password = $_POST["password"];

   // Persiapkan prepared statement untuk mengambil data berdasarkan email
   $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
   $stmt->bindParam(1, $email);
   $stmt->execute();

   // Ambil hasil query
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   // cek username
   if ($user) {

      // cek password
      if (password_verify($password, $user["password"])) {

         // set session
         $_SESSION["auth"] = true;

         $_SESSION["auth"] = $user["email"];

         echo "<script>alert('Login Success');</script>";
         echo "<meta http-equiv='refresh' content='0; url=../index.php'>";

         $conn->commit();

         exit;
      } else {
         echo "<script>alert('Invalid Login');</script>";
         echo "<meta http-equiv='refresh' content='0;url=../Views/login.php'>";
         $conn->rollback();
      }
   } else {
      echo "<script>alert('Invalid Login');</script>";
      echo "<meta http-equiv='refresh' content='0;url=../Views/login.php'>";
      $conn->rollback();
   }
}
