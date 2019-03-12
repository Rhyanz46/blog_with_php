<?php 
$id = $_GET['id'];

include '../admin/inc/set_database.php';
$hasil 		= mysqli_query($koneksidb, "SELECT * FROM narkoba WHERE id='$id'");

$data = array();
while ($baris = mysqli_fetch_assoc($hasil)) {
	$data[] = $baris;
}

echo json_encode($data);
?>