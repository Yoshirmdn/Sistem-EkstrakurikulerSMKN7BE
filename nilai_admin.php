<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
include"koneksi.php";
$nis    ="";
$nama   ="";
$kelas  ="";
$eskul  ="";
$nilai  ="";
$sukses ="";
$error  ="";

if(isset($_GET['op'])){
    $op =$_GET['op'];

}else{
    $op    ="";
}
if($op == 'delete'){
    $id     =$_GET['id'];
    $sql1   ="delete from nilai where id_nilai = '$id'";
    $q1 =mysqli_query ($connect,$sql1);
    if($q1){
      echo "<script>
      alert('Data Telah dihapus');
      window.location.href='nilai_admin.php';
      </script>";

    }else{
        $error ="gagal hapus";
    }
}
if($op == 'cari'){
  $nis     = $_GET['nis'];
  $sql1   ="select * from anggota where nis = '$nis'";
  $q1 = mysqli_query($connect,$sql1);
  $r1     =mysqli_fetch_array($q1);
  $nis    =$r1['nis'];
  $nama   =$r1['nama'];
  $kelas  =$r1['kelas'];
  $eskul  =$r1['eskul'];
 
  if($nis == ""){
      $error ="data tidak ada";
  }
}

if($op == 'edit'){
    $id     = $_GET['id'];
    $sql1   ="select * from nilai where id_nilai = '$id'";
    $q1 = mysqli_query($connect,$sql1);
    $r1     =mysqli_fetch_array($q1);
    $nis    =$r1['nis'];
    $nama   =$r1['nama'];
    $kelas  =$r1['kelas'];
    $nilai  =$r1['nilai'];
    $eskul  =$r1['eskul'];
   
    if($nis == ""){
        $error ="data tidak ada";
    }
}

if(isset($_POST['simpan'])){
    $nis    =$_POST['nis'];
    $nama   =$_POST['nama'];
    $kelas  =$_POST['kelas'];
    $eskul  =$_POST['eskul'];
    $nilai  =$_POST['nilai'];
   

    if($nis && $nama && $kelas && $eskul && $nilai ){
        if($op == 'edit'){
            $sql1 ="update nilai set nis = '$nis',nama='$nama',kelas='$kelas',eskul='$eskul',nilai='$nilai' where id_nilai = '$id'";
            $q1 =mysqli_query($connect,$sql1);
            if($q1){
                $sukses = "data berhasil diedit";
            }else{
                $error ="Data gagal diedit";
            }
        }else{
             $sqlceknis=mysqli_query($connect,"Select * from nilai where nis='$nis'");
        $ceknis = mysqli_num_rows($sqlceknis);
        if($ceknis<1){
            $sql1   = "insert into nilai(nis,nama,kelas,eskul,nilai) values('$nis','$nama','$kelas','$eskul','$nilai')";
            $q1     = mysqli_query($connect, $sql1);
            if($q1){
                $sukses ="Berhasil Input Data";
                  
             }
             else{
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
  <title> Nilai &mdash; System Informasi Ekstrakulikuler</title>


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
      include "sidebar_admin.php";
      
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Nilai</h1>
           <!--  <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Ekstrakulikuler</a></div>
              <div class="breadcrumb-item">Nilai</div>
            </div> -->
          </div>

         <!--  <div class="section-body">
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
             
              <div class="card-body">
                <div class="card-body p-0">
                  <div class="row">
              <div class="col-12">
                <div class="card">
                <?php
                if($error){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $error?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($sukses){
                    ?>
                    <div class="alert alert-success" role="success ">
                    <?php echo $sukses?>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group col-6">
                        <label for="nis">NIS</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder=""name="nis"id="nis"value="<?=$nis?>"onkeyup="autofill()" aria-label="">
                       
                      </div>
                       
                    </div>
                    <div class="form-group col-6">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama"value="<?php echo $nama?>" class="form-control" >
                    </div>
                    <div class="form-group col-6">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas" > 
                        <option value="<?=$kelas?>">Pilih</option>
                        <?php
                            $sql2 ="select * from dt_kelas ";
                            $q1     = mysqli_query($connect,$sql2);
                           
                            while($r2 = mysqli_fetch_assoc($q1)){
                              ?>

                        <option value="<?php echo $r2['kelas']?>"><?= $r2['kelas']?></option>
                        <?php
                            }
                            ?>
                        </select>
                    </div>
                     <div class="form-group col-6">
                        <label for="nilai">Nilai</label>
                        <input type="text"id="nilai" name="nilai"value="<?php echo $nilai?>" class="form-control"  >
                    </div>
                    <div class="form-group col-6">
                        <label>Ekstrakulikuler</label>
                        <select class="form-control" id="eskul" name="eskul" > 
                        <option value="<?=$eskul?>">pilih</option>
                        <?php
                            $sql2 ="select * from eskul ";
                            $q1     = mysqli_query($connect,$sql2);
                           
                            while($r2 = mysqli_fetch_assoc($q1)){
                              ?>

                        <option value="<?php echo $r2['nama']?>"><?= $r2['nama']?></option>
                        <?php
                            }
                            ?>
                        </select>
                    </div>
                   
                    
                    <button type="submit" name="simpan" value="simpan data" class="btn btn-primary">Simpan data</button>
    
              </form> 
                  <div class="card-header">
                    
                    <h4>Tabel Nilai</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th scope="col"># </th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Ekstrakulikuler</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                            
                          </tr>
                          <tbody>  
                            <?php
                            $sql2 ="select * from nilai order by id_nilai desc";
                            $q1     = mysqli_query($connect,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q1)){
                                $id          =$r2['id_nilai'];
                                $nis         =$r2['nis'];
                                $nama        =$r2['nama'];
                                $kelas       =$r2['kelas'];
                                $eskul       =$r2['eskul'];
                                $nilai       =$r2['nilai'];
                                ?>
                            <tr>
                                <td><?php echo $urut++?></td>
                                <td><?php echo $nis?></td>
                                <td><?php echo $nama?></td>
                                <td><?php echo $kelas?></td>
                                <td><?php echo $eskul?></td>
                                <td><?php echo $nilai?></td>
                                <td>
                                <a href="nilai_admin.php?op=edit&id=<?php echo $id?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i>Edit</a>
       
                                <a href="nilai_admin.php?op=delete&id=<?php echo$id?>"onclick="return confirm('Yakin Delete Data?')" class="btn btn-icon btn-danger"><i class="fas fa-times"></i>Hapus</a>

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
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   --><script type="text/javascript">
    function autofill(){
      var nis=$("#nis").val();
      $.ajax({
        url:'autofill-ajax.php',
        data : 'nis='+nis,
        success: function(data){
       var json =data,
       obj =JSON.parse(json);
       $("#nama").val(obj.nama);
       $("#kelas").val(obj.kelas);
       $("#eskul").val(obj.ekskul);
      },
    });
    }
  </script>


  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>
  <script src="assets/js/page/modules-sweetalert.js"></script>
  
  
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