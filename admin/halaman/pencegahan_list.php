<?php
$semua_data      = 'SELECT * FROM pencegahan;';
$hasil_semua_data = mysqli_query($koneksidb, $semua_data)or die(mysql_error);
?>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pencegahan</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tambah Data</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box">            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Judul</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th></tr>
                </thead>
                <tbody>
                    <?php
                        foreach($hasil_semua_data as $data){
                            echo '<tr role="row" datake="'. $data['id'] .'">';
                            echo '<td class="sorting_1">' . $data['judul'] . '</td>';
                            echo '<td>
                            <i class="fa fa-edit" style="float: left; margin-right: 20px;cursor: pointer;" onclick="edit('. $data['id'] .')"> Edit</i> 
                            <i class="fa fa-remove" style="float: left;cursor: pointer;" onclick="hapusin('. $data['id'] .')"> Hapus</i> </td>';
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
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="insert.php" method="POST">
                <!-- text input -->
                <div class="form-group">
                  <label>Judul</label>
                  <input name="judul" id="judul" class="form-control" placeholder="Judul ..." type="text">
                </div>

                <div class="form-group">
                	<label>Penjelasan</label>
                	<textarea name="post" id="penjelasan" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
<script>
function edit(id){
    window.location.href = 'index.php?p=edit_pencegahan&id=' + id;    
}
function hapusin(id){
    setTimeout(function(){ 
    var ajax 	= new XMLHttpRequest();
	var method 	= "GET";
	var url 	= 'delete.php?id=' + id + '&doc=pencegahan';

	var asynchronous = true;
	ajax.open(method, url, asynchronous);
	ajax.send();
    document.querySelectorAll('[datake="' + id +'"]')[0].style.display = 'none'

    }, 1000);
    
}
</script>