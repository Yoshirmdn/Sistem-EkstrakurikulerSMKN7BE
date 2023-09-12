<?php
session_start();
if (!isset($_SESSION["user_name"])) {
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head><link href="img/lg.png" rel="shortcut icon">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pembina &mdash;System Informasi Ekstrakulikuler</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php
      include"sidebar.php";
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pembina</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Ekstrakulikuler</a></div>
              <div class="breadcrumb-item">Pembina</div>
            </div> -->
          </div>

            <div class="row">
              <?php 
              include"koneksi.php";
              $q="SELECT * from pembina order by nama asc";
              $sql2=mysqli_query($connect,$q);
              while($r=mysqli_fetch_array($sql2)){
              

              ?>
              <div class="col-6 col-sm-12 col-lg-6">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <img alt="image" src="foto/<?=$r['foto']?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#"><?=$r['nama'];?></a>
                      </div>
                      <div class="author-box-description">
                        <p><ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Jabatan</strong><br><span><?=$r['jabatan'];?></span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Ekstrakulikuler</strong><br><span><?=$r['ekstrakulikuler'];?></span></li>
                        
                       </ul></p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
                      <?php 
                    }
                      ?>  
      
         
                </div>
              </div>
          </div>
        </section>
      </div>
     <?php
     include"footer.php";
     ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
</html>