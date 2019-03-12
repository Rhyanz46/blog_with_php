<?php 

include("../admin/inc/set_database.php"); 

$sql = "SELECT * FROM profil_perusahaan;";
$data_perusahaan = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data_perusahaan as $data) {
  $singkatan_perusahaan  = $data['singkatan'];
  $gambar_perusahaan     = $data['gambar'];
  $nama_perusahaan       = $data['nama'];
  $alamat_perusahaan     = $data['alamat'];
}

?>
<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style>

<div class="text-center mt-4">
	<h3><b>PROFIL PERUSAHAAN</b></h3>
	<div class="avatar col-md-4 mx-auto my-3" style="padding: 0px 50px 0px 50px">
		<img src="<?php echo 'admin/img/profil/'.$gambar_perusahaan; ?>" class="rounded img-fluid z-depth-1-half" alt="Second sample avatar image">
	</div>
	<div class="container text-left" style="margin-top: 10%">
		<div class="row">
			<div class="col-3">Nama </div>
			<div class="col-9">: <?php echo $nama_perusahaan; ?></div>
		</div>
		<div class="row">
			<div class="col-3">Alamat </div>
			<div class="col-9">: <?php echo $alamat_perusahaan; ?></div>
		</div>
	</div>
</div>

<div style="bottom: 10%; position: fixed;">
	<button type="button" class="btn btn-md btn-danger" onclick="window.location.href=''">Kembali</button>
</div> 
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- <script type="text/javascript" src="js/jscript.js"></script> -->