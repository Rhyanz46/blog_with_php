<?php 
$sql = "SELECT * FROM admin;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $admin) {
  $id	  		= $admin['id'];
  $email  		= $admin['email'];
}


?>


<div class="row">
<div class="col-sm-6">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Situs</h3>
      </div>
      <div class="box-body">
        <form role="form" action="edit.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control" name="informasiwebsite" value="informasi-website">
          <div class="form-group">
            <label>Logo Website</label>
            <div class="row">
              <div class="col-sm-10">
                <input name="gambar" type="file"/>
              </div>
              <div class="col-sm-2">
                <img src="img/"  alt="Avatar" class="image">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Website</label>
            <input type="text" class="form-control" name="nama_website" value="<?php echo $nama_website ?>">
          </div>
          <div class="form-group">
            <label>Tagline</label>
            <input type="text" class="form-control" name="tag_line" value="<?php echo $tag_line ?>">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $alamat ?>">
          </div>
          <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="hp" value="<?php echo $hp ?>">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Facebook Link</label>
                <input type="text" class="form-control" name="fb_link" value="<?php echo $fb_link ?>">
              </div>
              <div class="form-group">
                <label>Twitter Link</label>
                <input type="text" class="form-control" name="twitter_link" value="<?php echo $twitter_link ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Instagram Link</label>
                <input type="text" class="form-control" name="instagram_link" value="<?php echo $instagram_link ?>">
              </div>
              <div class="form-group">
                <label>Pinterest Link</label>
                <input type="text" class="form-control" name="pinterest_link" value="<?php echo $pinterest_link ?>">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">SAVE</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Admin</h3>
      </div>
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive" src="img/profil/<?php echo $gambar_admin ?>" alt="User profile picture" style="width: 400px;">
        <h3 class="profile-username text-center"></h3>
        <p class="text-muted text-center"></p>
        <ul class="list-group list-group-unbordered">
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Nama<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $nama_admin ?></div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Pekerjaan<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $job_admin ?></div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Diskripsi<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $deskripsi_admin ?></div></b>
          </li>
          <li class="row list-group-item" style="margin-right: 10px;margin-left: 10px">
            <b><div class="col-sm-3">Alamat<div class="pull-right">:</div></div><div class="col-sm-9"><?php echo $alamat_admin ?></div></b>
          </li>
        </ul>
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Facebook Link</label>
                <div>
                <?php echo $fb_link_admin ?>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label>Twitter Link</label>
                <div>
                <?php echo $twitter_link_admin ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Instagram Link</label>
                <div>
                  <?php echo $instagram_link_admin ?>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label>Pinterest Link</label>
                <div>
                  <?php echo $pinterest_link_admin ?>
                </div>
              </div>
            </div>
          </div>
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_perusahaan"><b>EDIT</b></a>
      </div>
    </div>
  </div>
  
</div>




 <div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Admin Akun</h3>
  </div>
  <div class="box-body">
    <form role="form" action="edit.php" method="POST">
      <div class="form-group">
        <label>Email</label>
        <input name="email" type="text" class="form-control" value="<?php echo $email ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" value="hahaha">
        <input type="text" name="id" value="<?php echo $id ?>" hidden/>
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
  <form action="edit.php" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profil Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gambar:</label>
            <input name="profil_admin" type="text" class="form-control" id="recipient-name" value="mantap">
            <input name="gambar" type="file" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input name="nama" type="text" class="form-control" id="recipient-name", value="<?php echo $nama_admin ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pekerjaan:</label>
            <input name="job" type="text" class="form-control" id="recipient-name" value="<?php echo $job_admin ?>">
          </div>
          <div class="form-group">
            <label for="recipient-deskripsi" class="col-form-label">Deskripsi:</label>
            <textarea name="deskripsi" id="recipient-deskripsi" class="form-control"><?php echo $deskripsi_admin ?></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat:</label>
            <input name="alamat" type="text" class="form-control" id="message-text" value="<?php echo $alamat_admin ?>">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Facebook Link</label>
                <input type="text" class="form-control" name="fb_link" value="<?php echo $fb_link_admin ?>">
              </div>
              <div class="form-group">
                <label>Twitter Link</label>
                <input type="text" class="form-control" name="twitter_link" value="<?php echo $twitter_link_admin ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Instagram Link</label>
                <input type="text" class="form-control" name="instagram_link" value="<?php echo $instagram_link_admin ?>">
              </div>
              <div class="form-group">
                <label>Pinterest Link</label>
                <input type="text" class="form-control" name="pinterest_link" value="<?php echo $pinterest_link_admin ?>">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
  </form>
</div>