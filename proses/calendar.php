<?php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

$id     = json_encode($_POST['id'], true);
$title  = json_encode($_POST['title'], true);
$start  = json_encode($_POST['start'], true);
$end    = json_encode($_POST['end'], true);

echo $start;
// echo 1;

// $jsonobj = '
// { "id": 1,
//   "name": "nafis watsiq",
//   "data": {
//             "tgl" : 12,
//             "umur" : 20
//           }
// }';

// $p = json_decode($jsonobj, true);

// // $d = json_encode($p);

// var_dump($p['data']['umur']);
// echo $p['data']['umur'];

// echo '<br>';

// foreach ($p as $data){
//   echo $data;
// };

// echo "</br>";

// $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

// echo json_encode($arr['a']);
