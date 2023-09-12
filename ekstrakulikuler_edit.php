<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("location: login.php");
  exit;
}
include"koneksi.php";

if(isset($_GET['id'])){
  $id =$_GET['id'];
  $query="SELECT * FROM eskul WHERE id='$id'";
  $q=mysqli_query($connect,$query);

  if(!$q){
    die("Query Error :".mysqli_errno($connect). "-".mysqli_error($connect))  ; 
  }
  $data=mysqli_fetch_array($q);

  if(!count($data)){
    echo"<script>alert('data tidak ditemukan');window.location='ekstrakulikuler_admin.php';</script>";
  }
  
 
}else{
  echo"<script>alert('masukan id yang akan di edit);window.location.ekstrakulikuler_edit.php;</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head><link href="img/lg.png" rel="shortcut icon">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> Agenda &mdash; System Informasi Ekstrakulikuler</title>
  

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
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
       include "sidebar_admin.php";
       ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Informasi Ekstrakulikuler</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div> -->
          </div>
          

          <div class="section-body">
            <h2 class="section-title">Ekstrakulikuler</h2>
            <p class="section-lead">Berikut merupakan Ekstrakulikuler yang terdapat di sekolah</p>
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate=""action="edit.php" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Edit Ekstrakulikuler</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Ekstrakulikuler</label>
                            <input type="text" class="form-control" name="nama" id="nama" required="" value="<?=$data['nama'];?>">
                            <input type="hidden" class="form-control" name="id" id="id" required="" value="<?=$data['id'];?>">
                            
                            <div class="invalid-feedback">

                            ...
                            </div>
                          </div>
                         
                          <div class="form-group col-md-6 col-12">
                            <label>Instagram</label>
                            <input type="text" class="form-control"name="ig" value="<?php echo $data['ig'];?>"required="" id="ig">
                            <div class="invalid-feedback">

                            </div>
                          </div>
                        </div>
                        <div class="row">
                         
                        
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12" >
                         
                         <label for="foto">Foto</label><br>
                         <img src="foto/eskul/<?=$data['foto']?>"width="50%" alt=""><br><br>
                         <input type="file"id="foto"name="foto"class="form-control" <?php echo$data['foto']?>>
                       
                       </div>
                       <div class="form-group col-md-6 col-12" >
                         
                         <label for="foto">Logo</label><br>
                         <img src="foto/eskul/<?=$data['logo']?>"width="50%" alt=""><br><br>
                         <input type="file"id="logo"name="logo"class="form-control" <?php echo$data['logo']?>>
                       
                       </div>
                      
                       </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label>Deskripsi</label>
                            <textarea class="form-control summernote-simple" name="deskripsi" id="deskripsi"><?php echo$data['deskripsi']?></textarea>
                          </div>
                          <div class="form-group col-6">
                            <label>Ringkasan</label>
                            <textarea class="form-control summernote-simple" name="ringkasan" id="ringkasan"><?php echo$data['ringkasan']?></textarea>
                          </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="Submit" name="simpan">Save Changes</button>
                       <a href="ekstrakulikuler_admin.php"><input type="button" class="btn btn-secondary" value="Batal"></a>
        
                    </div>
                  </form>
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
    
                     
                     
      <!-- Modal paskibra -->
      <div class="modal fade" id="modal<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $nama_eskul?></h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
                <img alt="image" src="assets/img/news/paskibra.jpg"title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              
            Follow Ekstrakulikuler <?php echo $nama_eskul?> on
            <br>
            <a href="<?php echo $ig?>" class="btn btn-social-icon mr-1 btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>  
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal pramuka -->
      <div class="modal fade" id="pramuka" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pramuka</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/pramuka1.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
               
             
             Pramuka merupakan sebutan bagi anggota Gerakan Pramuka, yang meliputi; Pramuka Siaga (7–10 tahun), Pramuka Penggalang (11–15 tahun), Pramuka Penegak (16–20 tahun) dan Pramuka Pandega (21-25 tahun). Kelompok anggota yang lain yaitu Pembina Pramuka, Andalan Pramuka, Korps Pelatih Pramuka, Pamong Saka Pramuka, Staf Kwartir dan Majelis Pembimbing.
              <br>
            <br>  Kepramukaan adalah proses pendidikan di luar lingkungan sekolah dan di luar lingkungan keluarga dalam bentuk kegiatan menarik, menyenangkan, sehat, teratur, terarah, praktis yang dilakukan di alam terbuka dengan Prinsip Dasar Kepramukaan dan Metode Kepramukaan, yang sasaran akhirnya pembentukan watak, akhlak, dan budi pekerti luhur. Kepramukaan adalah sistem pendidikan kepanduan yang disesuaikan dengan keadaan, kepentingan, dan perkembangan masyarakat, dan bangsa Indonesia.
             <br> 
             <br> Gerakan Pramuka dipimpin oleh Ketua Kwartir Nasional, yang saat ini dijabat Komisaris Jenderal Polisi (Purn.) Budi Waseso.
              <br>
              Follow Ekstrakulikuler Pramuka on <br>
              <a href="https://instagram.com/scoutseven_be?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal pmr -->
      <div class="modal fade" id="pmr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">PMR</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/pmr.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              
              Palang Merah Remaja (disingkat PMR) adalah wadah pembinaan dan pengembangan anggota remaja PMI, yang selanjutnya disebut PMR. Terdapat di PMI kota atau kabupaten di seluruh Indonesia, dengan anggota lebih dari 5 juta orang, anggota PMR merupakan salah satu kekuatan PMI dalam melaksanakan kegiatan-kegiatan kemanusiaan dibidang kesehatan dan siaga bencana, mempromosikan prinsip-prinsip dasar gerakan palang merah dan bulan sabit merah internasional, serta mengembangkan kapasitas organisasi PMI.
              <br>
              Kebijakan PMI dan federasi tentang pembinaan Remaja bahwa:
              <br>
              Remaja merupakan prioritas pembinaan, baik dalam keanggotaan maupun kegiatan kepalangmerahan.
              Remaja berperan penting dalam pengembangan kegiatan kepalangmerahan.
              Remaja berperan penting dalam perencanaan, pelaksanaan kegiatan dan proses pengambilan keputusan untuk kegiatan PMI.
              Remaja adalah kader relawan
              Remaja calon pemimpin PMI pada masa depan. <br>
              Palang Merah Remaja atau PMR adalah suatu organisasi binaan dari Palang Merah Indonesia yang berpusat di sekolah-sekolah ataupun kelompok-kelompok masyarakat (sanggar, kelompok belajar, dll.) yang bertujuan membangun dan mengembangkan karakter Kepalangmerahan agar siap menjadi Relawan PMI pada masa depan.
              <br>
              Follow Ekstrakulikuler PMR on <br>
              <a href="https://instagram.com/pabeu7oe?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal bulutangkis -->
      <div class="modal fade" id="bulutangkis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bulutangkis</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/logobulitangkis.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Bulu tangkis atau badminton (bahasa Inggris: badminton) adalah suatu olahraga yang menggunakan alat yang berbentuk bulat dengan memiliki rongga-rongga di bagian pemukulnya. Dan memiliki gagang. Alat ini dikenal dengan nama raket yang dimainkan oleh dua orang (untuk tunggal) atau dua pasangan (untuk ganda) yang saling berlawanan. <br>

              Mirip dengan tenis, bulu tangkis bertujuan memukul bola permainan bulu tangkis, yaitu kok (shuttlecock) melewati jaring agar jatuh di bidang permainan lawan yang sudah ditentukan dan berusaha mencegah lawan melakukan hal yang sama. <br>
              Lapangan bulu tangkis berbentuk persegi panjang dan mempunyai ukuran seperti terlihat pada gambar. Garis-garis yang ada mempunyai ketebalan 40 mm dan harus berwarna kontras terhadap warna lapangan. Warna yang disarankan untuk garis adalah putih atau kuning. Permukaan lapangan disarankan terbuat dari kayu atau bahan sintetis yang lunak. Permukaan lapangan yang terbuat dari beton atau bahan sintetik yang keras sangat tidak dianjurkan karena dapat mengakibatkan cedera pada pemain. Jaring setinggi 1,55 m berada tepat di tengah lapangan. Jaring harus berwarna gelap kecuali bibir jaring yang mempunyai ketebalan 75 mm harus berwarna putih. <br>
              Tiap pemain atau pasangan mengambil posisi berseberangan pada kedua sisi jaring di lapangan bulu tangkis. <br>

              Permainan dimulai dengan salah satu pemain melakukan servis. <br>

              Tujuan permainan adalah untuk memukul sebuah kok menggunakan raket, melewati jaring ke wilayah lawan, sampai lawan tidak dapat mengembalikannya kembali. Area permainan berbeda untuk partai tunggal dan ganda. Bila kok jatuh di luar area tersebut maka kok dikatakan "keluar". <br>

              Setiap kali pemain/pasangan tidak dapat mengembalikan kok (karena menyangkut di jaring atau keluar lapangan) maka lawannya akan memperoleh poin. <br>

              Permainan berakhir bila salah satu pemain/pasangan telah meraih sejumlah poin tertentu.
              <br> 
              Follow Ekstrakulikuler Bulutangkis on <br>
               <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal wanapala -->
      <div class="modal fade" id="wanapala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Wanapala</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/wanapala1.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> Wanapala adalah salah satu ekstrakulikuler yang ada di SMKN 7 Baleendah. Organisai ini diperuntukan untuk mendidik siswa agar lebih menghargai alam dan lingkungan sekitar. Selain itu organisai ini juga bertujuan untuk memberikan ilmu bagi anggotanya yang memiliki minat dalam menjelajahi alam atau adventuring. 
              <br>
              Follow Ekstrakulikuler Wanapala on <br>
              <a href="https://instagram.com/officialwanapala_7?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>   
              
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal    sindo -->
      <div class="modal fade" id="sindo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sindo</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/sindo.png "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Ikatan Pencak Silat atau dikenal dengan IPSI adalah wadah organisai bagi seluruh jajaran pencak silat Indonesia. IPSI didirikan Pada tanggal 18 mei 1948 di surakrta, Jawa Tengah.
             <br>
             Follow Ekstrakulikuler Sindo on <br>
             <a href="https://instagram.com/sindo_smkn7_be?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal basket -->
      <div class="modal fade" id="basket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Basketball</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/basket.jpeg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Bola basket adalah olahraga bola berkelompok yang terdiri atas dua tim beranggotakan masing-masing lima orang yang saling bertanding mencetak poin dengan memasukkan bola ke dalam keranjang lawan.Bola basket dapat di lapangan terbuka, walaupun pertandingan profesional pada umumnya dilakukan di ruang tertutup. Lapangan pertandingan yang diperlukan juga relatif tidak besar, misal dibandingkan dengan sepak bola.Selain itu, permainan bola basket juga lebih kompetitif karena tempo permainan cenderung lebih cepat jika dibandingkan dengan olahraga bola yang lain, seperti voli dan sepak bola <br>

              Bola basket menjadi salah satu olahraga yang paling digemari oleh penduduk Amerika Serikat dan penduduk di belahan bumi lainnya, antara lain di Amerika Selatan, Eropa Selatan, Lithuania, dan juga di Indonesia. Banyak kompetisi bola basket yang diselenggarakan setiap tahun, seperti British Basketball League (BBL) di Inggris, National Basketball Association (NBA) di Amerika, dan Indonesia Basketball League (IBL) di Indonesia. Bola basket merupakan salah satu cabang olahraga yang menuntut VO2 max tinggi. Dengan latihan VO2 max ini dapat ditingkatkan yang menghasilkan peningkatan hanya berkisar 25% dari kondisi awal latihan. Dari latihan tersebut elebihnya ditentukan oleh potensi fisik yang ada pada setiap individu.[butuh sumber yang lebih baik] Bola basket merupakan cabang olahraga dengan waktu istirahat yang lebih lama, sehingga dapat memanfaatkan teknik recovery dengan tepat.
                <br>
                Follow Ekstrakulikuler Basketball on <br>
              
                <a href="https://instagram.com/basketball_sevenbe?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                  <i class="fab fa-instagram"></i>
                </a>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning data-bs-dismiss="data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal perisai diri -->
      <div class="modal fade" id="perisai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Perisai Diri</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/perisaidiri.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Perisai Diri merupakan salah satu organisasi olahraga beladiri yang menjadi anggota IPSI (Ikatan Pencak Silat Indonesia), induk organisasi resmi pencak silat di Indonesia di bawah KONI (Komite Olahraga Nasional Indonesia). Perisai Diri menjadi salah satu dari sepuluh perguruan silat yang mendapat predikat Perguruan Historis karena mempunyai peran besar dalam sejarah terbentuk dan berkembangnya IPSI. Perisai Diri didirikan secara resmi pada tanggal 2 Juli 1955 di Surabaya, Jawa Timur. Pendirinya adalah almarhum RM Soebandiman Dirdjoatmodjo, putra bangsawan Keraton Paku Alam. Sebelum mendirikan Perisai Diri secara resmi, beliau melatih silat di lingkungan Perguruan Taman Siswa atas permintaan pamannya, Ki Hajar Dewantoro
             <br>
             Follow Ekstrakulikuler Perisai Diri on <br>
              
             <a href="https://instagram.com/perisaidiriseven?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal futsal -->
      <div class="modal fade" id="futsal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Futsal</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/futsal1.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Futsal adalah permainan bola yang dimainkan oleh dua tim, yang masing-masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki. Selain lima pemain utama, setiap regu juga diizinkan memiliki pemain cadangan. Tidak seperti permainan sepak bola dalam ruangan lainnya, lapangan futsal dibatasi garis, bukan net atau papan.

              Futsal turut juga dikenali dengan berbagai nama lain. Istilah "futsal" adalah istilah internasionalnya, berasal dari kata Spanyol atau Portugis, futbol (sepak bola) dan sala (dalam ruangan). <br>
              
              Futsal dipopulerkan di Montevideo, Uruguay pada tahun 1930, oleh Juan Carlos Ceriani. Keunikan futsal mendapat perhatian di seluruh Amerika Selatan, terutamanya di Brasil. Ketrampilan yang dikembangkan dalam permainan ini dapat dilihat dalam gaya terkenal dunia yang diperlihatkan pemain-pemain Brasil di luar ruangan, pada lapangan berukuran biasa. Pele, bintang terkenal Brasil, contohnya, mengembangkan bakatnya di futsal. Sementara Brasil terus menjadi pusat futsal dunia, permainan ini sekarang dimainkan di bawah perlindungan Fédération Internationale de Football Association di seluruh dunia, dari Eropa hingga Amerika Tengah dan Amerika Utara serta Afrika, Asia, dan Oseania.
              <br>
              Follow  Ekstrakulikuler Futsal on <br>
              <a href="https://instagram.com/futsalsmkn7baleendah?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>



              
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal irma -->
      <div class="modal fade" id="irma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Irma Kamus 7</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/kamus7.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Ikatan Remaja Masjid Keluarga Muslim SMKN 7 Baleendah merupaka salah satu kegiatan ekstrakulikuler yang ada di sekolah. Ekstrakulikuler Irma Kamus 7 berfungsi untuk mananamkan nilai-nilai ajaran agama islam yang telah diperoleh pada saat proses pembelajaran di kelas.
              <br>
              Follow Ekstrakulikuler Irma kamus7 on <br>
              <a href="https://instagram.com/kamus7_?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
              
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal voli -->
      <div class="modal fade" id="voli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Voli</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/voli1.png "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              
              Bola voli (bahasa Inggris: volleyball) adalah permainan olahraga yang dimainkan oleh dua grup berlawanan. Masing-masing grup memiliki enam orang pemain. Terdapat pula variasi permainan bola voli pantai yang masing-masing timnya hanya memiliki dua orang pemain. Olahraga ini dinaungi FIVB (Fédération Internationale de Volleyball)[1] sebagai induk organisasi internasional. Sedangkan di Indonesia, olahraga bola Voli dinaungi oleh PBVSI (Persatuan Bola Voli Seluruh Indonesia) <br>
              <br>
              Pada awal penemuannya, olahraga permainan bola voli ini diberi nama Mintonette. Olahraga ini pertama kali ditemukan oleh seorang Instruktur pendidikan jasmani (Director of Phsycal Education) yang bernama William G. Morgan di YMCA pada tanggal 9 Februari 1895, di Holyoke, Massachusetts (Amerika Serikat).[3] Morgan, yang juga merupakan lulusan Springfield College of YMCA, menciptakan permainan ini empat tahun setelah diciptakannya olahraga bola basket oleh James Naismith. Olahraga Mintonette ini sebenarnya merupakan sebuah permainan yang diciptakan dengan menggabungkan beberapa jenis permainan, yaitu bola basket, bisbol, tenis, dan bola tangan (handball).[4] Pada awalnya, permainan ini diciptakan khusus bagi anggota YMCA yang sudah tidak berusia muda lagi, sehingga permainan ini pun dibuat tidak seaktif permainan bola basket. <br>
              <br>
              Perubahan nama Mintonette menjadi volleyball (bola voli) terjadi pada tahun 1896, pada demonstrasi pertandingan pertamanya di International YMCA Training School. Pada awal tahun 1896 tersebut, Dr. Luther Halsey Gulick (Director of the Professional Physical Education Training School sekaligus sebagai Executive Director of Department of Physical Education of the International Committee of YMCA) mengundang dan meminta Morgan untuk mendemonstrasikan permainan baru yang telah ia ciptakan di stadion kampus yang baru. Pada sebuah konferensi yang bertempat di kampus YMCA, Springfield tersebut juga dihadiri oleh seluruh instruktur pendidikan jasmani. Dalam kesempatan tersebut, Morgan membawa dua tim yang pada masing-masing tim beranggotakan lima orang. Dalam kesempatan itu, Morgan juga menjelaskan bahwa permainan tersebut adalah permainan yang dapat dimainkan di dalam maupun di luar ruangan dengan sangat leluasa. Dan menurut penjelasannya pada saat itu, permainan ini dapat juga dimainkan oleh banyak pemain. Tidak ada batasan jumlah pemain yang menjadi standar dalam permainan tersebut. Sedangkan sasaran dari permainan ini adalah mempertahankan bola agar tetap bergerak melewati net yang tinggi, dari satu wilayah ke wilayah lain (wilayah lawan).
            <br>
            Follow Ekstrakulikuler Voli on <br>
            <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!--  modal sapta  -->
      <div class="modal fade" id="sapta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sapta Art</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/sapta.jpg "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              
              Sapta Art adalah salah satu ekstrakulikuler yang ada di SMKN 7 Baleendah yang bergerak di bidang kesenian , seperti tari tradisional, drama musikal, mural, dan upacara adat
              <br>
             Follow  Sapta Art on <br>
              <a href="https://instagram.com/sapta.art?igshid=YmMyMTA2M2Y=" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
                   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal bola tangan -->
      <div class="modal fade" id="tangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bola Tangan</h5>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
     
            </div>
            <div class="modal-body">
              <img alt="image" src="assets/img/news/bolatangan1.png "title="Paskibra SMKN 7 Baleendah" class="img-fluid" width="30%" style="float :left; margin-right :10px; margin-bottom: 5px;"> 
              Bola tangan adalah salah satu olahraga dalam permainan bola besar yang cara bermainnya mengoper bola dengan tangan ke sesama anggota tim dengan tujuan memasukkan ke gawang lawan.[1] Bola tangan dimainkan dua tim yang berisi tujuh orang dalam satu kelompok. Enam orang itu adalah pemain yang bergerak bebas di lapangan dan sisanya bertindak sebagai kiper. Lapangan bola tangan berukuran panjang 90 sampai dengan 400 meter dan lebar 55 sampai dengan 65 meter. Sementara bola yang digunakan memiliki ukuran berbeda antara tim putra dan putri. Bola untuk tim putra beratnya mencapai 425-475 gram, sedangkan untuk putri 325-400 gram. Diameter bola juga berbeda, tim putra kelilingnya lebih besar, yaitu antara 58-60 cm. Sementara untuk putri, keliling bola yang harus digunakan adalah 54-56 cm. <br>
              <br>
              Pada zaman Yunani Kuno, peraturan permainan bola tangan sudah dimainkan. Permaianan "Urania" yang dimainkan oleh orang Yunani kuno (digambarkan Homer dan Odyssey) dan harpaston yang sering dimainkan oleh orang Romawi yang bernama Claudius Galenus sekitar pada tahun 130 sampai dengan 200 Masehi. Di Jerman peramainan bola tangan dikenal dengan sebutan "Fangballspiel" atau permainan "tangkap bola" yang diperkenalkan oleh penulis puisi Jerman yaitu Walther von der Vgelweide (1170-1230). Di Perancis seorang bernama Rabeilas (1494-1533) menggambarkan permainan bola tangan dengan bermain bola tangan menggunakan telapak tangan. Pada tahun 1793 masyarakat yang hidup di dataran yang hijau serta menggambarkan dan membuat ilustrasi dengan bola tangan. Pada tahun 1484, administrator olahraga yang berasal dari Denmark mengijinkan permainan ini agar dilakukan di sekolah lanjutan di Ortup Denmark dan mendorong untuk segera menyertakan aturan dalam bola tangan.
              <br>
             Follow  Ekstrakulikuler Bola Tangan on <br>
              <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>


             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>
  

  
  <!-- JS Libraies -->
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>


  <!-- Page Specific JS File -->
  <script src="assets/js/page/components-user.js"></script>
  
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from demo.getstisla.com/layout-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 03:02:21 GMT -->
</html>