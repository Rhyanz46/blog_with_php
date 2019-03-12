<?php 

include 'admin/inc/set_database.php';  

$narkotika      = 'SELECT * FROM narkoba WHERE kategori="narkotika";';
$psikotropika   = 'SELECT * FROM narkoba WHERE kategori="psikotropika";';
$zatadiktif     = 'SELECT * FROM narkoba WHERE kategori="zatadiktif";';
 
$ResultNarkotika      = mysqli_query($koneksidb, $narkotika)or die(mysql_error);
$ResultPsikotropika   = mysqli_query($koneksidb, $psikotropika)or die(mysql_error);
$ResultZatadiktif     = mysqli_query($koneksidb, $zatadiktif)or die(mysql_error);

$jumlahNarkotika    = mysqli_num_rows($ResultNarkotika);
$jumlahPsikotropika = mysqli_num_rows($ResultPsikotropika);
$jumlahZatadiktif   = mysqli_num_rows($ResultZatadiktif);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Narkoba</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background : url('admin/img/default/bg.jpg')">
    <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" style="margin-bottom: 20px; background : white">
            <div class="container">
                <a class="navbar-brand" href="">
                    <strong id="judul-halaman"></strong>
                    <div style="display: none;" id="idnya"></div>
                </a>
            </div>
    </nav>
    <div id="test"></div>
    <div id="test2"></div>
    <section class="container"  id="konten">
        <div class="text-center" style="font-size: 24px;margin-bottom: 20px"><b>Jenis-jenis Narkoba</b></div>
        <div class="text-center">
            <button class="btn btn-md btn-success" ke="Profil Peneliti" style="width: 13em !important;">Profil Peneliti</button>
            <button class="btn btn-md btn-success" ke="Profil Perusahaan" style="width: 13em !important;">Profil BNN</button>
        </div>
        <div class="text-center">


            <?php if ($jumlahNarkotika > 0): ?> 
                <div class="col-sm-12">
                    <button ke="Menu Narkotika" class="btn btn-md btn-success red" style="width: 12em !important;">Narkotika</button>
                </div>
            <?php else: ?>
                <div class="col-sm-12">
                    <button ke="Menu Narkotika" class="btn btn-md btn-success red" style="width: 12em !important;" disabled>Narkotika <small style="color: yellow">[empty]</small></button>
                </div>
            <?php endif ?>



            <?php if ($jumlahPsikotropika > 0): ?>
                <div class="col-sm-12">
                    <button ke="Menu Psikotropika" class="btn btn-md btn-success red" style="width: 12em !important;">Psikotropika</button>
                </div>
            <?php else: ?>
                <div class="col-sm-12">
                    <button ke="Menu Psikotropika" class="btn btn-md btn-success red" style="width: 12em !important;" disabled>Psikotropika <small style="color: yellow">[empty]</small></button>
                </div>
            <?php endif ?>


            <?php if ($jumlahZatadiktif > 0): ?>
                <div class="col-sm-12">
                    <button ke="Menu Zat Adiktif" class="btn btn-md btn-success red" style="width: 12em !important;">Zat Adiktif</button>
                </div>
            <?php else: ?>
                <div class="col-sm-12">
                    <button ke="Menu Zat Adiktif" class="btn btn-md btn-success red" style="width: 12em !important;" disabled>Zat Adiktif <small style="color: yellow">[empty]</small></button>
                </div> 
            <?php endif ?>

            <div class="col-sm-12">
                <button class="btn btn-md btn-success red" ke="Menu Quiz" style="width: 12em !important;">Materi Pemahaman</button>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-md btn-success red" ke="Langkah Langkah Pencegahan" style="width: 12em !important;">Pencegahan</button>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-md btn-success red" href="admin" style="width: 12em !important;">Admin</a>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/jscript.js"></script>
    <script type="text/javascript">
        $('#judul-halaman').text('Pengenalan Narkoba');
    </script>
</body>
</html>