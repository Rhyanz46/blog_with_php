<?php 

include '../admin/inc/set_database.php';  


$sql = "SELECT * FROM aturan;";
$data_aturan = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data_aturan as $data) {
  $aturan   = $data['aturan'];
}

?>

<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style>

<div class="text-center mt-4">
	<h3><b>Aturan</b></h3>
	<div><p>
	<?php echo $aturan; ?>
	</p></div>
</div>

<div style="bottom: 10%; position: fixed;">
	<button type="button" class="btn btn-md btn-danger" ke="Menu Quiz">Kembali</button>
</div> 

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/jscript.js"></script>