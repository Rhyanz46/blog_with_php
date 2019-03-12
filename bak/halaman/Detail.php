<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style> 

<div class="text-center mt-4">
	
</div>

<div class="row">
    <div class="container">
        <div style="float: left;">
            <img src="" id="gambar_detail" style=" height: 120px; width: 120px"/>
        </div>
        <div style="float: left; margin-left: 10px;">
            <span style="font-weight: bold;" id="nama"></span><br>
            <span id="nama_lain"></span>
        </div>
    </div>
</div>
<div style="margin-top: 10px">
    <div style="background: #cccc; padding: 10px; border-bottom: 2px solid #ccc;">
        PENJELASAN : 
        <p id="penjelasan" style="margin-left: 10px;"/>
    </div>
    <div style="float: left; width:50%;background: #cccc; padding-left: 10px;border-right:2px solid #ccc">
        Manfaat : 
        <p id="akibat" style="margin-left: 10px;"/>
    </div>
    <div style="float: left; width:50%;background: #cccc; padding-left: 10px;">
        Gejala :
        <p id="gejala" style="margin-left: 10px;"/>
    </div>

</div>
<!--<div id="data"></div>-->

<div style="margin-bottom: 10%">
	<button type="button" class="btn btn-md btn-danger">Kembali</button>
</div> 

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/jscript.js"></script>

<script type="text/javascript">
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var x = document.getElementById('idnya').innerHTML;
	var url = "halaman/data_detail.php?id=" + x;  
	
	var asynchronous = true;
	ajax.open(method, url, asynchronous);
	ajax.send();

	ajax.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			var data = JSON.parse(this.responseText);

			var html = "";
			var depan = data[0].nama;
			var belakang = data[0].nama_lain;
			var kategori = data[0].kategori;
			var deskripsi = data[0].deskripsi;
			var akibat = data[0].akibat;
			var gejala = data[0].gejala;
			var gambar = 'admin/img/' + data[0].gambar;

			html += "<p>";
			html += "<br>" + depan;
			html += "<br>" + belakang;
			html += "<br>" + kategori;
			html += "<br>" + deskripsi;
			html += "</p>";

			console.log(data);
			
			document.getElementById('gambar_detail').src = gambar;
			document.getElementById('nama').innerHTML = depan;
			document.getElementById('nama_lain').innerHTML = belakang;
			document.getElementById('penjelasan').innerHTML = deskripsi;
			document.getElementById('akibat').innerHTML = akibat;
			document.getElementById('gejala').innerHTML = gejala;
			document.getElementById('data').innerHTML = html;
		}
	}
</script>