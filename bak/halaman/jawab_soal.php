<?php 
$id = $_POST['id'];
$jawabannya_dia = $_POST['jawaban'];
$nama 	= $_POST['nama'];
$lama 	= $_POST['lama'];
$benar 	= $_POST['benar'];

session_start();
$_SESSION['jumlah_benar'] = 0;

include '../admin/inc/set_database.php';

$jawaban_benar = mysqli_fetch_assoc(mysqli_query($koneksidb, "SELECT benar FROM soal WHERE id='$id'"));

if ($jawabannya_dia == $jawaban_benar['benar']) {
	echo "1";	
} else {
	echo "0";
}

if (!empty($_POST['lama'])) {
	$sql = "INSERT INTO quiz(nama,lama,benar) VALUES('$nama','$lama','$benar')";
	$jawab_soal = mysqli_query($koneksidb, $sql);

}

?>