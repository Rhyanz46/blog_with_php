<?php 
include '../admin/inc/set_database.php';  

$sql = "SELECT * FROM narkoba WHERE kategori='psikotropika';";
$data_narkotika = mysqli_query($koneksidb, $sql)or die(mysql_error);

?>

<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style> 

<div class="text-center mt-4">
<?php 
$i = 1;

foreach ($data_narkotika as $data) {
	if ($i == 1 || $i == 3 || $i == 5) {
		echo '<div style="margin-bottom: 5%">';
	}
	$i++;
	echo '<button ke="Detail" nilai="Sub Menu Psikotropika" idnya="'.$data["id"].'" type="button" class="btn btn-md btn-danger" style="width: 13em !important;">'.$data["nama"].'</button>';
	if ($i%2==1) {
		echo "</div> <br>";
	} 
}
?>
</div>
<div style="bottom: 10%; position: fixed;">
	<button type="button" class="btn btn-md btn-danger" onclick="window.location.href=''">Kembali</button>
</div> 
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/jscript.js"></script> 