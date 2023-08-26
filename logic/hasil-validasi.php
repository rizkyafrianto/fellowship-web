<?php

require_once '../config.php';

$conn = getConnection();

$val_id = intval($_POST['val_id']);

$conn->beginTransaction();

if (isset($_POST['validasi'])) {

   $query = "SELECT id_user FROM fellowships WHERE id = :id";
   $select = $conn->prepare($query);
   $select->bindParam(':id', $val_id, PDO::PARAM_INT); // Bind parameter with proper data type
   $select->execute();
   $result = $select->fetch(PDO::FETCH_ASSOC);

   if ($result) {
      $id_user = $result['id_user'];

      // Now get the email associated with the user id
      $query_user = "SELECT email FROM users WHERE id = :id_user";
      $select_user = $conn->prepare($query_user);
      $select_user->bindParam(':id_user', $id_user, PDO::PARAM_INT);
      $select_user->execute();
      $result_user = $select_user->fetch(PDO::FETCH_ASSOC);

      if ($result_user) {
         $email = $result_user['email'];

         $sql = "UPDATE fellowships SET status_ajuan = 1 WHERE id = ?";

         $stmt = $conn->prepare($sql);

         if ($stmt->execute([$val_id])) {

            $conn->commit();
            // Jika eksekusi berhasil, tampilkan alert success
            echo '<script>alert("Pendaftaran Beasiswa Berhasil Divalidasi!");</script>';
            echo "<meta http-equiv='refresh' content='0;url=../Views/profile.php?email=$email'>";
         } else {
            // Jika eksekusi gagal, tampilkan pesan error
            echo "Error: " . $stmt->errorInfo()[2];
         }
      }
   }
} else if (isset($_POST['batal'])) {

   $sql = "DELETE FROM fellowships WHERE status_ajuan = 0";

   $stmt = $conn->prepare($sql);

   if ($stmt->execute()) {

      $conn->commit();

      echo '<script>alert("Pendaftarn Dibatalkan!");</script>';
      echo "<meta http-equiv='refresh' content='0;url=../Views/hasil.php'>";
   }

   exit;
}
