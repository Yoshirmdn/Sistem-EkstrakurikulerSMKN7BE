<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
include"koneksi.php";
$nis        ="";
$nama       ="";
$kelas      ="";
$ekskul     ="";
$jk         ="";
$tmp_lahir  ="";
$tgl_lahir  ="";
$no_hp      ="";
$alamat     ="";
$sukses     ="";
$error      ="";

if(isset($_GET['op'])){
    $op =$_GET['op'];

}else{
    $op    ="";
}
if($op == 'delete'){
    $id     =$_GET['id'];
    $sql1   ="delete from data_peserta where id = '$id'";
    $q1 =mysqli_query ($connect,$sql1);
    if($q1){
        $sukses ="berhasil hapus";

    }else{
        $error ="gagal hapus";
    }
}
if($op == 'terima'){
    $id     = $_GET['id'];
    $sql1   ="UPDATE `data_peserta` SET `status` = 'diterima' WHERE `data_peserta`.`id` = $id"; 
    $q1     = mysqli_query($connect,$sql1);

    }
if($op == 'edit'){
    $id     = $_GET['id'];
    $sql1   ="select * from data_peserta where id = '$id'";
    $q1     = mysqli_query($connect,$sql1);
    $r1       =mysqli_fetch_array($q1);
    $nis       =$r1['nis'];
    $nama      =$r1['nama'];
    $kelas     =$r1['kelas'];
    $ekskul    =$r1['ekskul'];
    $jk        =$r1['jk'];
    $tmp_lahir =$r1['tmp_lahir'];
    $tgl_lahir =$r1['tgl_lahir'];
    $no_hp     =$r1['no_hp'];
    $alamat    =$r1['alamat'];
   
    if($nis == ""){
        $error ="data tidak ada";
    }
}

if(isset($_POST['simpan'])){
    $nis        =$_POST['nis'];
    $nama       =$_POST['nama'];
    $kelas      =$_POST['kelas'];
    $ekskul     =$_POST['eskul'];
    $jk         =$_POST['jk'];
    $tmp_lahir  =$_POST['tmp_lahir'];
    $tgl_lahir  =$_POST['tgl_lahir'];
    $no_hp      =$_POST['no_hp'];
    $alamat     =$_POST['alamat'];
   

    if($nis && $nama && $kelas && $ekskul && $jk && $tmp_lahir && $tgl_lahir && $no_hp && $alamat){
        if($op == 'edit'){
            $sql1 ="insert into data_peserta(nis,nama,kelas,ekskul,jk,tmp_lahir,tgl_lahir,no_hp,alamat) values('$nis','$nama','$kelas','$ekskul','$jk','$tmp_lahir','$tgl_lahir','$no_hp','$alamat')";
            $q1 =mysqli_query($connect,$sql1);
            if($q1){
                $sukses = "data berhasil diedit";
            }else{
                $error ="Data gagal diedit";
            }
        }else{
             $sqlceknis=mysqli_query($connect,"Select * from data_peserta where nis='$nis'");
        $ceknis = mysqli_num_rows($sqlceknis);
        if($ceknis<1){
            $sql1   = "insert into data_peserta(nis,nama,kelas,ekskul,jk,tmp_lahir,tgl_lahir,no_hp,alamat) values('$nis','$nama','$kelas','$ekskul','$jk','$tmp_lahir','$tgl_lahir','$no_hp','$alamat')";
            $q1     = mysqli_query($connect, $sql1);
            if($q1){
                $sukses ="Berhasil Input Data";
             }else{
                $error  ="Gagal Input Data";
            }

        }else{
            $error ="NIS Sudah Digunakan";
        }

        }
       

        
    }else{
        $error ="Data Harus Diisi";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head><link href="img/lg.png" rel="shortcut icon">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> Pendaftaran &mdash; System Informasi Ekstrakulikuler</title>

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
            <h1>Data Pendaftar Ekstrakulikuler</h1>
           <!--  <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Ekstrakulikuler</a></div>
              <div class="breadcrumb-item">Data Peserta</div>
            </div> -->
          </div>

          <div class="section-body">
           <h2 class="section-title">Pendaftaran</h2>
            <p class="section-lead">Berikut Data Pendaftaran Ekstrakulikuler.</p>
            <div class="card">
             
              <div class="card-body">
                <div class="card-body p-0">
                  <div class="row">
             
                  <div class="card-header">
                    
                    <h4>Data Pendaftar Ekstrakulikuler</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Ekstrakulikuler</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                            
                          </tr>
                          <tbody>  
                            <?php
                            $sql2 ="select * from data_peserta  where status='tunggu' order by id desc";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $id          =$r2['id'];
                                $nis         =$r2['nis'];
                                $nama        =$r2['nama'];
                                $kelas       =$r2['kelas'];
                                $ekskul      =$r2['ekskul'];
                                $jk          =$r2['jk'];
                                $tmp_lahir   =$r2['tmp_lahir'];
                                $tgl_lahir   =$r2['tgl_lahir'];
                                $no_hp       =$r2['no_hp'];
                                $alamat      =$r2['alamat'];
                                ?>
                            <tr>
                                <td><?php echo $urut++?></td>
                                <td><?php echo $nis?></td>
                                <td><?php echo $nama?></td>
                                <td><?php echo $kelas?></td>
                                <td><?php echo $ekskul?></td>
                                <td><?php echo $jk?></td>
                                <td><?php echo $tmp_lahir?></td>
                                <td><?php echo $tgl_lahir?></td>
                                <td><?php echo $no_hp?></td>
                                <td><?php echo $alamat?></td>
                                <td>
                                <a href="pendaftaran.php?op=terima&id=<?php echo $id?>" class="btn btn-success"><i class="far fa-edit"></i>Terima</a>
       
                                <a href="pendaftaran.php?op=delete&id=<?php echo$id?>"onclick="return confirm('Yakin Delete Data?')" class="btn btn-icon btn-danger"><i class="fas fa-times"></i>Tolak</a>

                                </td>
                            </tr>
                                
                                <?php
                            }
                            ?>                              
                        </tbody>
                        </thead>
                       
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                </div>
                <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                      <!--<li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                      </li>-->
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="card-footer bg-whitesmoke">
         
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