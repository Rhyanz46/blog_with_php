<?php 
include '../admin/inc/set_database.php';  
$id = 0;
while (0 == mysqli_num_rows(mysqli_query($koneksidb, "SELECT * FROM soal WHERE id='$id'"))) {
	$id++;
}

$total_soal = mysqli_num_rows(mysqli_query($koneksidb, "SELECT * FROM soal"));
?>
<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style> 

<div class="text-center mt-4">
<div class="card border-dark mt-3" id="soal">
  <div class="card-header">Soal <span id="quiz_no"></span></div>
  <div class="card-body text-dark">
    <h5 class="card-title" id="quiz_soal"></h5>
    <hr>
    <p class="card-text">
    	<div class="container text-left" id="banner_soal">
    		<input type="text" name="id" id="quiz_id" hidden>
    		<div class="row">
    			<div class="col-sm-6">  
    				<input type="radio" name="jawaban" id="A" value="A" />
 					<label for="A" id="quiz_a" style="cursor: pointer;"></label>
 				</div>
    			<div class="col-sm-6">
    				<input type="radio" name="jawaban" id="B" value="B" />
 					<label for="B" id="quiz_b" style="cursor: pointer;"></label>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<input type="radio" name="jawaban" id="C" value="C" />
 					<label for="C" id="quiz_c" style="cursor: pointer;"></label>
    			</div>
    			<div class="col-sm-6">
    				<input type="radio" name="jawaban" id="D" value="D" />
 					<label for="D" id="quiz_d" style="cursor: pointer;"></label>
    			</div>
    		</div>
    	</div>
    </p>
    <button class="btn btn-sm btn-success" onclick="next()" id="btn_jwb">Jawab</button>
  </div>
</div>

</div>
<div style="bottom: 10%; position: fixed;">
	<button type="button" class="btn btn-md btn-danger" ke="Menu Quiz">Kembali</button>
</div> 
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/jscript.js"></script> 

<script type="text/javascript">
	var jawaban = "";

	$('input[type="radio"]').click(function(){
		jawaban = $(this).val();
	});

	var ajax 	= new XMLHttpRequest();
	var method 	= "GET";
	var i 		= 0;
	var no 		= 1;
	var ke 		= <?php echo $id; ?>;
	var total 	= <?php echo $total_soal; ?> + ke;
	var url 	= "halaman/data_soal.php?id=" + ke;
	var nama 	= null;
	var total_benar = 0; 
	var lama 	= null;
	var time_start 	= null;
	var time_stop 	= null;

	var asynchronous = true;
	ajax.open(method, url, asynchronous);
	ajax.send();

	function next(){
		nama			= localStorage.nama;
		var jawab_ajax 	= new XMLHttpRequest();
		var metode 		= "POST";
		var alamat 		= "halaman/jawab_soal.php";
		var data_jawab	= "id=" + ke + "&jawaban=" + jawaban + "&nama=" + nama;

		jawab_ajax.open(metode,alamat,true);
		jawab_ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		jawab_ajax.send(data_jawab);

		jawab_ajax.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				total_benar += parseInt(this.responseText); 
			}
		}


		if (total+1 == ke) {
			$('#banner_soal').html("Nama : " + nama + "<br>Total Benar : " + total_benar + "<br>Lama : " + lama);
			$('#btn_jwb').hide();
			$('#quiz_soal').hide();
			$('.card-header').hide();
			
			console.log("Nama : " + nama);
			console.log("Lama : " + lama + " Menit");
			console.log("Benar : " + total_benar);


			var jwab_soal = new XMLHttpRequest();
			jwab_soal.open(metode,alamat,true);
			jwab_soal.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			var jwab_data = "id=" + ke + "&benar=" + total_benar + "&nama=" + nama + "&lama=" + lama;
			jwab_soal.send(jwab_data);

			localStorage.clear();

			jwab_soal.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				console.log("Sukses Kirim");
			}
		}
''
		}else if (total-1 == ke) {
			total -= 1;
			TheTimer(false,true);
			$('#banner_soal').text("Anda Telah Selesai Mengikuti Quiz");
			$('#btn_jwb').text("SELESAI");
			$('#quiz_soal').hide();
			$('.card-header').hide();
		}

		ke++;
		url 	= "halaman/data_soal.php?id=" + ke;
		ajax.open(method, url, asynchronous);
		ajax.send();

		ajax.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
					
				$('#quiz_id').text(data[i].id);
				$('#quiz_soal').text(data[i].soal);
				$('#quiz_a').text("A : " + data[i].jawabana);
				$('#quiz_b').text("B : " + data[i].jawabanb);
				$('#quiz_c').text("C : " + data[i].jawabanc);
				$('#quiz_d').text("D : " + data[i].jawaband);
				
				no++;
				if (no == 2) {TheTimer(true,false);}
				$('#quiz_no').text(no);
			}
		}
	}

$('#quiz_no').text(no);
ajax.onreadystatechange = function(){
	if (this.readyState == 4 && this.status == 200) {
		var data = JSON.parse(this.responseText);
		$('#quiz_id').text(data[i].id);
		$('#quiz_soal').text(data[i].soal);
		$('#quiz_a').text("A : " + data[i].jawabana);
		$('#quiz_b').text("B : " + data[i].jawabanb);
		$('#quiz_c').text("C : " + data[i].jawabanc);
		$('#quiz_d').text("D : " + data[i].jawaband);
	}
}

function TheTimer(a,b){
	if (a) {time_start = new Date(); console.log(time_start) }
	if (b) {
		lama = new Date() - time_start; 
		lama = parseInt(lama/1000);
		lama = lama/60;
	}
}


if (localStorage.nama == undefined) {
	alert('masukkan nama dulu bro');
}
</script>