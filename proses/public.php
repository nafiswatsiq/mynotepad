<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$id_note = json_encode($_POST['idNote']);
if($id_note){
    $cek = mysqli_query($conn, "SELECT `public` FROM `data_note` WHERE id_note = $id_note");
    // echo $id_note;
    if($cek == false ){
        $result = mysqli_query($conn, "UPDATE `data_note` SET `public`=true WHERE id_note = $id_note");
        echo $result;
    }else{
        $result = mysqli_query($conn, "UPDATE `data_note` SET `public`=false WHERE id_note = $id_note");
        echo $result;
    }
}else{
    header('location: ../404');
}