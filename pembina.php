<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
  
include 'koneksi.php';
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
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
            <h1>Pembina</h1>
           <!--  <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Ekstrakulikuler</a></div>
              <div class="breadcrumb-item">Pembina</div>
            </div> -->
          </div>

          <!-- /.card-header --> 
            <div class="row">
              <div class="col-12">
                <div class="card">             
                 <div class="card-header">
                  <div class="table-responsive">                
                  <a href="form_simpan.php" class="btn btn-primary">
                    <i class="fa fa-edit"></i>Tambah Data</a>
                  </div>
               <br>
              </div>
              <div class="card-body">
               <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
               <thead>

                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Ekstrakulikuler</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </tbody>

            <?php

            $no = 1;
            $sql = $connect->query("SELECT * from pembina order by nama asc");
              while ($data= $sql->fetch_assoc()) {
            ?>

          <tr>
            <td>
              <?php echo $no++; ?>
            </td>
            <td align="center">
              <img src="foto/<?php echo $data['foto']; ?>" width="100px" />
            </td>
            <td>
              <?php echo $data['nama']; ?>
            </td>
            <td>
              <?php echo $data['jabatan']; ?>
            </td>
            <td>
              <?php echo $data['ekstrakulikuler']; ?>
            </td>

            <td>
              <a href="form_update.php?id=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
                <i class="fa fa-edit">Edit</i>
              </a>
              <a href="proses_hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
               title="Hapus" class="btn btn-danger btn-sm">
                <i class="fas fa-times">Hapus</i>
            </td>
          </tr>

          <?php
              }
            ?>

        </tbody>
        </tfoot>
      </table>
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
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>

</body>

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
</html>