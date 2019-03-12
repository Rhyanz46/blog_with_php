<?php 

include '../admin/inc/set_database.php';  
$id = $_GET['id'];

$sql = "SELECT * FROM pencegahan WHERE id='$id'";
$pencegahan = mysqli_query($koneksidb, $sql)or die(mysql_error);

$data = array();
while ($baris = mysqli_fetch_assoc($pencegahan)) {
	$data[] = $baris;
}
echo json_encode($data);
?>