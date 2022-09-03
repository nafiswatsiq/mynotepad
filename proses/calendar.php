<?php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$schedule = json_decode($_POST['schedule'], true);
// // $schedule = json_encode($schedule, true);

echo $schedule;
// echo 1;

// $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

// $p = json_decode($jsonobj, true);

// // $d = json_encode($p);

// echo $p['Ben'];

// echo "</br>";

// $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

// echo json_encode($arr['a']);
