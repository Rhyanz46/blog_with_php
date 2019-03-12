<?php 

include("inc/set_database.php"); 
include("inc/helper.php"); 
include("inc/data_static.php"); 


if (!empty($_POST['kategori'])) { //narkoba
	$nama 			= $_POST['nama'];
	$nama_lain 		= $_POST['nama_lain'];
	$deskripsi		= $_POST['deskripsi'];
	$akibat			= $_POST['akibat'];
	$gambar			= $_FILES['gambar']['name'];
	$tmp			= $_FILES['gambar']['tmp_name'];
	$gejala			= $_POST['gejala'];
	$kategori		= strtolower($_POST['kategori']);
	$tempat 		= "img/";
	$upload_kesini 	= $tempat.basename($gambar);
	$tgl			= date('Y-m-d H:i:s');
	
	if (move_uploaded_file($tmp, $upload_kesini)) {
		$sql = "INSERT INTO post_list(nama,nama_lain,deskripsi,akibat,gambar,gejala,kategori, tgl, views) VALUES('$nama', '$nama_lain', '$deskripsi', '$akibat', '$gambar', '$gejala', '$kategori', '$tgl', 0)";
		$data = mysqli_query( $koneksidb, $sql);

		if ($data) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			echo "Gagal Query";
			echo "<br>";
			echo $sql;
		}
	}else{
		header('Location: index.php?p=narkoba&pesan=gagal');
	}

}elseif (!empty($_POST['soal'])) {
	$soal 		= $_POST['soal'];
	$jawabana 	= $_POST['jawabana'];
	$jawabanb 	= $_POST['jawabanb'];
	$jawabanc 	= $_POST['jawabanc'];
	$jawaband 	= $_POST['jawaband'];
	$benar	 	= $_POST['benar'];

	$nama_gambar 	= $_FILES['gambar']['name'];
	$tmp			= $_FILES['gambar']['tmp_name'];
	$tempat 		= "img/team/";
	$upload_kesini 	= $tempat.basename($nama_gambar);

	if (move_uploaded_file($tmp, $upload_kesini)) {
		$sql 	= "INSERT INTO soal(soal,jawabana,jawabanb,jawabanc,jawaband,benar, img) VALUES('$soal','$jawabana','$jawabanb','$jawabanc','$jawaband','$benar', '$nama_gambar')";
		$data 	= mysqli_query($koneksidb, $sql);

		if ($data) {
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}else{
			echo "Gagal Query";
		}
		
	} else {
		echo "Gagal Upload ded";
	}
}elseif (!empty($_POST['alamat'])) { //perusahaan
	$singkatan	= $_POST['singkatan'];
	$gambar 	= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	$nama 		= $_POST['nama'];
	$alamat 	= $_POST['alamat'];
	$tempat 		= "img/profil/";
	$upload_kesini 	= $tempat.basename($gambar);

	$sqlTes = "SELECT * FROM profil_perusahaan;";
	$result = mysqli_query($koneksidb,$sqlTes);
	$ada 	= mysqli_num_rows($result);

	if (move_uploaded_file($tmp, $upload_kesini)) {
		if ($result){
	   		if($ada > 0){
	      		$sql = "UPDATE profil_perusahaan SET singkatan='$singkatan',gambar='$gambar',nama='$nama',alamat='$alamat' WHERE no=0;";
	    	}else{
	    		$sql = "INSERT INTO profil_perusahaan(no,singkatan,gambar,nama,alamat) VALUES(0,'$singkatan','$gambar','$nama','$alamat')";
	    	}
	  	}else{
	    	echo "Cek Failed.";
		}

		$data 	= mysqli_query($koneksidb, $sql);

		if ($data) {
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}else{
			echo "Gagal Query";
		}
	} else {
		echo "Gagal Upload";
	}
	

	
}elseif (!empty($_POST['nim'])) { //profil
	$gambar 	= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	$tipe_img	= $_FILES['gambar']['type'];
	$nim 		= $_POST['nim'];
	$nama 		= $_POST['nama'];
	$jurusan 	= $_POST['jurusan'];
	$tempat 		= "img/profil/";
	$upload_kesini 	= $tempat.basename($gambar);

	$sqlTes = "SELECT * FROM profil_peneliti;";
	$result = mysqli_query($koneksidb,$sqlTes);
	$ada 	= mysqli_num_rows($result);

	if (move_uploaded_file($tmp, $upload_kesini)) {
		if ($result){
	   		if($ada > 0){
	      		$sql = "UPDATE profil_peneliti SET gambar='$gambar',nim='$nim',nama='$nama',jurusan='$jurusan' WHERE no=0;";
	    	}else{
	    		$sql = "INSERT INTO profil_peneliti(no,gambar,nim,nama,jurusan) VALUES(0,'$gambar','$nim','$nama','$jurusan')";
	    	}
	  	}else{
	    	echo "Cek Failed.";
		}
		
		$data 	= mysqli_query($koneksidb, $sql);

		if ($data) {
			header('Location: '. $_SERVER['HTTP_REFERER']);
		}else{
			echo "Gagal Query";
		}
	} else {
		echo "Gagal upload";
	}
	

 	
}elseif (!empty($_POST['aturan'])) { //profil
	$aturan	= $_POST['aturan'];

	$sqlTes = "SELECT * FROM aturan;";
	$result = mysqli_query($koneksidb,$sqlTes);
	$ada 	= mysqli_num_rows($result);

 	if ($result){
   		if($ada > 0){
      		$sql = "UPDATE aturan SET aturan='$aturan' WHERE no=0;";
    	}else{
    		$sql = "INSERT INTO aturan(no,aturan) VALUES(0,'$aturan')";
    	}
  	}else{
    	echo "Cek Failed.";
	}
	
	$data 	= mysqli_query($koneksidb, $sql);

	if ($data) {
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}else{
		echo "Gagal Query";
	}
}elseif(!empty($_POST['slidder'])){
	$title   	= $_POST['title'];
	$deskripsi  = $_POST['deskripsi'];
    $file       = $_FILES['img'];
    $file_gambar= $file['tmp_name'];
    $gambar     = $file['name'];
    $extendsi   = explode("/",$file['type'])[0];
	$real_extendsi  = explode("/",$file['type'])[1];

    $upload_boleh   = false;
    $upload_selesai = false;
	$no = 1;
	$data_terakhir = "SELECT * FROM slidder WHERE no = (SELECT MAX(no) FROM slidder)";
	$data_terakhir = mysqli_query($koneksidb, $data_terakhir) or die(mysql_error);

	$data = array();
	while ($baris = mysqli_fetch_assoc($data_terakhir)) {
		$data[] = $baris;
	}
	$no = $data[0]["no"];
	$no++;

    if($extendsi == 'image'){
		$upload_boleh = true;
		if($real_extendsi == "jpeg"){
			$real_extendsi = "jpg";
		}
		$gambar = make_random($gambar, $real_extendsi);
		$upload_kesini 	= $static_folder_slider.basename($gambar);
        if(move_uploaded_file($file_gambar, $upload_kesini)){
            $upload_selesai = true;
        }else{
            $gambar = "error";
        }
    }else{
        $gambar = "kosong";
	}

	$sql = "INSERT INTO slidder VALUES($no, '$title', '$deskripsi', '$gambar')";
    $data = mysqli_query($koneksidb, $sql);
    if($data){
        header('Location: index.php?p=slidder&status=sukses');
    }else{
		header('Location: index.php?p=slidder&status=error');
    }
}else{
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>

