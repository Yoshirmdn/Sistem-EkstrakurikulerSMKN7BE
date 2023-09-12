<?php
include "koneksi.php";


$id = $_GET['id'];

$query = "SELECT * FROM pembina WHERE id='".$id."'";
$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql


// Cek apakah file fotonya ada di folder foto
if(is_file("foto/".$data['foto'])) // Jika foto ada
	unlink("foto/".$data['foto']);  // Hapus foto yang telah diupload dari folder foto

$query2 = "DELETE FROM pembina WHERE id='".$id."'";
$sql2 = mysqli_query($connect, $query2); 

if($sql2){ 
	echo "<script>
            alert('Data Telah Dihapus');
            window.location.href='pembina.php';
            </script>"; 
}else{
	echo "Data gagal dihapus. <a href='pembina.php'>Kembali</a>";
}
?>
