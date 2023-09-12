<?php
include"koneksi.php";
$nis=$_GET['nis'];
$sql = mysqli_query($connect,"select * from data_peserta where nis='$nis'");
$anggota=mysqli_fetch_array($sql);
$data = array (
    'nama' => $anggota['nama'],
    'kelas'=> $anggota['kelas'],
    'ekskul'=> $anggota['ekskul']
);
echo json_encode($data)
?>