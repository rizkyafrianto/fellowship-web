<?php
include_once "includes/inc_header.php";
?>

<div id="content">
   <?php
   $conn = getConnection();

   if (isset($_GET['email'])) {
      $auth_email = $_GET['email'];

      // Persiapkan query
      $sql = "SELECT id FROM users WHERE email = :auth_email";

      // Persiapkan statement
      $stmt = $conn->prepare($sql);

      // Bind parameter email
      $stmt->bindParam(':auth_email', $auth_email, PDO::PARAM_STR);

      // Eksekusi statement
      $stmt->execute();

      // Ambil hasil
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      // Cek apakah data ditemukan
      if ($result) {
         $user_id = $result['id'];

         // Buat query kedua
         $sql = "SELECT a.id, a.nama_pelamar, a.email, a.nomor_hp, a.semester, a.ipk_terakhir, a.program_beasiswa, a.berkas_syarat, a.status_ajuan
     FROM fellowships AS a
     INNER JOIN users AS b ON a.id_user = b.id
     WHERE a.status_ajuan = 1 AND a.id_user = :user_id";

         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
         $stmt->execute();

         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   ?>

         <main class="form-signin w-100 mx-auto mt-2">

            <h1 class="h3 mb-3 fw-normal text-center">Program yang Diikuti</h1>


            <div class="row">

               <?php foreach ($rows as $row) : ?>

                  <div class="card my-2">
                     <img class="mx-auto my-2" src="../assets/images/akademik.png" alt="..." width="100px">
                     <div class="card-body">
                        <h5 class="card-title"><?= $row['program_beasiswa']; ?></h5>
                        <input type="text" name="val_id" class="form-control" id="id" placeholder="Nama" readonly value="ID Pendaftaran : <?= $row['id']; ?>" required>

                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" readonly value="Nama: <?= $row['nama_pelamar']; ?>">

                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" readonly value="Email: <?= $row['email']; ?> ">

                        <input type="text" name="program" class="form-control" id="program" placeholder="program" readonly value=" Program: <?= $row['program_beasiswa']; ?>">

                        <input type="text" name="status" class="form-control" id="status" placeholder="status" readonly value="Status: <?= $row['status_ajuan'] == 0 ? "Belum Verifikasi" : "Seleksi"; ?>">
                     </div>
                  </div>

               <?php endforeach; ?>

            </div>


      <?php }
   }
      ?>

         </main>

</div>


<?php
include_once 'includes/inc_footer.php';
?>