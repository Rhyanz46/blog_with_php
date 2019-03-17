<?php 
include("inc/set_database.php"); 
include("inc/helper.php"); 
include("inc/data_static.php"); 
if (!empty($_POST['soal'])) {
	$id 		= $_POST['id'];
	$soal 		= $_POST['soal'];
	$jawabana 	= $_POST['jawabana'];
	$jawabanb 	= $_POST['jawabanb'];
	$jawabanc 	= $_POST['jawabanc'];
	$jawaband 	= $_POST['jawaband'];
	$benar	 	= $_POST['benar'];
    
    $sql = "UPDATE soal SET soal='$soal', jawabana='$jawabana', jawabanb='$jawabanb', jawabanc='$jawabanc', jawaband='$jawaband', benar='$benar' WHERE id='$id';";

	$data = mysqli_query($koneksidb, $sql);

	if ($data) {
        header('Location: index.php?p=soal');
	}else{
		echo "Gagal Query";
	}
}elseif(!empty($_POST['informasiwebsite'])){
    $nama_website   = $_POST['nama_website'];
    $tag_line       = $_POST['tag_line'];
    $alamat         = $_POST['alamat'];
    $hp             = $_POST['hp'];
    $fb_link        = $_POST['fb_link'];
    $twitter_link   = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];
    $pinterest_link = $_POST['pinterest_link'];
    $file       = $_FILES['gambar'];
    $file_gambar= $file['tmp_name'];
    $gambar     = $file['name'];
    $extendsi   = explode("/",$file['type'])[0];
    $real_extendsi  = explode("/",$file['type'])[1];
    $upload_boleh   = false;
    $upload_selesai = false;
    $upload_kesini 	= $static_folder.basename($gambar);

    $sqls   = "SELECT * FROM settings WHERE id=0";
    $jumlah = mysqli_num_rows(mysqli_query($koneksidb, $sqls));

    if($jumlah == 0){
        $sql = "INSERT INTO settings(id) VALUES(0)";
        mysqli_query($koneksidb, $sql);
    }
    if($extendsi == 'image'){
        $upload_boleh = true;
        if(move_uploaded_file($file_gambar, $upload_kesini)){
            $upload_selesai = true;
            $gambar = make_random($gambar, $real_extendsi);
        }else{
            $gambar = "error";
        }
    }else{
        $gambar = "kosong";
    }
    $data_save = "UPDATE settings SET nama_website='$nama_website', tag_line='$tag_line', alamat='$alamat', hp='$hp', fb_link='$fb_link', twitter_link='$twitter_link', instagram_link='$instagram_link', pinterest_link='$pinterest_link', gambar='$gambar'  WHERE id=0";

    echo $data_save;
    $data = mysqli_query($koneksidb, $data_save);
    if($data){
        header('Location: index.php?p=pengaturan&status=sukses');
    }else{
        header('Location: index.php?p=pengaturan&status=error');
    }
}elseif (!empty($_POST['profil_admin'])) { 
    $deskripsi	= $_POST['deskripsi'];
    $file       = $_FILES['gambar'];
	$gambar 	= $file['name'];
	$tmp		= $file['tmp_name'];
	$nama 		= $_POST['nama'];
	$job 		= $_POST['job'];
    $alamat 	= $_POST['alamat'];
    $fb_link        = $_POST['fb_link'];
    $twitter_link   = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];
    $pinterest_link = $_POST['pinterest_link'];
    $tempat 		= "img/profil/";
    $type_extendsi  = explode("/",$file['type'])[0];
    $real_extendsi  = explode("/",$file['type'])[1];
    $gambar = make_random($gambar, $real_extendsi);

    $upload_kesini 	= $tempat.basename($gambar);

	$sqlTes = "SELECT * FROM profil_admin;";
	$result = mysqli_query($koneksidb,$sqlTes);
    $ada 	= mysqli_num_rows($result);
    
    if($file['name'] == "" OR $type_extendsi != 'image'){
        $gambar = $gambar_admin;
    }else{
        echo "ada file";
        if (move_uploaded_file($tmp, $upload_kesini)) {
            echo "uploaded";
        }else{
            echo "failed upload";
        }
    }

    if($type_extendsi != 'image'){
        header('Location: index.php?p=pengaturan&status=salah_image');
    }else{
        if($ada > 0){
            $sql = "UPDATE profil_admin SET job='$job', deskripsi='$deskripsi',gambar='$gambar',nama='$nama',alamat='$alamat',  fb_link='$fb_link', twitter_link='$twitter_link', instagram_link='$instagram_link', pinterest_link='$pinterest_link' WHERE no=0;";
        }else{
            $sql = "INSERT INTO profil_admin(no, job, deskripsi,gambar,nama,alamat, fb_link, twitter_link, instagram_link, pinterest_link) VALUES(0, '$job','$deskripsi','$gambar','$nama','$alamat', '$fb_link', '$twitter_link', '$instagram_link', '$pinterest_link')";
        }
    
        $data 	= mysqli_query($koneksidb, $sql);
        
        echo $type_extendsi != 'image';
    
        if($data){
            unlink($tempat.basename($gambar_admin));
            header('Location: index.php?p=pengaturan&status=sukses');
        }else{
            header('Location: index.php?p=pengaturan&status=error');
        }
    }
}elseif(!empty($_POST['deskripsi_gallery'])){
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];

    $sqlTes = "SELECT * FROM gallery_deskripsi;";
	$result = mysqli_query($koneksidb,$sqlTes);
    $ada 	= mysqli_num_rows($result);
    if($ada > 0){
        $query = "UPDATE gallery_deskripsi SET title='$title', deskripsi='$deskripsi' WHERE no=0;";
    }else{
        $query = "INSERT INTO gallery_deskripsi(no, title, deskripsi) VALUES(0, '$title', '$deskripsi');";
    }
    $act_query = mysqli_query($koneksidb, $query);
    if($act_query){
        header('Location: index.php?p=gallery&status=sukses');
    }else{
        header('Location: index.php?p=gallery&status=error');
    }

}

