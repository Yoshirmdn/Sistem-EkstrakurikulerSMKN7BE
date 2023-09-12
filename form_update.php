<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
  include "koneksi.php";

  $jabatan= "";
  $ekstrakulikuler= "";                  
  
  $id = $_GET['id'];
  
  
  $query = "SELECT * FROM pembina WHERE id='".$id."'";
  $sql = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($sql); 
  ?>
<head><link href="img/lg.png" rel="shortcut icon">
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
</head>
<body>

    <div class="navbar-bg"></div>
      <?php
      include"sidebar_admin.php";
      ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pembina</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Ekstrakulikuler</a></div>
              <div class="breadcrumb-item">Pembimbing</div>
            </div>
          </div>    
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fa fa-edit"></i>Edit Data</h3>
                </div>
                
              <div class="card-body">
               <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                         
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="nama" value="<?php echo $data['nama']; ?>" name="nama" placeholder="Nama" required>
              </div>
            </div>
       
                <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-5">
                <select name="jabatan" id="jabatan" class="form-control">
                  <?php $jabatan= $data['jabatan'];?>  
                  <option value="Pembina" <?php if($jabatan == "Pembina") echo "selected"?>>Pembina</option>
                  <option value="Pelatih" <?php if($jabatan == "Pelatih") echo "selected"?>>Pelatih</option>
                </select>
              </div>
            </div>

                <div class="form-group row">
              <label class="col-sm-2 col-form-label">Ekstrakulikuler</label>
              <div class="col-sm-5">
                <select class="form-control" id="ekstrakulikuler" name="ekstrakulikuler"> 
                <?php $ekstrakulikuler= $data['ekstrakulikuler'];?>

                <?php 
                include"koneksi.php";
                $qry = $connect->query("SELECT * FROM eskul");
                while($dt_ekskul = $qry->fetch_assoc()){?>
                  <?php
                  $selected = "";

                  if($dt_ekskul['nama'] == $data['nama']){
                    $selected = "selected";
                  }


                  ?>
                  <option value="<?= $dt_ekskul['nama'];?>" <?= $selected ?>><?=$dt_ekskul['nama'];?></option>
                <?php
                 }
                ?>
              </select>                       
              </div>
            </div>

                <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Foto</label>
                 <div class="col-sm-6">
                  <img src="foto/<?php echo $data['foto']; ?>" width="160px" />
              </div>  
            </div>


                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ubah Foto</label> 
                    <div class="col-sm-6">                  
                   <!-- <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br> -->
                   <input type="file"  name="foto">
                   <p class="help-block">
                   <font color="red">"Format file Jpg/Png/Jpeg"</font>
                 </p>
               </div>
             </div>
                        
              <br>
              <input type="submit" class="btn btn-primary" value="Simpan">
              <a href="pembina.php"><input type="button" class="btn btn-secondary" value="Batal"></a>
              </form>
              </div>
             
            </div>
          </div>
        </section>
      </div>
      <?php
      include"footer.php";
      ?>
      </body>