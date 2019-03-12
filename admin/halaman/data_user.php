<?php 
$sql = "SELECT * FROM admin;";
$data_admin = mysqli_query($koneksidb, $sql)or die(mysql_error);

$id_user = mysqli_fetch_assoc($data_admin)['id'];
$email_user = mysqli_fetch_assoc($data_admin)['email'];

// foreach ($data as $admin) {
//   $id	  		= $admin['id'];
//   $email  		= $admin['email'];
// }
?>