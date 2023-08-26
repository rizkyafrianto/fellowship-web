<?php

require_once '../config.php';

$conn = getConnection();

$conn->beginTransaction();

$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor_hp = $_POST['nomor_hp'];
$semester = intval($_POST['semester']);
$ipk = floatval($_POST['ipk']);
$beasiswa = $_POST['beasiswa'];
$auth_email = $_POST['auth_email'];
$file_berkas = "";

if (isset($_POST['simpan'])) {
   extract($_POST);
   $nama_file = $_FILES['berkas']['name'];

   if (!empty($nama_file)) {
      $lokasi_file = $_FILES['berkas']['tmp_name'];
      $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
      $file_berkas = "fd-" . $email . "." . $tipe_file;

      $folder = "../assets/folder/$file_berkas";

      move_uploaded_file($lokasi_file, "$folder");
   } else {
      $file_berkas = "-";
   }

   // Get user id from auth email
   $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
   $stmt->execute([$auth_email]);
   $id_user = $stmt->fetch(PDO::FETCH_ASSOC);

   // Insert id to fellowships id_user
   if ($id_user) {
      $id_user = intval($id_user['id']);

      $sql = "INSERT INTO fellowships (nama_pelamar, email, nomor_hp, semester, ipk_terakhir, program_beasiswa, berkas_syarat, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($sql);

      // Execute statement
      if ($stmt->execute([$nama, $email, $nomor_hp, $semester, $ipk, $beasiswa, $file_berkas, $id_user])) {

         $conn->commit();
         // If execution is successful, show success alert
         echo '<script>alert("Data berhasil disimpan!");</script>';
         echo "<meta http-equiv='refresh' content='0;url=../Views/hasil.php?email=$email'>";
      } else {
         // If execution fails, show error message
         echo "Error: " . $stmt->errorInfo()[2];
      }
   }
}
