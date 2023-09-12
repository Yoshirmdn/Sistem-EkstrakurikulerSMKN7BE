<?php

include "koneksi.php";

// Ambil data id yang dikirim oleh form_update.php melalui URL
$id = $_GET['id'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$ekstrakulikuler = $_POST['ekstrakulikuler'];


if(!empty($_FILES['foto']['name'])){
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "foto/".$fotobaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM pembina WHERE id='".$id."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		
		if(is_file("foto/".$data['foto'])) // Jika foto ada
			unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto

		
		// Proses ubah data ke Database
		$query = "UPDATE pembina SET nama='".$nama."', jabatan='".$jabatan."', ekstrakulikuler='".$ekstrakulikuler."', foto='".$fotobaru."' WHERE id='".$id."'";

        // Mengeksekusi/menjalankan query diatas
		$sql = mysqli_query($connect, $query); 


		if($sql){ 
            echo "<script>
            alert('Data Telah Diubah');
            window.location.href='pembina.php';
            </script>";
			
		}else{
		
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_update.php'>Kembali Ke Form</a>";
		}
	}else{
		
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_update.php'>Kembali Ke Form</a>";
	}
}else{ 
	$query = "UPDATE pembina SET nama='$nama', jabatan='$jabatan', ekstrakulikuler='$ekstrakulikuler' WHERE id='$id'";
	$sql = mysqli_query($connect, $query); 

	if($sql){ 
         echo "<script>
            alert('Data Telah Diubah');
            window.location.href='pembina.php';
            </script>";
				
	}else{
		
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_update.php'>Kembali Ke Form</a>";
	}
}
?>
