<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
  //session_start();
include"koneksi.php"

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/index-0.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:00:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head><link href="img/lg.png" rel="shortcut icon">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; System Informasi Ekstrakulikuler</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

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
        include"sidebar_admin.php";
      ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <!-- anggota -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            
                        <?php
                            $sql2 ="select count(id) as total_anggota from data_peserta where status='diterima'";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $total_anggota       =$r2['total_anggota'];
                               
                                
                        ?><a href="datapeserta.php">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Anggota</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total_anggota?>
                  </div>
                </div>
              </div>
            </div>
            <?php
                            }
            ?></a>
            <!-- pembina -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php
                            $sql2 ="select count(id) as total_pembina from pembina";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $total_pembina       =$r2['total_pembina'];
                               
                                
                        ?> <a href="pembina.php">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                 <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pembina</h4>
                  </div>
                  <div class="card-body">
                   <?php echo $total_pembina?>
                   
                  </div>
                </div>
              </div>
            </div>
                           <?php
                            }
                            ?>
            <!-- eskul -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                         <?php
                            $sql2 ="select count(id) as total_eskul from eskul";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $total_eskul       =$r2['total_eskul'];
                               
                                
                        ?><a href="ekstrakulikuler_admin.php"> 
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                 <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Ekstrakulikuler</h4>
                  </div>
                  <div class="card-body">
                   <?php echo $total_eskul ?>
                  </div>
                </div>
              </div>
            </div>
                            <?php
                            }
                            ?></a>
            <!-- agenda -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php
                            $sql2 ="select count(id) as total_agenda from schedule_list";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $total_agenda       =$r2['total_agenda'];
                               
                                
                        ?>
              <a href="agenda.php"> 
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                 <i class="far fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kegiatan</h4>
                  </div>
                  <div class="card-body">
                   <?php echo $total_agenda ?>
                  </div>
                </div>
              </div>
             </div>                  
          </div>
                            <?php
                            }
                            ?>
            </a>
          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>SMKN 7 Baleendah</h4>
                  <div class="card-header-action">
                   
                  </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9512686541498!2d107.64927911431809!3d-7.015013970664181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f9cd53f7b9%3A0xf84e76c83055f248!2sSMKN%207%20Baleendah!5e0!3m2!1sid!2sid!4v1661688581562!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"style="margin-left : 5px"> </iframe>
                    
                 
                </div>
              </div>
              <div class="card col-lg-4">
              
                <div class="card-header">
                  <h4>Agenda</h4>
                </div>
                <div class="card-body">
                   <?php
                   $today=date('Y-m-d');
                            $sql2 ="select * from schedule_list where start_datetime>='$today'";
                            $q1     = mysqli_query($connect,$sql2);
                            while($r2 = mysqli_fetch_array($q1)){
                                
                                
                        ?>             
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right text-primary"><?php echo $r2['start_datetime'] ?></div>
                        <div class="media-title"><?php echo$r2['title']?></div>
                        <span class="text-small text-muted"><?php echo$r2['description']?>
                      </span>
                      </div>
                    </li>
                           <?php
                            }
                            ?>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="agenda.php" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                </div>
                          
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
  <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from demo.getstisla.com/index-0.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:01:39 GMT -->
</html> 