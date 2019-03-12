<?php
$semua_data      = 'SELECT * FROM post_list;';
$hasil_semua_data = mysqli_query($koneksidb, $semua_data)or die(mysql_error);
?>

<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Data Narkoba</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tambah Data</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama Lain</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Deskripsi</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Manfaat</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Akibat</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kategori</th></tr>
                </thead>
                <tbody>
                    <?php
                        foreach($hasil_semua_data as $data){
                            echo '<tr role="row" class="odd" style="cursor: pointer" onclick="detail(' . $data['id'] . ')">';
                            echo '<td class="sorting_1">' . $data['nama'] . '</td>';
                            echo '<td>' . $data['nama_lain'] . '</td>';
                            echo '<td>' . strip_tags($data['deskripsi']) . '</td>';
                            echo '<td>' . $data['gejala'] . '</td>';
                            echo '<td>' . $data['akibat'] . '</td>';
                            echo '<td>' . $data['kategori'] . '</td>';
                            echo '</tr>';
                            
                        }
                    ?>
                </tbody>
              </table></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
            </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                  <div class="box box-warning">
            <div class="box-header with-border">
            <div class="row">
            	<div class="col-md-10">
	              <h3 class="box-title">
	                  NARKOBA
	              </h3>
              </div>
	            <div class="col-md-1">
                <!-- <button class="btn btn-warning" id="edit" onclick="enable()">EDIT</button> -->
	              <!-- <button class="btn btn-warning" id="cancel" onclick="disable()">CANCEL</button> -->
	            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="insert.php" method="POST" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input name="nama" id="judul" class="form-control" placeholder="Judul ..." type="text">
                </div>

                <div class="form-group">
                  <label>Nama Lain</label>
                  <input name="nama_lain" id="namalain" class="form-control" placeholder="Nama Lain ..." type="text">
                </div>



                <div class="form-group">
                	<label>Penjelasan</label>
                	<textarea name="deskripsi" id="penjelasan" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <div class="form-group">
                  <label for="gejala">Manfaat</label>
                  <textarea name="gejala" id="gejala" class="form-control" rows="3" placeholder="[Gejala] Optional ..."></textarea>
                </div>

                <div class="form-group">
                  <label for="akibat">Akibat</label>
                  <textarea name="akibat" id="akibat" class="form-control" rows="3" placeholder="[Akibat] Optional ..."></textarea>
                </div>


                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input id="foto" type="file" name="gambar" accept="image/png, image/*">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori">
                    <?php if ($jumlahNarkotika < 6): ?>
                      <option value="narkotika">Narkotika</option>
                    <?php else: ?>
                      <option value="narkotika" disabled>Narkotika [Data Sudah Penuh]</option>
                    <?php endif ?>
                    <?php if ($jumlahPsikotropika < 6): ?>
                      <option value="psikotropika">Psikotropika</option>
                    <?php else: ?>
                      <option value="psikotropika" disabled>Psikotropika [Data Sudah Penuh]</option>
                    <?php endif ?>
                    <?php if ($jumlahZatadiktif < 6): ?>
                      <option value="zatadiktif">Zat Adiktif</option>
                    <?php else: ?>
                      <option value="zatadiktif" disabled>Zat Adiktif [Data Sudah Penuh]</option>
                    <?php endif ?>
                  </select>
                </div>
                <input type="text" name="kategory" value="Sudah" style="display: none">
                  <div class="box box-default" style="padding-top: 10px; margin-top: 10px;" >
                  	<div class="row">
                  		<div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
                  	</div>
                  </div>
              </form>
            </div>
            </div>
            </div>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
<script>
function detail(id){
    window.location.href = 'index.php?p=edit_narkoba&id=' + id; 
}
</script>