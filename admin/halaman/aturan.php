<?php 

$sql = "SELECT * FROM aturan;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data as $aturan) {
  $aturannya  = $aturan['aturan'];
}

?>


 <div class="box box-warning">
            <div class="box-header with-border">
            <div class="row">
            	<div class="col-md-10">
	              <h3 class="box-title">
	                  Aturan Main
	              </h3>
              	</div>
	            <div class="col-md-1">
	            	<!-- <button class="btn btn-warning" id="edit" onclick="enable()">EDIT</button> -->
	                <!-- <button class="btn btn-warning" id="cancel" onclick="disable()">CANCEL</button> -->
	            </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="insert.php" method="POST">
                <div class="form-group">
                	<textarea name="aturan" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $aturannya; ?></textarea>
                </div>
                  <div class="box box-default" style="padding-top: 10px; margin-top: 10px;" >
                  	<div class="row">
                  		<div class="col-md-11"><button class="btn btn-success" type="submit">SAVE</button></div>
                  	</div>
                  </div>

                
              </form>
            </div>


</div>




<!-- <script>
    document.getElementById("judul").disabled = true;
    document.getElementById("namalain").disabled = true;
    document.getElementById("penjelasan").disabled = true;
    document.getElementById("gejala").disabled = true;
    document.getElementById("akibat").disabled = true;
    document.getElementById("foto").disabled = true;
    document.getElementById("cancel").style.display = 'none';
    
    function enable(){
    	document.getElementById("edit").style.display = 'none';
    	document.getElementById("cancel").style.display = 'block';
    	document.getElementById("judul").disabled = false;
    	document.getElementById("namalain").disabled = false;
    	document.getElementById("penjelasan").disabled = false;
	    document.getElementById("gejala").disabled = false;
	    document.getElementById("akibat").disabled = false;
	    document.getElementById("foto").disabled = false;
    }

    function disable(){
    	document.getElementById("edit").style.display = 'block';
    	document.getElementById("cancel").style.display = 'none';
    	document.getElementById("judul").disabled = true;
    	document.getElementById("namalain").disabled = true;
	    document.getElementById("penjelasan").disabled = true;
	    document.getElementById("gejala").disabled = true;
	    document.getElementById("akibat").disabled = true;
	    document.getElementById("foto").disabled = true;
    }
</script> -->