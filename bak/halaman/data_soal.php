<?php 
$id = $_GET['id'];

include '../admin/inc/set_database.php';  
$data_soal = mysqli_query($koneksidb, "SELECT * FROM soal WHERE id='$id'")or die('<script type="text/javascript">window.location.href="../";</script>');

$data = array();
while ($baris = mysqli_fetch_assoc($data_soal)) {
	$data[] = $baris;
}

echo json_encode($data);
?>