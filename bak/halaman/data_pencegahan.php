<?php 

include '../admin/inc/set_database.php';  

$sql = "SELECT * FROM pencegahan;";
$pencegahan = mysqli_query($koneksidb, $sql)or die(mysql_error);

$data = array();
while ($baris = mysqli_fetch_assoc($pencegahan)) {
	$data[] = $baris;
}
echo json_encode($data);
?>