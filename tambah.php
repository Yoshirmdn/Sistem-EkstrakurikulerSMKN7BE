<?php
include"koneksi.php";

$eskul=$_POST['nama'];
// $pembina=$_POST['pembina'];
$ig =$_POST['ig'];
$foto =$_FILES['foto']['name'];
$logo =$_FILES['logo']['name'];
$deskripsi=$_POST['deskripsi'];
$ringkasan=$_POST['ringkasan'];

if($foto !=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.',$foto);
    $ekstensi = strtolower(end($x));
    $file_tmp=$_FILES['foto']['tmp_name'];
    $angka_acak= rand(1,999);
    $nama_foto=$angka_acak.'-'.$foto;

    if($logo !=""){
        $ekstensi_diperbolehkan = array('png','jpg','jpeg');
        $x1 = explode('.',$foto);
        $ekstensi = strtolower(end($x1));
        $file_tmp1=$_FILES['logo']['tmp_name'];
        $angka_acak1= rand(1,999);
        $nama_logo=$angka_acak1.'-'.$logo;

        if(in_array($ekstensi,$ekstensi_diperbolehkan) == true){
                move_uploaded_file($file_tmp,'foto/eskul/'.$nama_foto);
                move_uploaded_file($file_tmp1,'foto/eskul/'.$nama_logo);

                $q="INSERT into eskul (nama,deskripsi,foto,logo,ig,ringkasan) values('$eskul','$deskripsi','$nama_foto','$nama_logo','$ig','$ringkasan')";
                $r =mysqli_query($connect,$q);

                if(!$r){
                    die("Query Error :".mysqli_errno($connect)."-".mysqli_error($connect));
                }else{
                    echo"<script>alert('data berhasil ditambahkan');window.location='ekstrakulikuler_admin.php';</script>";
                }
                }else{
                    echo"<script>alert('ekstensi gambar hanya boleh jpg jpeg dan png!');window.location='ekstrakulikuler_admin.php';</script>";
                }
    }else{
        echo"<script>alert('ekstensi gambar hanya boleh jpg jpeg dan png!');window.location='ekstrakulikuler_admin.php';</script>";
    }

}else{
    echo"<script>alert('upload foto terlebih dahulu');window.location='ekstrakulikuler_admin.php';</script>";
   

}

?>