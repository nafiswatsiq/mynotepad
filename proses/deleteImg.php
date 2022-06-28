<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";

if(isset($_POST['images'])){
    $imgpath = "../" . $_POST['images'];
    unlink( $imgpath );
    echo "beres";
    // echo $imgpath;
}else{
    header('location: ../404');
}