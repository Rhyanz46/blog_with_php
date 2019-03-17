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
  padding: 4em;
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
<div class="row" style="padding: 10px">
  <div class="col-sm-6" style="border: 1px solid #a0a0a0;padding: 10px;border-radius: 5px;">
    <form role="form" action="insert.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control" name="gallery" value="gallery">
      <div class="form-group">
        <label>Gambar</label>
        <div class="row">
          <div class="col-sm-10">
            <input name="img" type="file" accept="image/png, image/*"/>
          </div>
          <div class="col-sm-2">
            <img src="admin/img/<?php echo $img ?>"  alt="Avatar" class="image">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Deskripsi Gambar</label>
        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter ..."></textarea>
      </div>
        <div class="row">
        <div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
        </div>
    </form>
  </div>
  <div class="col-sm-6" style="border: 1px solid #a0a0a0;padding: 10px;border-radius: 5px;">
    <form action="edit.php" method="POST">
      <input type="hidden" name="deskripsi_gallery" value="desc">
        <div class="form-group">
          <label for="title">Deskripsi Gambar</label>
          <input type="text" id="title" name="title" value="<?php echo $gallery_title; ?>" accept="image/png, image/*">
        </div>
        <div class="form-group">
          <label>Deskripsi Laman</label>
          <textarea class="form-control" name="deskripsi" rows="6" value=><?php echo $gallery_deskripsi; ?></textarea>
        </div>
        <div class="row">
          <div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
        </div>
    </form>
  </div>
</div>
<hr style="border-top: 1px solid #9c5683;">
<div class="grid-wrapper tengah grid-gab">
<?php foreach($gallery_data as $gallery): ?>
<div style="background: url('static/gallery/<?php echo $gallery['link'] ?>')">
  <a href="delete.php?doc=gallery&id=<?php echo $gallery['id'] ?>&img=<?php echo $gallery['link'] ?>">Hapus</a>
</div>
<?php endforeach ?>
</div>