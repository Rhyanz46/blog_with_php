<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

function ambil_kata($text, $count = 10) {
    return substr(strip_tags($text), 0, $count);
}

function make_random($nama, $akhir){
    return strtoupper(substr($nama, 0,4)). "-" . date('Y-m-d H:i:s') . "." . $akhir;
}