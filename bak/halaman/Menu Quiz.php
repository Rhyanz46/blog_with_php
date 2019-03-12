<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style> 

<div class="text-center" style="margin-top: 70px">
    <div class="col-sm-12">
        <button class="btn btn-md black" onclick="gotosoal()" style="width: 14em !important;" id="btn_mulai">Mulai</button>
    </div>
    <div class="col-sm-12">
        <button class="btn btn-md black" ke="Nilai Tertinggi" style="width: 14em !important;">Nilai Tertinggi</button>
    </div>
    <div class="col-sm-12">
        <button class="btn btn-md black" ke="Aturan" style="width: 14em !important;">Aturan Main</button>
    </div>
    <div class="col-sm-12">
        <button class="btn btn-md black" style="width: 14em !important;" onclick="document.getElementById('id01').style.display='block'">Permainan Baru</button>
    </div>
    <div class="col-sm-12">
        <button class="btn btn-md black" style="width: 14em !important;" onclick="window.location.href=''">Keluar</button>
    </div>
</div>


<div id="id01" class="w3-modal">
  <div class="w3-center"><br>
    <b onclick="document.getElementById('id01').style.display='none'" class="close">X</b>
    <br>
    <div>
      <label class="putih kiri"><b>Nama</b></label>
      <br>
      <input style="color: white" type="text" id="nama" required autofocus>
      <br>
      <div id="test"></div>
      <button class="tombol-mulai" ke="Soal">Mulai</button>
    </div>
  </div>
</div>



<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/jscript.js"></script> 

<script type="text/javascript">
  if (localStorage.nama != undefined) {
    $('#btn_mulai').html('resume');
    function gotosoal(){
      soal(); 
    }
  }

  function gotosoal(){
    inputnama();
  }

  function soal(){
    $('#konten').load('halaman/Soal.php');
    $('#judul-halaman').text('Soal');
  }

  function inputnama(){
    document.getElementById('id01').style.display='block';
  }
</script>