<?php 
$sql = "SELECT * FROM slidder;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $admin) {
  $title	  = $admin['title'];
  $deskripsi= $admin['deskripsi'];
  $img  		= $admin['img'];
}
?>


<style>
.grid-wrapper{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 1em;
}

.grid-wrapper > div{
  padding: 1em;
  display: flex;
  justify-content: center;
}
.grid-wrapper > div:nth-child(odd){
  background: #eee;
}
.grid-wrapper > div:nth-child(even){
  background: red;
}
.tengah-root{
  display: flex;
  justify-content: center;
}
.tengah{
  justify-content: center;
}

</style>

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab_1" data-toggle="tab">Gallery</a>
    </li>
    <li><a href="#tab_2" data-toggle="tab">Tambah Data</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
  <div class="grid-wrapper tengah grid-gab">
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
    <div>mantap</div>
  </div>
</div>
<div class="tab-pane" id="tab_2">
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
</div>

