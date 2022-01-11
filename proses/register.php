<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$id_user = generate_string($permitted_chars, 7);

if(isset($_POST['username'])){
    $nama_depan = $_POST['firstName'];
    $nama_belakang = $_POST['lastName'];
    $full_name = "$nama_depan $nama_belakang";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($query_user);
    if($cek > 0){
        header('location: ../register.php?m=1');
    }else{
    $enpw = password_hash($password, PASSWORD_DEFAULT);

    $query_regis = mysqli_query($conn, "INSERT INTO `user`(`id`, `id_user`, `nama`, `username`, `password`) VALUES ('','$id_user','$full_name','$username','$enpw')");
    $_SESSION['nama']     = $full_name;
    $_SESSION['id_user']  = $id_user;
    $_SESSION['status']   = 'login_user';
    setcookie('IDUSR', $id_user, strtotime('+1 year'), '/');
    header('location: ../');
    }
}else{
    header('location: ../register.php?m=2');
};
?>