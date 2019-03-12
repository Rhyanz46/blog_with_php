<?php include("inc/set_database.php");  ?>

<section>
<div class="row">
<div class="col-sm-offset-1 col-sm-2"><a class="btn btn-app"  data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i> Tambah</a>
<a class="btn btn-app"  data-toggle="modal" data-target="#konfirmasi"><i class="fa fa-trash-o"></i> Reset Nilai</a></div>
<div class="col-sm-6 connectedSortable">
<?php 

$halaman  = 3;
$page     = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai    = ($page>1) ? ($page * $halaman) - $halaman : 0;
$sql      = "SELECT * FROM soal;";
$result   = mysqli_query($koneksidb, $sql);
$total    = mysqli_num_rows($result);
$pages    = ceil($total/$halaman);
$sql1     = "select * from soal LIMIT $mulai, $halaman";            
$data     = mysqli_query($koneksidb, $sql1)or die(mysql_error);
$no       = $mulai+1;
// $data     = mysqli_fetch_assoc($data);
$aaa = 0;
foreach ($data as $datanya) {
  $nama = $datanya['soal'];
  $img = $datanya['img'];
  $soal = $datanya['soal'];
  echo '
        <div class="box box-solid bg-green-gradient"> 
            <div class="box-header">
              <i class="fa fa-cubes"></i>
              <h3 class="box-title"> '. $nama. ' </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" onclick="tampilin(' . $datanya['id'] . ')">
                <i class="fa fa-paint-brush"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove" onclick="hapusin(' . $datanya['id'] . ')"><i class="fa fa-times"></i>
                </button> 
              </div>
            </div>
            <div class="box-footer text-black">
              <div class="row">
              <img src="img/team/'.$img.'" style="width: 100%;height: 164px;"> 
              <p style="margin-left: 10px;margin-right: 10px">'.$soal.'</p>
              <hr>
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">A : '.$datanya['jawabana'].'</span>
                    <small class="pull-right">'?><?php if ($datanya['benar'] == 'A') {
                      echo "Benar";
                    } ?><?php echo '</small>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">B : '.$datanya['jawabanb'].'</span>
                    <small class="pull-right">'?><?php if ($datanya['benar'] == 'B') {
                      echo "Benar";
                    } ?><?php echo '</small>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">C : '.$datanya['jawabanc'].'</span>
                    <small class="pull-right">'?><?php if ($datanya['benar'] == 'C') {
                      echo "Benar";
                    } ?><?php echo '</small>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">D : '.$datanya['jawaband'].'</span>
                    <small class="pull-right">'?><?php if ($datanya['benar'] == 'D') {
                      echo "Benar";
                    } ?><?php echo '</small>
                  </div>
                </div>
              </div>
      </div>
</div>';
}
?>
<ul class="pagination">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <li><a href="?p=soal&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php } ?>
</ul>

</div>
</div>
</section>
<div class="modal modal-success fade" id="modal-success">
  <form action="insert.php" method="POST" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buat Soal</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="container">
                    <textarea class="form-control teksarea" rows="3" name="soal" placeholder="Soalnya disini" required=""></textarea>
                  </div>
                <div class="row container" style="color: green; margin-bottom: 10px">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="A">
                      </span>
                      <span class="input-group-addon">A</span>
                      <input type="text" name="jawabana" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="row container" style="color: green; margin-bottom: 10px">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="B">
                      </span>
                      <span class="input-group-addon">B</span>
                      <input type="text" name="jawabanb" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="row container" style="color: green; margin-bottom: 10px">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="B">
                      </span>
                      <span class="input-group-addon">B</span>
                      <input name="gambar" type="file" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row container" style="color: green">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="C">
                      </span>
                      <span class="input-group-addon">C</span>
                      <input type="text" name="jawabanc" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="row container" style="color: green">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="D">
                      </span>
                      <span class="input-group-addon">D</span>
                      <input type="text" name="jawaband" class="form-control" required="">
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</form>
</div>

<div class="modal modal-success fade" id="konfirmasi">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi </h4>
              </div>
              <div class="modal-body">
                Yakin ingin menghapus ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline" onclick="reset()">Konfirmasi</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script>
function tampilin(id){
    console.log(id);
    window.location.href = 'index.php?p=edit_soal&id=' + id;
}
function hapusin(id){
    console.log(id);
    setTimeout(function(){ 
//        window.location.href = 'delete.php?id=' + id + '&doc=soal';
    var ajax 	= new XMLHttpRequest();
  	var method 	= "GET";
  	var url 	= 'delete.php?id=' + id + '&doc=soal';

  	var asynchronous = true;
  	ajax.open(method, url, asynchronous);
  	ajax.send();

    }, 3000);
    
}
    
function reset(){
    setTimeout(function(){ 
    var ajax 	= new XMLHttpRequest();
	var method 	= "GET";
	var url 	= 'delete.php?doc=hapus_soal';

	var asynchronous = true;
	ajax.open(method, url, asynchronous);
	ajax.send();
    alert("Score Permainan Berhasil Di hapus");
    }, 500);
    
}
</script>