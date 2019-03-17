<?php 


include("inc/set_database.php"); 

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
  <div class="col-sm-6" style="display:none">
    <div class="box box-primary">
      <div class="box-header with-border bg-blue"><b>Profil Peneliti</b></div>
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive" src="img/profil/profil.png" alt="User profile picture" style="width: 250px;height: 272px;">
        <h3 class="profile-username text-center"></h3>
        <p class="text-muted text-center"></p>
        <ul class="list-group list-group-unbordered">
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">NIM <div class="pull-right">:</div> </div><div class="col-sm-9">14.420.068</div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Nama<div class="pull-right">:</div></div><div class="col-sm-9">Eka Nofianti</div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Jurusan<div class="pull-right">:</div></div><div class="col-sm-9">Teknik Informatika</div></b>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="box box-primary">
      <div class="box-header with-border bg-blue"><b>Profil Perusahaan</b></div>
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive" src="<?php echo 'img/profil/'.$gambar_perusahaan; ?>" alt="User profile picture" style="width: 400px;">
        <h3 class="profile-username text-center"></h3>
        <p class="text-muted text-center"></p>
        <ul class="list-group list-group-unbordered">
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Nama<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $nama_perusahaan; ?></div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Singkatan<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $singkatan_perusahaan; ?></div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Alamat<div class="pull-right">:</div></div><div class="col-sm-9"><p><?php echo $alamat_perusahaan; ?></p></div></b>
          </li>
        </ul>
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_perusahaan"><b>EDIT</b></a>
      </div>
    </div>
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
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gambar:</label>
            <input name="gambar" type="file" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input name="nama" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Singkatan:</label>
            <input name="singkatan" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" id="message-text"></textarea>
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