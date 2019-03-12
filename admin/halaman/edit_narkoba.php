<?php
$id = $_GET['id'];
$semua_data      = "SELECT * FROM post_list WHERE id='$id';";
$hasil_semua_data = mysqli_query($koneksidb, $semua_data)or die(mysql_error);
?>

<?php
    foreach($hasil_semua_data as $data){
        $nama = $data['nama'];
        $nama_lain = $data['nama_lain'];
        $deskripsi = $data['deskripsi'];
        $gambar = $data['gambar'];
        $gejala = $data['gejala'];
        $akibat = $data['akibat'];
        $kategori = $data['kategori'];
    }
?>

 <div class="box box-warning">
 <div class="box-header with-border">

  <?php if ($_GET['error'] == 'gambar'): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
    File Harus Ada dan Berbentuk Gambar.
  </div>    
  <?php elseif($_GET['error'] == 'koneksi'): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
    Kemungkinan koneksi anda lelet atau server sedang sibuk, silahkan coba ulang. :)
  </div>   
  <?php elseif($_GET['error'] == 'nama'): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
    Kolom Nama Harus di isi.!
  </div>   
  <?php elseif($_GET['data'] == 'berhasil'): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
    Gambar Berhasil Di Ubah
  </div>   
  
  <?php endif ?>

 <div class="row">
 	<div class="col-md-10">
    <h3 class="box-title">
        <i class="glyphicon glyphicon-chevron-left" onclick="kembali()" style="cursor: pointer"></i>  EDIT
    </h3>
   </div>
  <div class="col-md-1">
     <button class="btn btn-warning" id="edit" onclick="hapus('<?php echo $id ?>')">Hapus</button>
  </div>
 </div>
            
 <!-- /.box-header -->
 <div class="box-body">

<style>
 .gambarnya {
     position: relative;
     /* width: 100%; */
 }
 .image {
     opacity: 1;
     display: block;
     max-width: 50%;
     height: auto;
     transition: .5s ease;
     backface-visibility: hidden;
     margin-left: auto;
     margin-right: auto;
 }
 .middle {
     transition: .5s ease;
     opacity: 0;
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     -ms-transform: translate(-50%, -50%);
     text-align: center;
 }
 .gambarnya:hover .image {
     opacity: 0.3;
 }
 .gambarnya:hover .middle {
     opacity: 1;
 }
 .textnya {
     background-color: #4CAF50;
     color: white;
     font-size: 16px;
     padding: 16px 32px;
 }
 .haha input.upload {
     position: absolute;
     top: 0;
     right: 0;
     margin: 0;
     padding: 0;
     font-size: 20px;
     cursor: pointer;
     opacity: 0;
     filter: alpha(opacity=0);
     height: 100%;
     text-align: center;
 }
      </style>
 <div class="gambarnya">
        <!-- <img src="../admin/img/default/gambar.png"  alt="Avatar" class="image"> -->
        <img src="img/<?php echo $gambar ?>"  alt="Avatar" class="image">
        <div class="middle">
            <div class="haha">
            <form action="edit.php" method="POST" enctype="multipart/form-data" id="form_gambar">
                <input type="text" name="id" value="<?php echo $id ?>" hidden/>
                <input type="text" name="data" value="gambar" hidden/>
                <input id="uploadBtn" type="file" name="edit_gambar_narkoba" class="upload" accept="image/png, image/*"/>
                <div class="textnya">Ganti</div>
            </form>
            </div>

        </div>
    </div>
 
   <form role="form" action="edit.php" method="POST" enctype="multipart/form-data">
     <!-- text input -->
     <div class="form-group">
       <label>Nama</label>
       <input name="nama" id="judul" class="form-control" placeholder="Judul ..." type="text" value="<?php echo $nama ?>">
     </div>
     <div class="form-group">
       <label>Nama Lain</label>
       <input name="nama_lain" id="namalain" class="form-control" placeholder="Nama Lain ..." type="text" value="<?php echo $nama_lain ?>">
     </div>
     <div class="form-group">
     	<label>Penjelasan</label>
     	<textarea name="deskripsi" id="penjelasan" class="textarea" placeholder="Place some text here"
               style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $deskripsi ?></textarea>
     </div>
     <div class="form-group">
       <label for="gejala">Manfaat</label>
       <textarea name="gejala" id="gejala" class="form-control" rows="3" placeholder="[Gejala] Optional ..."><?php echo $gejala ?></textarea>
     </div>
     <!-- <div class="form-group">
       <label for="akibat">Akibat</label>
       <textarea name="akibat" id="akibat" class="form-control" rows="3" placeholder="[Akibat] Optional ..."><?php echo $akibat ?></textarea>
     </div> -->
     <div class="form-group">
       <label>Kategori</label>
       <select class="form-control" name="kategori">
          <?php foreach($post_data as $data): ?>
           <option value="narkotika"><?php echo $data['kategori'] ?></option>
          <?php endforeach ?>
       </select>
     </div>
       <input type="text" name="id" value="<?php echo $id ?>" hidden/>
     <input type="text" name="kategory" value="Sudah" style="display: none">
       <div class="box box-default" style="padding-top: 10px; margin-top: 10px;" >
       	<div class="row">
       		<div class="col-md-11"><button class="btn btn-success" type="submit">UPDATE</button></div>
       	</div>
       </div>
   </form>
 </div>
 </div>
 </div>
<script>
function kembali(){
    window.location.href = 'index.php?p=narkoba';  
}

function hapus(id) {
    console.log(id);
    setTimeout(function(){ 
    window.location.href = 'delete.php?id=' + id + '&doc=soal';
    var ajax  = new XMLHttpRequest();
    var method  = "GET";
    var url   = 'delete.php?id=' + id + '&doc=narkoba';

    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();

    }, 500);
}

document.getElementById("uploadBtn").onchange = function(){
      document.getElementById("form_gambar").submit();
}
</script>