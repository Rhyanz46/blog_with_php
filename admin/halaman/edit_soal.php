<?php include("inc/set_database.php");  ?>

<section>
<div class="row">
<?php 

$id    = $_GET['id'];
$sql   = "SELECT * FROM soal WHERE id='$id';";
$data  = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $datanya) {
    $soal = $datanya['soal'];
    $a = $datanya['jawabana'];
    $b = $datanya['jawabanb'];
    $c = $datanya['jawabanc'];
    $d = $datanya['jawaband'];
}
?>

</div>
</section>
  <form action="edit.php" method="POST" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Soal </h4>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="container">
                    <textarea class="form-control teksarea" rows="3" name="soal" placeholder="Soalnya disini" required=""><?php echo $soal; ?></textarea>
                  </div>
                  <div class="row container" style="color: green; margin-bottom: 10px">
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="A">
                      </span>
                      <span class="input-group-addon">A</span>
                      <input value="<?php echo $a; ?>" type="text" name="jawabana" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="B">
                      </span>
                      <span class="input-group-addon">B</span>
                      <input value="<?php echo $b; ?>" type="text" name="jawabanb" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="row container" style="color: green">
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="C">
                      </span>
                      <span class="input-group-addon">C</span>
                      <input value="<?php echo $c; ?>" type="text" name="jawabanc" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                      <input type="radio" name="benar" value="D">
                      </span>
                      <span class="input-group-addon">D</span>
                      <input value="<?php echo $d; ?>" type="text" name="jawaband" class="form-control" required="">
                      <input type="text" name="id" value="<?php echo $id ?>" hidden/>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="modal-footer" style="background-color: #ccc;">
                <button type="button" class="btn btn-outline pull-left" onclick="batal()">Batal</button>
                <button type="submit" class="btn btn-outline">Save changes</button>
              </div>
                
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</form>
<script>
    
function batal(){
    window.location.href = 'index.php?p=soal';
}
</script>