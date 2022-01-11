<?php
// mengaktifkan session php
session_start();
require_once '../koneksi.php';
$id_user = $_SESSION['id_user'];

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query_cari_note = mysqli_query($conn, "SELECT * FROM data_note WHERE title  LIKE '%".$cari."%' AND id_user='$id_user' ORDER BY id DESC");
    $cek = mysqli_num_rows($query_cari_note);
    //kalau ini melakukan foreach atau perulangan
    if($cek > 0){
        while ($data = mysqli_fetch_assoc($query_cari_note)) {
        ?>
        <a href="./?note=<?= $data['id_note'] ?>" class="col-12 text-decoration-none color-white mb-2 ">
            <div id="<?= $data['id_note'] ?>" class="list-title mb-2 ">
                <span><?= $data['title'] ?></span>
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </div>
        </a>
        <?php
    }} else{
        echo "Tidak ditemukan";
    }
}else{
    $query_note = mysqli_query($conn, "SELECT * FROM data_note WHERE id_user='$id_user' ORDER BY id DESC");
    //kalau ini melakukan foreach atau perulangan
    while ($row = mysqli_fetch_assoc($query_note)) {
?>
<a href="./?note=<?= $row['id_note'] ?>" class="col-12 text-decoration-none color-white mb-2 ">
    <div id="<?= $row['id_note'] ?>" class="list-title mb-2 ">
        <span><?= $row['title'] ?></span>
        <lottie-player src="img/file.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;" hover></lottie-player>
    </div>
</a>
<?php
}};
?>