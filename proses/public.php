<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$id_note = json_encode($_POST['idNote']);
if($id_note){
    $cek = mysqli_query($conn, "SELECT `public` FROM `data_note` WHERE id_note = $id_note");
    foreach($cek as $row) {
        $_cek =  $row['public'];
    }
    if($_cek == 0 ){
        $result = mysqli_query($conn, "UPDATE `data_note` SET `public`= 1 WHERE id_note = $id_note");
        echo 1;
    }elseif( $_cek == 1 ){
        $result = mysqli_query($conn, "UPDATE `data_note` SET `public`= 0 WHERE id_note = $id_note");
        echo 0;
    }
}else{
    header('location: ../404');
}