<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

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
$new_id_note = generate_string($permitted_chars, 7);

// enkripsi
$method="AES-128-CTR";
$key ="hanyaadmin";
$option=0;
$iv="1251632135716362";
// end

if($_POST['title'] == ""){

}else{
    $id_note = $_POST['idNote'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $encrypt = $_POST['encrypt'];
    if($id_note == ""){
        if($encrypt == 1){
            $enkripsi_content=openssl_encrypt($content, $method, $key, $option, $iv);
            $new_note = mysqli_query($conn, "INSERT INTO `data_note`(`id`,`id_note`, `id_user`, `title`, `content`, `encrypt`) VALUES ('','$new_id_note','$id_user','$title','$enkripsi_content','$encrypt')");
        }else{
            $new_note = mysqli_query($conn, "INSERT INTO `data_note`(`id`,`id_note`, `id_user`, `title`, `content`, `encrypt`) VALUES ('','$new_id_note','$id_user','$title','$content','$encrypt')");
        }
    }else{
        if($encrypt == 1){
            $enkripsi_content=openssl_encrypt($content, $method, $key, $option, $iv);
            $save_note = mysqli_query($conn, "UPDATE `data_note` SET `title`='$title',`content`='$enkripsi_content',`encrypt`='$encrypt' WHERE id_note='$id_note' AND id_user='$id_user'");
        }else{
            $save_note = mysqli_query($conn, "UPDATE `data_note` SET `title`='$title',`content`='$content',`encrypt`='$encrypt' WHERE id_note='$id_note' AND id_user='$id_user'");
        }
    }
};
?>