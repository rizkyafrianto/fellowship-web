<?php require_once __DIR__ . '/../../config.php';

session_start();

if (isset($_SESSION['auth'])) {
   /**
    * 
    */
} else {
   header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Beasiswa Unggulan</title>

   <!-- Bootstrap Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

   <!-- CDN Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

   <!-- style css -->
   <link rel="stylesheet" href="../css/style.css">
</head>

<body onload="isiIPKOtomatis() & cekIPK()">

   <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
         <div class="d-flex">
            <a class="navbar-brand" href="#"><i class="bi bi-rocket-takeoff"></i> GoBeyond</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
         </div>

         <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item mx-5">
                  <a class="nav-link" aria-current="page" href="../index.php"> Program Beasiswa</a>
               </li>
               <li class="nav-item mx-5">
                  <a class="nav-link" href="daftar.php">Daftar Beasiswa</a>
               </li>
               <li class="nav-item mx-5">
                  <a class="nav-link" href="hasil.php?email=<?php echo $_SESSION['auth']; ?>">Validasi</a>
               </li>
            </ul>
            <div class="navbar-collapse justify-content-end mx-5">
               <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                        <li><a class="dropdown-item btn btn-tertiary" href="../Views/profile.php?email=<?php echo $_SESSION['auth']; ?>"><i class="bi bi-person-fill"> <?php echo $_SESSION['auth']; ?></i>
                           </a>
                        </li>
                        <li>
                           <a href="../logic/logout.php" onclick="return confirm('apakah yakin ingin logout?')" class="dropdown-item btn btn-tertiary"><i class="bi bi-box-arrow-in-right"> Logout</i></a>

                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>

   <div class="container-fluid">