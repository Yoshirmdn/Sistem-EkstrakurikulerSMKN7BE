<?php
include "koneksi.php";

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$ekstrakulikuler = $_POST['ekstrakulikuler'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	

$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "foto/".$fotobaru; 


if(move_uploaded_file($tmp, $path)){ 
	$query = "INSERT INTO pembina (nama, jabatan, ekstrakulikuler, foto) VALUES('".$_POST['nama']."',
			'".$_POST['jabatan']."',
			'".$_POST['ekstrakulikuler']."','".$fotobaru."')";
	$sql = mysqli_query($connect, $query); 

	if($sql){ 		
		echo "<script>
            alert('Data Telah Tersimpan');
            window.location.href='pembina.php';
            </script>";
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else{
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>
