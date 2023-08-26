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
     WHERE a.status_ajuan = 0 AND a.id_user = :user_id";

         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
         $stmt->execute();

         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

   ?>

         <main class="form-signin w-100 mx-auto mt-2">

            <h1 class="h3 mb-3 fw-normal text-center">Form Validasi Beasiswa</h1>

            <form action="../logic/hasil-validasi.php" method="post" enctype="multipart/form-data">

               <?php foreach ($rows as $row) : ?>

                  <!-- id valid -->
                  <div class="form-floating my-2" style=" display: none;">
                     <input type="hidden" name="val_id" class="form-control" id="id" placeholder="Nama" readonly value="<?= $row['id']; ?>" required>
                     <label for="id">id</label>
                  </div>

                  <!-- name valid -->
                  <div class="form-floating my-2">
                     <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" readonly value="<?= $row['nama_pelamar']; ?>">
                     <label for="nama">Nama</label>
                  </div>

                  <!-- email valid -->
                  <div class="form-floating my-2">
                     <input type="email" class="form-control" name="email" id="email" placeholder="Email" readonly value="<?= $row['email']; ?> ">
                     <label for="email">Email address</label>
                  </div>

                  <!-- number phone valid -->
                  <div class="form-floating my-2">
                     <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP" readonly value="<?= $row['nomor_hp']; ?>">
                     <label for="nomor_hp">Nomor HP</label>
                  </div>

                  <!-- years valid -->
                  <div class="form-floating my-2">
                     <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester saat ini" readonly value="<?= $row['semester']; ?>">
                     <label for="semester">Semester</label>
                  </div>

                  <!-- Ipk valid -->
                  <div class="form-floating my-2">
                     <input type="text" name="ipk" class="form-control" id="ipk" placeholder="Ipk" readonly value="<?= $row['ipk_terakhir']; ?>">
                     <label for="ipk">Ipk terakhir</label>
                  </div>

                  <!-- program valid -->
                  <div class="form-floating my-2">
                     <input type="text" name="program" class="form-control" id="program" placeholder="program" readonly value="<?= $row['program_beasiswa']; ?>">
                     <label for="program">Program Beasiswa</label>
                  </div>

                  <!-- berkas valid -->
                  <div class="form-floating my-2">
                     <img class="my-2" style='border:1px solid black;' src="../assets/folder/<?= $row['berkas_syarat']; ?>" width=70px height=75px>
                     <input type="hidden" name="berkas" class="form-control" id="berkas" placeholder="berkas" readonly value="<?= $row['berkas_syarat']; ?>">
                     <label for="berkas">Bukti Berkas</label>
                  </div>

                  <!-- status valid -->
                  <div class="form-floating my-2">
                     <input type="text" name="status" class="form-control" id="status" placeholder="status" readonly value="<?= $row['status_ajuan'] == 0 ? "Belum Verifikasi" : "Sudah Verifikasi"; ?>">
                     <label for="status">Status</label>
                  </div>

                  <!-- button -->
                  <div class="form-floating-my-3">
                     <input type="submit" onclick="return confirm('Apakah data sudah valid?')" name="validasi" value="Validasi" class="btn btn-sm w-25 btn-success">

                     <input type="submit" onclick="return confirm('Ingin membatalkan pendaftaran?')" name="batal" value="Batal" class="btn btn-sm btn-danger w-25">
                  </div>


               <?php endforeach; ?>

         <?php   }
   } ?>

            </form>

         </main>

</div>


<?php
include_once 'includes/inc_footer.php';
?>