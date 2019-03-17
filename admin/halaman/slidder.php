<?php 
$sql = "SELECT * FROM slidder;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $admin) {
  $title	  = $admin['title'];
  $deskripsi= $admin['deskripsi'];
  $img  		= $admin['img'];
}
?>

<?php 

$sql = "SELECT * FROM profil_perusahaan;";
$data_perusahaan = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data_perusahaan as $data) {
  $singkatan_perusahaan  = $data['singkatan'];
  $gambar_perusahaan     = $data['gambar'];
  $nama_perusahaan       = $data['nama'];
  $alamat_perusahaan     = $data['alamat'];
}

?>

<div class="row">
<div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border bg-blue"><b>Silder</b></div>
      <div class="box-body box-profile">
        <h3 class="profile-username text-center"></h3>
        <p class="text-muted text-center"></p>
        <ul class="list-group list-group-unbordered">
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
              <label for="">Deskripsi Slidder</label>
            <textarea style="width: 100%" name="" id="" cols="30" rows="10" disabled><?php echo $singkatan_perusahaan; ?></textarea>
          </li>
        </ul>
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_perusahaan"><b>EDIT</b></a>
      </div>
    </div>
  </div>
</div>

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Slidder</h3>
  </div>
  <div class="box-body">
    </div>
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

<div class="modal fade" id="edit_perusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="insert.php" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profil Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="display: none">
            <label for="recipient-name" class="col-form-label">Gambar:</label>
            <input name="gambar" type="file" class="form-control" id="recipient-name">
          </div>
          <div class="form-group"  style="display: none">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input name="nama" value="<?php echo $nama_perusahaan ?>" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Deskripsi Slidder:</label>
            <textarea name="singkatan" id="" cols="30" rows="10" class="form-control"><?php echo $singkatan_perusahaan ?></textarea>
          </div>
          <div class="form-group" style="display: none">
            <label for="message-text" class="col-form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" id="message-text"><?php echo $alamat_perusahaan ?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
  </form>
</div>