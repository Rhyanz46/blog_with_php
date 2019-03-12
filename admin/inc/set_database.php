<?php 
// session_start();
$host = "localhost";
$user = "root";
$pw = "a";
$db = "pengenalan_narkoba";

// Konek ke mysql Server 
$koneksidb  = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host,  $user,  $pw)); 
if (! $koneksidb) { echo "Failed Connection !"; 
} 

// Memilih database pd mysql Server 
mysqli_select_db($GLOBALS["___mysqli_ston"], $db) or die ("Database not Found !"); 


$sql = "SELECT * FROM profil_admin;";
$data = mysqli_query($koneksidb, $sql)or die(mysql_error);
foreach ($data as $admin){
  $nama_admin       = $admin['nama'];
  $deskripsi_admin  = $admin['deskripsi'];
  $alamat_admin     = $admin['alamat'];
  $gambar_admin     = $admin['gambar'];
  $job_admin        = $admin['job'];
  $fb_link_admin        = $admin['fb_link'];
  $twitter_link_admin   = $admin['twitter_link'];
  $instagram_link_admin = $admin['instagram_link'];
  $pinterest_link_admin  = $admin['pinterest_link'];
}

$sqlweb = "SELECT * FROM settings where id=0;";
$info_web = mysqli_query($koneksidb, $sqlweb)or die(mysql_error);

foreach ($info_web as $info) {
  $nama_website =  $info['nama_website'];
  $tag_line =  $info['tag_line'];
  $alamat =  $info['alamat'];
  $hp =  $info['hp'];
  $fb_link =  $info['fb_link'];
  $twitter_link =  $info['twitter_link'];
  $instagram_link =  $info['instagram_link'];
  $pinterest_link =  $info['pinterest_link'];
}

$sql = "SELECT * FROM post_list ORDER BY nama LIMIT 0,6";
$post_sql = mysqli_query($koneksidb, $sql)or die(mysql_error);
$post_data = array();
while ($baris = mysqli_fetch_assoc($post_sql)) {
	$post_data[] = $baris;
}

$post_sql_trending = "SELECT * FROM post_list ORDER BY views DESC LIMIT 0,6";
$post = mysqli_query($koneksidb, $post_sql_trending)or die(mysql_error);
$post_data_trending = array();
while ($baris = mysqli_fetch_assoc($post)) {
	$post_data_trending[] = $baris;
}

$kategori_data = array();
foreach($post_data as $data){
  $kategori_data[] = $data['kategori'];
}
$kategori_list = array_unique($kategori_data);

$semua_data      = "SELECT * FROM pencegahan WHERE id=0;";
$about_data_sql = mysqli_query($koneksidb, $semua_data)or die(mysql_error);
$about_data = array();

foreach($about_data_sql as $data){
  $about_id = $data['id'];
  $about_judul = $data['judul'];
  $about_post = $data['post'];
  $about_deskripsi = $data['deskripsi'];
  $about_gambar = $data['gambar'];
}


// $post_data_unique = array_unique($post_data);