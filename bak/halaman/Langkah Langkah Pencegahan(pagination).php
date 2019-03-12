<?php 

include '../admin/inc/set_database.php';  

$sql = "SELECT * FROM pencegahan;";
$pencegahan = mysqli_query($koneksidb, $sql)or die(mysql_error);

?>

<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style>
<div class="text-center mb-4">
    <div class="card card-body">
        <div class="dataa">
        <?php 
        foreach ($pencegahan as $data) {         
            echo '
                    <div class="text-left" style="margin-top: 10px; border-style: solid; border-color: white white black white; "> 
                    <a href="" style="color: red;">'.$data['judul'].'</a>
                    <br>
                    <p>'.$data["post"].'</p>
                    </div> 
                ';
        }

        ?>

        </div>
        

        <div class="row container" style="margin-top: 50px">
            <button class="btn btn-sm btn-danger" onclick="window.location.href=''" style="">Keluar</button>
             <a class="next" style="bottom:30px; right: 10%; position: absolute;" onclick="alert('a')">Baca Selanjutnya</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function()
 {
   $("#tab").pagination({
   items: 2,
   contents: 'dataa',
   previous: 'Sebelumnya',
   next: 'Baca Selanjutnya',
   position: 'bottom',
   });
});

</script>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/pagination.js"></script>
<!-- <script type="text/javascript" src="js/jscript.js"></script> -->