<?php 
include '../admin/inc/set_database.php';  

$sql = "SELECT * FROM quiz ORDER BY benar DESC";
$data_quiz = mysqli_query($koneksidb, $sql)or die(mysql_error);

$data = array();
while ($baris = mysqli_fetch_assoc($data_quiz)) {
	$data[] = $baris;
}

$jumlah = count($data);
?>

<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style>

<div class="text-center mt-4">
	<h3><b>Nilai Tertinggi</b></h3>
	<div><p>
		<table class="table">
		    <thead>
		        <tr>
		            <th>Nama</th>
		            <th>Benar</th>
		            <th>Waktu</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php for ($i=0; $i < $jumlah; $i++) { ?>
		        <tr>
		            <th scope="row"><?php echo $data[$i]['nama']; ?></th>
		            <td><?php echo $data[$i]['benar']; ?></td>
		            <td><?php echo $data[$i]['lama']; ?> Menit</td>
		        </tr>
				<?php } ?>
				<?php if ($jumlah == 0): ?>
					<tr>
						<th colspan="3" style="font-weight: bold;">Data kosong</th>
					</tr>
				<?php endif ?>
		    </tbody>
		</table>
		
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