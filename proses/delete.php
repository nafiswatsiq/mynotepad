<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

if($_GET['delete']){
$id_note = $_GET['delete'];
$new_note = mysqli_query($conn, "DELETE FROM `data_note` WHERE id_note='$id_note'");

header('location: ../');
}
?>