<?php 

include("inc/set_database.php"); 
include("inc/data_static.php"); 

if ($_GET['doc'] == 'soal') {
	$id        = $_GET['id'];
    $sql       = "DELETE FROM soal WHERE id = '$id';";
    $data      = mysqli_query($koneksidb, $sql);
    if($data){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        echo 'gagal';
    }
}elseif($_GET['doc'] == 'pencegahan'){
	$id        = $_GET['id'];
    $sql       = "DELETE FROM pencegahan WHERE id = '$id';";
    $data      = mysqli_query($koneksidb, $sql);
    if($data){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        echo 'gagal';
    }
}elseif($_GET['doc'] == 'hapus_soal'){
    $sql       = "DELETE FROM quiz;";
    $data      = mysqli_query($koneksidb, $sql);
    if($data){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        echo 'gagal';
    }
}elseif($_GET['doc'] == 'narkoba'){
    $id        = $_GET['id'];
    $sql       = "DELETE FROM narkoba WHERE id = '$id';";
    $data      = mysqli_query($koneksidb, $sql);
    if($data){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        echo 'gagal';
    }
}elseif($_GET['doc'] == 'gallery'){
    $id        = $_GET['id'];
    $img        = $_GET['img'];
    $sql       = "DELETE FROM gallery WHERE id = '$id';";
    $data      = mysqli_query($koneksidb, $sql);
    unlink($static_folder_gallery.$img);
    if($data){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        echo 'gagal';
    }
}