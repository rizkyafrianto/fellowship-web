<?php
include_once "includes/inc_header.php";
?>

<div id="content">

   <main class="form-signin w-100 mx-auto mt-2">

      <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi Beasiswa</h1>

      <form action="../logic/daftar-logic.php" method="post" enctype="multipart/form-data">

         <!-- id input -->
         <div class="form-floating my-2" style="display: none;">
            <input type="hidden" class="form-control" name="auth_email" id="auth_email" placeholder="auth_email" required value="<?= $_SESSION['auth']; ?>">
            <label for="auth_email">auth_email</label>
         </div>

         <!-- name input -->
         <div class="form-floating my-2">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
            <label for="nama">Nama</label>
         </div>

         <!-- email input -->
         <div class="form-floating my-2">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="">
            <label for="email">Email address</label>
         </div>

         <!-- number phone input -->
         <div class="form-floating my-2">
            <input type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP" required value="">
            <label for="nomor_hp">Nomor HP</label>
         </div>

         <!-- years input -->
         <div class="form-floating my-2">
            <select class="form-control" name="semester" id="semesterSelect" placeholder="semester" required value="">
            </select>
            <label for="semesterSelect">Semester saat in</label>
         </div>

         <!-- GPA input -->
         <div class="form-floating my-2">
            <input type="text" name="ipk" class="form-control" id="ipkSelect" placeholder="IPK" required value="">
            <label for="ipkSelect">IPK Terakhir</label>
         </div>

         <!-- program input -->
         <div class="form-floating my-2">
            <select name="beasiswa" id="selectBeasiswa" class="form-control" placeholder="Beasiswa" required value="">
               <option value="">Pilih Program Beasiswa: </option>
               <option value="Beasiswa Akademik">akademik</option>
               <option value="Beasiswa Non-akademik">non akademik</option>
            </select>
            <label for="selectBeasiswa">Program Beasiswa</label>
         </div>

         <!-- file input -->
         <div class="form-floating my-2">
            <input type="file" class="form-control" name="berkas" id="uploadBerkas" placeholder="Upload Berkas" required value="">
            <label for="uploadBerkas">Upload Berkas</label>
         </div>

         <!-- button -->
         <div class="form-floating my-3">
            <input type="submit" name="simpan" value="Simpan" class="btn w-25 btn-sm btn-success" id="simpanButton">

            <input type="submit" name="batal" value="Batal" class="btn w-25 btn-sm btn-danger">
         </div>
      </form>

   </main>

</div>


<?php
include_once 'includes/inc_footer.php';
?>