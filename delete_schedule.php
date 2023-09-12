<?php 
require_once('db-connect.php');
if(!isset($_GET['id'])){
    echo  "<script>
    alert('Data Tidak Terhapus');
    window.location.href='agenda.php';
    </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    echo  "<script>
    alert('Data Telah Terhapus');
    window.location.href='agenda.php';
    </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>