<?php include_once __DIR__ . '/includes/inc_header.php'; ?>

<div class="container-fluid">
   <div class="aboutBeasiswa">
      <div class="row">
         <div class="col-md-12 my-2 text-center">
            <div class="img-container">
               <!-- <img src="../assets/images/grad.jpg" alt=""> -->
               <p>GoBeyond adalah Program yang memberikan kesempatan Beasiswa para mahasiswa/mahasiswi yang ingin serius menempuh pendidikan. Program ini merupakan kerja sama Kemdikbud dengan Kemenpora </p>
               <a href="#programBeasiswa" aria-current="page" data-id="programBeasiswa" class="btn btn-primary mt-5">Telusuri Program</a>
            </div>
         </div>
      </div>
   </div>


   <section class="programBeasiswa" id="programBeasiswa">
      <h1 class="h3 fw-normal text-center mb-5">Beasiswa Unggulan</h1>

      <div class="row justify-content-center">
         <div class="col-2">
            <!-- Empty column for spacing -->
         </div>
         <div class="col-3">
            <div class="card" style="width: 18rem;">
               <img src="../assets/images/akademik.png" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Beasiswa Akademik</h5>
                  <p class="card-text"> Beasiswa akademik adalah bentuk bantuan keuangan yang diberikan kepada mahasiswa yang telah mencapai prestasi akademik yang tinggi</p>
                  <a href="daftar.php" class="btn btn-primary">Daftar</a>
               </div>
            </div>
         </div>
         <div class="col-3">
            <div class="card" style="width: 18rem;">
               <img src="../assets/images/non-akademik.png" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Beasiswa Non-akademik</h5>
                  <p class="card-text"> Beasiswa yang diberikan kepada mahasiswa berdasarkan faktor-faktor di luar prestasi akademik kriteria yang tidak terkait dengan penilaian akademik</p>
                  <a href="daftar.php" class="btn btn-primary">Daftar</a>
               </div>
            </div>
         </div>
         <div class="col-2">
            <!-- Empty column for spacing -->
         </div>
      </div>
   </section>


   <section class="syaratBeasiswa">
      <h1 class="h3 fw-normal text-center mb-5">Persyaratan Beasiswa</h1>

      <div class="row justify-content-center mx-5">
         <div class="col-10">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Beasiswa Akademik</th>
                     <th scope="col">Beasiswa Non-akademik</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">Jenjang Pendidikan</th>
                     <td>S1 atau Vokasi</td>
                     <td>S1 atau Vokasi</td>
                  </tr>
                  <tr>
                     <th scope="row">Minimal IPK</th>
                     <td>3 dari skala 4</td>
                     <td>3 dari skala 4</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </section>

</div>



<?php include_once __DIR__ . '/includes/inc_footer.php'; ?>