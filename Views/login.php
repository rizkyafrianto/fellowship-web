<?php
session_start();

if (isset($_SESSION['auth'])) {
   header("Location: index.php");
} else {

?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login GoBeyond</title>

      <!-- Bootstrap Icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

      <!-- CDN Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">

      <style>
         body {
            background-color: #f9f9f9;
         }
      </style>

   </head>

   <body>

      <div class="container">
         <div class="row">
            <div class="col-lg-12">

               <main class="form-signin w-100 mx-auto">

                  <h1 class="h3 mb-3 fw-normal text-center mt-5">Welcome</h1>

                  <form action="../logic/login-validation.php" method="post">

                     <div class="form-floating my-2">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="">
                        <label for="email">Email address</label>
                     </div>
                     <div class="form-floating my-2">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                     </div>

                     <button class="w-100 btn btn-lg btn-success mt-3" type="submit" name="login">Sign in</button>
                  </form>

                  <small class="d-block text-center mt-2">Not already have accout?
                     <a href="register.php">
                        Register now
                     </a>
                  </small>
               </main>

            </div>
         </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

      <script src="../js/function.js"></script>

   </body>

   </html>

<?php } ?>