if(!empty($_POST['post'])){
    $judul 	= $_POST['judul'];
	$post 	= $_POST['post'];
	$deskripsi 	= $_POST['deskripsi'];
	$file       = $_FILES['gambar'];
	$gambar 	= $file['name'];
	$tmp		= $file['tmp_name'];

	$tempat 		= "img/about/";
    $type_extendsi  = explode("/",$file['type'])[0];
    $real_extendsi  = explode("/",$file['type'])[1];
    $gambar = make_random($gambar, $real_extendsi);

    $upload_kesini 	= $tempat.basename($gambar);

	$sqlTes = "SELECT * FROM pencegahan;";
	$result = mysqli_query($koneksidb,$sqlTes);
    $ada 	= mysqli_num_rows($result);
    
    if($file['name'] == "" OR $type_extendsi != 'image'){
        $gambar = $about_gambar;
    }else{
        echo "ada file";
        if (move_uploaded_file($tmp, $upload_kesini)) {
            echo "uploaded";
        }else{
            echo "failed upload";
        }
    }

    if($type_extendsi != 'image'){
        header('Location: index.php?p=about&status=salah_image');
    }else{
        if($ada > 0){
            $sql 	= "UPDATE pencegahan SET judul='$judul', post='$post', deskripsi='$deskripsi', gambar='$gambar' WHERE id=0;";
        }else{
			$sql 	= "INSERT INTO pencegahan(id, judul,post, deskripsi, gambar) VALUES(0,'$judul','$post', '$deskripsi', '$gambar')";
        }
        $data 	= mysqli_query($koneksidb, $sql);
        unlink($tempat.basename($about_gambar));
        if($data){
            header('Location: index.php?p=about&status=sukses');
        }else{
            header('Location: index.php?p=about&status=error');
        }
    }
}

