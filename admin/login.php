<?php 
include 'inc/set_database.php'; 
session_start();

if (isset($_SESSION["email"])) {
  header('Location: index.php');
}

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password';";
  $data_login = mysqli_query($koneksidb, $sql)or die(mysql_error);

  $jumlah = mysqli_num_rows($data_login);
  $data   = mysqli_fetch_array($data_login);

  if ($jumlah > 0) {
    session_start();
    // session_register('email');

    $_SESSION['email']     = $data['email'];

    header('Location: index.php');
  }else{
    $salah = "error";
  }


  
  
 
}
?>
<script type="text/javascript"></script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Pengenalan Narkoba</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Login</b></a>
  </div>

<?php if ($salah == "error"): ?>
  <div class="callout callout-warning" style="margin-bottom: 0!important;">
    <h4><i class="fa fa-info"></i> Note:</h4>
    Salah Email / Password
  </div>
<?php endif ?>

  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input name="email" type="text" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <a href="../home.php" class="btn btn-default btn-block btn-flat">Back</a>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>