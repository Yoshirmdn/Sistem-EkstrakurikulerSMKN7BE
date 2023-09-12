<?php

@include 'koneksi.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($connect, $_POST['name']);
   $email = mysqli_real_escape_string($connect, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($connect, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Email Sudah Terpakai';

   }else{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','user')";
         mysqli_query($connect, $insert);
         header('location:login.php');
      }
      //coding email berhasil
    }else{
      $error[] = 'Email Tidak Valid!';

   }
 }

};


?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:05:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <link href="img/lg.png" rel="shortcut icon">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash;System Informasi Ekstrakulikuler</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="img/lg.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Registrasi</h4></div>
              <form action="" method="post">
               <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
               ?>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="name">Masukan Nama Lengkap</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Name
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="email">Masukan Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="emai" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Email
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="d-block">
                     <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                      </div>  
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                    <br>
                     <div class="form-group">
                    <div class="d-block">
                     <label for="password" class="control-label">Confirm Password</label>
                      <div class="float-right">
                      </div>  
                    </div>
                    <input id="password" type="password" class="form-control" name="cpassword" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                   <!-- <div class="form-group">
                    <label for="user_type">User Type</label>
                    <input id="user_type" type="text" class="form-control" name="user_type" value="user" readonly="user" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div> -->
                  </div>
                  <div class="form-group">
                     <button type="submit" name="submit" value="registrasi" class="btn btn-primary btn-lg btn-block"> Register </button>
                     <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
                  </div>


      </div>
   </form>
</div>

<!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
   <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

             
