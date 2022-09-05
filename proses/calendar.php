<?php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$name   = $_POST['ename'];
$date   = $_POST['edate'];
$desc   = $_POST['edesc'];
$color  = $_POST['ecolor'];
$icon   = $_POST['eicon'];

echo $name;
echo '<br>';
echo $date;
echo '<br>';
echo $desc;
echo '<br>';
echo $color;
echo '<br>';
echo $icon; 
echo '<br>';
$str = $date;
$explode = explode(" - ",$str);

// $date_start = $explode[0];
$date_start = date('Y-m-d H:i:s');
$date_end = $explode[1];

$ex_end = explode("/", $date_end);
// echo $date_end;
echo implode("-", $ex_end);

// $save = mysqli_query($conn, "INSERT INTO `calendar`(`id`, 
//                                                     `id_user`, 
//                                                     `name`, 
//                                                     `description`, 
//                                                     `color`, 
//                                                     `icon`, 
//                                                     `start`, 
//                                                     `end`
//                                                     ) VALUES (
//                                                     '',
//                                                     '$id_user',
//                                                     '$name',
//                                                     '$desc',
//                                                     '$color',
//                                                     '$icon',
//                                                     '$date_start',
//                                                     '$date_end'
//                                                     )");
