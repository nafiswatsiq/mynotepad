<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($query_login);

    if($cek > 0){
        foreach ($query_login as $dt) :
            $id_user= $dt['id_user'];
            $nama   = $dt['nama'];
            $enpw   = $dt['password'];
        endforeach;
        if (password_verify($password, $enpw)) {
            $_SESSION['nama']     = $nama;
            $_SESSION['id_user']  = $id_user;
            $_SESSION['status']   = 'login_user';
            setcookie('IDUSR', $id_user, strtotime('+1 year'), '/');

            header('location: ../');
        } else {
            header('location: ../login.php?err=1');
        }
    } else{
        header('location: ../login.php?err=2');
    }
} else{
    header('location: ../login.php?err=3');
}
?>