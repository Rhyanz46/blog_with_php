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
  <div class="col-sm-12" style="padding: 10px">
    <form role="form" action="insert.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control" name="instansi" value="instansi">
      <div class="form-group">
        <label for="title">Deskripsi Gambar</label>
        <input type="text" class="form-control" id="title" name="nama">
      </div>
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
        <textarea class="form-control" name="des" rows="3" placeholder="Enter ..."></textarea>
      </div>
        <div class="row">
        <div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
        </div>
    </form>
  </div>
</div>
<hr style="border-top: 1px solid #9c5683;">
<div class="grid-wrapper tengah grid-gab">
<?php foreach($instansi_data as $instansi): ?>
<div style="background: url('static/instansi/<?php echo $instansi['link'] ?>')">
  <a href="delete.php?doc=instansi&id=<?php echo $instansi['id'] ?>&img=<?php echo $gallery['link'] ?>">Hapus</a>
</div>
<?php endforeach ?>
</div>