if(!empty($_POST['gejala'])){
    $id 		    = $_POST['id'];
    $nama 		    = $_POST['nama'];
    $nama_lain 		= $_POST['nama_lain'];
    $deskripsi 		= $_POST['deskripsi'];
    $gejala 		= $_POST['gejala'];
    $akibat 		= $_POST['akibat'];
    $kategori 		= $_POST['kategori'];
    
    if(empty($_POST['nama'])){
        header('Location: index.php?p=edit_narkoba&id='.$id.'&error=nama');
    }else{            
        $sqls = "UPDATE post_list SET nama='$nama', nama_lain='$nama_lain', deskripsi='$deskripsi', gejala='$gejala', kategori='$kategori' WHERE id='$id';";
        $data = mysqli_query($koneksidb, $sqls);
    
        if ($data) {
            header('Location: index.php?p=narkoba');
        }else{
            echo "Gagal Query";
        }
    }
}

if(!empty($_POST['email'])){
    $id             = $_POST['id'];
    $email          = $_POST['email'];
    $password       = md5($_POST['password']);
    
    $sqls = "UPDATE admin SET email='$email', password='$password' WHERE id='$id';";
    $data = mysqli_query($koneksidb, $sqls);

    if ($data) {
        header('Location: index.php?p=pengaturan');
        
    }else{
        echo "Gagal Query";
    }
}


if(!empty($_POST['data'])){
    if($_POST['data'] == "gambar"){
        $id 		    = $_POST['id'];
        $gambar			= $_FILES['edit_gambar_narkoba']['name'];
        $gambar_type    = $_FILES['edit_gambar_narkoba']['type'];
        $support_imga   = 'image/jpeg';
        $support_imgb   = 'image/jpg';
        $support_imgc   = 'image/png';
        $tmp			= $_FILES['edit_gambar_narkoba']['tmp_name'];
        $upload_kesini 	= $static_folder.basename($gambar);
        
        if ($gambar_type == $support_imga || $gambar_type == $support_imgb || $gambar_type == $support_imgc) {
            if(move_uploaded_file($tmp, $upload_kesini)){
                $sqls = "UPDATE post_list SET gambar='$gambar' WHERE id='$id';";
                $data = mysqli_query($koneksidb, $sqls);
        
                if ($data) {
                    header('Location: index.php?p=edit_post&id='.$id.'&data=berhasil');
                }else{
                    echo "Gagal Query";
                }
            }else{
                header('Location: index.php?p=edit_post&id='.$id.'&error=koneksi');
            }
        } else {
            header('Location: index.php?p=edit_post&id='.$id.'&error=gambar');
        }

    
    }
}


// if(!empty($_POST['gejala'])){
//     $id 		    = $_POST['id'];
//     $nama 		    = $_POST['nama'];
//     $nama_lain 		= $_POST['nama_lain'];
//     $deskripsi 		= $_POST['deskripsi'];
//     $gambar			= $_FILES['gambar']['name'];
//     $gambar_type    = $_FILES['gambar']['type'];
//     $support_imga   = 'image/jpeg';
//     $support_imgb   = 'image/jpg';
//     $support_imgc   = 'image/png';
// 	$tmp			= $_FILES['gambar']['tmp_name'];
//     $gejala 		= $_POST['gejala'];
//     $akibat 		= $_POST['akibat'];
//     $kategori 		= $_POST['kategori'];
//     $tempat 		= "img/";
// 	$upload_kesini 	= $tempat.basename($gambar);
    
//     if ($gambar_type == $support_imga || $gambar_type == $support_imgb || $gambar_type == $support_imgc) {
//         if(empty($_POST['nama'])){
//             header('Location: index.php?p=edit_narkoba&id='.$id.'&error=nama');
//         }else{
//             if(move_uploaded_file($tmp, $upload_kesini)){
//                 $sqls = "UPDATE narkoba SET nama='$nama', nama_lain='$nama_lain', deskripsi='$deskripsi', gejala='$gejala', akibat='$akibat', gambar='$gambar', kategori='$kategori' WHERE id='$id';";
//                 $data = mysqli_query($koneksidb, $sqls);
        
//                 if ($data) {
//                     header('Location: index.php?p=narkoba');
//                 }else{
//                     echo "Gagal Query";
//                 }
//             }else{
//                 header('Location: index.php?p=edit_narkoba&id='.$id.'&error=koneksi');
//             }
//         }
//     } else {
//         header('Location: index.php?p=edit_narkoba&id='.$id.'&error=gambar');
//     }
// }
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
