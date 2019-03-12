<?php 
$sql = "SELECT * FROM slidder;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $admin) {
  $title	  = $admin['title'];
  $deskripsi= $admin['deskripsi'];
  $img  		= $admin['img'];
}
?>


<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Slidder</h3>
  </div>
  <div class="box-body">
    <form role="form" action="insert.php" method="POST" enctype="multipart/form-data">
      <input type="text" class="form-control" name="slidder" value="slidder">
      <div class="form-group">
        <label>Gambar</label>
        <div class="row">
          <div class="col-sm-10">
            <input name="img" type="file"/>
          </div>
          <div class="col-sm-2">
            <img src="admin/img/<?php echo $img ?>"  alt="Avatar" class="image">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Slider Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
      </div>
      <div class="form-group">
        <label>Textarea</label>
        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter ..."><?php echo $deskripsi ?></textarea>
      </div>
      <div class="box box-default" style="padding-top: 10px; margin-top: 10px;" >
       	<div class="row">
	   		<div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
       	</div>
      </div>
    </form>
  </div>
</div>