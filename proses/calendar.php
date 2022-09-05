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
