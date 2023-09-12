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
  <title> Informasi &mdash; System Informasi Ekstrakulikuler</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

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
            <h1>Informasi Ekstrakulikuler</h1>
           <!--  <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div> -->
          </div>

          <div class="section-body">
            <h2 class="section-title">Ekstrakulikuler</h2>
            <p class="section-lead">Berikut merupakan Ekstrakulikuler yang terdapat di sekolah</p>
            <div class="row">
            <?php
              include"koneksi.php";
              $sql2 ="select * from eskul order by nama asc";
              $q1     = mysqli_query($connect,$sql2);
              $urut   = 1;
              while($r2 = mysqli_fetch_array($q1)){
              $id          =$r2['id'];
              $eskul        =$r2['nama'];
              // $pembina        =$r2['pembina'];
              $deskripsi       =$r2['deskripsi'];
              $foto       =$r2['foto'];
              $ig       =$r2['ig'];
              $logo =$r2['logo'];
              $ringkasan=$r2['ringkasan'];
              ?>
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4><?=$eskul?></h4>
                    <div class="card-header-action">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$id?>">
                       View All
                      </button>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="mb-2 text-muted"><?=$ringkasan?>
                    </div>
                    <div class="chocolat-parent">
                      <div data-crop-image="285">
                          <img alt="image" src="foto/eskul/<?=$foto?>"title="<?=$eskul?> SMKN 7 Baleendah" class="img-fluid">
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
    
         

        
        </section>
      </div>
      <?php
     include"footer.php";
     ?>
    </div>
      
      <!-- modal  -->
      <?php
        include"koneksi.php";
        $sql2 ="select * from eskul ";
        $q1     = mysqli_query($connect,$sql2);
        $urut   = 1;
        while($r2 = mysqli_fetch_array($q1)){
        $id          =$r2['id'];
        $eskul        =$r2['nama'];
        $deskripsi       =$r2['deskripsi'];
        $foto       =$r2['foto'];
        $logo =$r2['logo'];
        $ig       =$r2['ig'];
        ?>
      <div class="modal fade" id="modal<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?=$eskul?></h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="foto/eskul/<?=$logo?>" title="<?=$eskul?> SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"><?=$deskripsi?><br>
              Follow Ekstrakulikuler <?=$eskul?> on <br>
              <a href="<?=$ig?>" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>
  

  
  <!-- JS Libraies -->
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>


  <!-- Page Specific JS File -->
  <script src="assets/js/page/components-user.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
</html>