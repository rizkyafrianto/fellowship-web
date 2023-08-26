<?php

require_once __DIR__ . '/../config.php';

$conn = getConnection();

$conn->beginTransaction();

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if (isset($_POST['register'])) {

   $sql = "SELECT * FROM users WHERE email = :email";
   // Prepare statement
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':email', $email); // Bind parameter

   // Execute
   $stmt->execute();

   // Fetch rows
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

   if (count($rows) > 0) {
      echo "<script>
            alert('Email sudah terdaftar!');
          </script>";

      echo "<meta http-equiv='refresh' content='0;url=../Views/register.php'>";

      return false;
   }

   // cek konfirmasi password
   if ($password !== $password2) {
      echo "<script>
                alert('konfirmasi password tidak sesuai!');
                </script>";

      echo "<meta http-equiv='refresh' content='0;url=../Views/register.php'>";

      return false;
   } else {
      // enkripsi password
      $password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)";

      $stmt = $conn->prepare($sql);

      if ($stmt->execute([$nama, $email, $password])) {

         $conn->commit();
         // Jika eksekusi berhasil, tampilkan alert success
         echo '<script>alert("Berhasil Registrasi");</script>';
         echo "<meta http-equiv='refresh' content='0;url=../Views/login.php'>";
      } else {
         echo '<script>alert("Gagal Registrasi");</script>';
         echo "<meta http-equiv='refresh' content='0;url=../Views/register.php'>";

         exit;
      }
   }
}
