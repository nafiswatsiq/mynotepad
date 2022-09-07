<?php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$name   = $_POST['ename'];
$date   = $_POST['edate'];
$desc   = $_POST['edesc'];
$color  = $_POST['ecolor'];
$icon   = $_POST['eicon'];

// format date
$explode = explode(" - ",$date);

$check_date = count($explode);

if($check_date == 1){
  function format_date($date){
    $date = explode("/", $date);
    $date = implode("-", $date);
    $date = explode(" ", $date);
    $date = implode("-", $date);
    $date = str_replace('-pm', '', $date);
    $date = explode("-", $date);
    $res_date = $date[2].'-'.$date[0].'-'.$date[1].' '.$date[3].':00';
    return $res_date;
  };
  
  $date_start = format_date($explode[0]);
  $date_end = format_date($explode[0]);
}else{
  function format_date($date){
    $date = explode("/", $date);
    $date = implode("-", $date);
    $date = explode(" ", $date);
    $date = implode("-", $date);
    $date = str_replace('-pm', '', $date);
    $date = explode("-", $date);
    $res_date = $date[2].'-'.$date[0].'-'.$date[1].' '.$date[3].':00';
    return $res_date;
  };

  $date_start = format_date($explode[0]);
  $date_end = format_date($explode[1]);
}

// insert database
$save = mysqli_query($conn, "INSERT INTO `calendar`(`id`, `id_user`, `name`, `description`, `color`, `icon`, `start`, `end`) 
                              VALUES ('','$id_user','$name','$desc','$color','$icon','$date_start','$date_end')");

header('Location: ' . $_SERVER['HTTP_REFERER']);