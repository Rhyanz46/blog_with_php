<div class="box box-warning">
  <div class="box-header with-border">
  <div class="row">
    <div class="col-md-10">
      <h3 class="box-title">
          EDIT
      </h3>
      </div>
    <div class="col-md-1">
    </div>
  </div> 
  <!-- /.box-header -->
  <div class="box-body">
    <form role="form" action="edit.php" method="POST"  enctype="multipart/form-data">
      <!-- text input -->
      <div class="form-group">
        <label>Judul</label>
        <input name="judul" id="judul" class="form-control" placeholder="Judul ..." type="text" value="<?php echo $about_judul ?>">
      </div>
      <div class="form-group">
        <label>Background</label>
        <input name="gambar" id="judul" class="form-control" placeholder="Judul ..." type="file" value="<?php echo $about_judul ?>">
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" id="" rows="4" class="form-control"><?php echo $about_deskripsi ?></textarea>
      </div>
      <div class="form-group">
        <label>Penjelasan</label>
        <textarea name="post" id="penjelasan" class="textarea" placeholder="Place some text here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $about_post ?></textarea>
      </div>
        <input type="text" name="id" value="<?php echo $about_id ?>" hidden/>
        <div class="box box-default" style="padding-top: 10px; margin-top: 10px;" >
          <div class="row">
            <div class="col-md-11"><button class="btn btn-success" type="submit">EDIT</button></div>
          </div>
        </div>
    </form>
  </div>
</div>