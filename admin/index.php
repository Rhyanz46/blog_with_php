<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header('Location: login.php');
}
include 'inc/set_database.php';  
include 'inc/helper.php';  

$narkotika      = 'SELECT * FROM post_list WHERE kategori="narkotika";';
$psikotropika   = 'SELECT * FROM post_list WHERE kategori="psikotropika";';
$zatadiktif     = 'SELECT * FROM post_list WHERE kategori="zatadiktif";';
 
$ResultNarkotika      = mysqli_query($koneksidb, $narkotika)or die(mysql_error);
$ResultPsikotropika   = mysqli_query($koneksidb, $psikotropika)or die(mysql_error);
$ResultZatadiktif     = mysqli_query($koneksidb, $zatadiktif)or die(mysql_error);

$jumlahNarkotika    = mysqli_num_rows($ResultNarkotika);
$jumlahPsikotropika = mysqli_num_rows($ResultPsikotropika);
$jumlahZatadiktif   = mysqli_num_rows($ResultZatadiktif);



$sql = "SELECT * FROM profil_perusahaan;";
$data_perusahaan = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data_perusahaan as $data) {
  $singkatan_perusahaan  = $data['singkatan'];
  $gambar_perusahaan     = $data['gambar'];
  $nama_perusahaan       = $data['nama'];
  $alamat_perusahaan     = $data['alamat'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengenalan Narkoba</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="style/css/hover.css">
  <link rel="stylesheet" type="text/css" href="style/css/style.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

<style type="text/css">
    .teksarea{
      width: 47%;
      margin-bottom: 10px;
    }
  @media only screen and (max-width: 767px) {
    .teksarea{
      width: 100%;
    }

    
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>P</b>NAR</span>
      <span class="logo-lg"><b>Dashboard</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="logout.php">Keluar  <i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel" style="cursor:pointer" onclick="window.location.href = 'index.php'; ">
        <div class="pull-left image">
          <img src="<?php echo 'img/profil/'.$gambar_perusahaan; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_depan; ?></p>
          <a href="#"><?php echo $nama_belakang; ?></a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="index.php?p=posts">
            <i class="fa fa-heartbeat"></i> <span>Post</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Static Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?p=soal"><i class="fa fa-circle-o"></i>Team</a></li>
            <li><a href="index.php?p=slidder"><i class="fa fa-circle-o"></i>Slider</a></li>
            <li><a href="index.php?p=aturan"><i class="fa fa-circle-o"></i>Aturan Main</a></li>
            <li><a href="index.php?p=gallery"><i class="fa fa-circle-o"></i>Gallery</a></li>
            <li><a href="index.php?p=instansi"><i class="fa fa-circle-o"></i>Instansi</a></li>
            <li><a href="index.php?p=about"><i class="fa fa-book"></i> <span>About</span></a></li>
          </ul>
        </li>
        <li><a href="index.php?p=pengaturan"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Admin Panel</small>
      </h1>
    </section> 
    <section class="content" id="isi">
    <?php if (isset($_GET['pesan'])):?>
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Warning ...!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Isikan Data Dengan Benar
            </div>
          </div> 
    <?php endif ?>

      <?php
        $pages_dir = 'halaman';
        if(!empty($_GET['p'])){
          $pages = scandir($pages_dir, 0);
          unset($pages[0], $pages[1]);
          $p = $_GET['p'];
          if(in_array($p.'.php', $pages)){
            include($pages_dir.'/'.$p.'.php');
          } else {
            echo 'Halaman tidak ditemukan! :(';
          }
        } else {
          include($pages_dir.'/posts.php');
        }
      ?>
    </section>

  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="localhost">Website Pengenalan Narkoba</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>