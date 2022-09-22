<?php
require('writeHtml.php');
require_once '../koneksi.php';

$id_note = $_GET['note'];
    $result = mysqli_query($conn, "SELECT * FROM data_note WHERE id_note = '$id_note'");
    // enkripsi
    $method="AES-128-CTR";
    $key ="hanyaadmin";
    $option=0;
    $iv="1251632135716362";

    $cek = mysqli_num_rows($result);
        foreach( $result as $data ) :
            if($data['public'] == 1){
                $encrypt = $data['encrypt'];
                if($encrypt == 1){
                    $content = openssl_decrypt($data['content'], $method, $key, $option, $iv);
                }else{
                    $content = $data['content'];
                };
            
                $title = $data['title'];
                $id_user = $data['id_user'];
                $is_public = "yes";
    
                $get_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
                foreach( $get_user as $data_user):
                    $usr_name = $data_user['nama'];
                endforeach;
            }else{
                $content = 'Content Private';
                $title = 'Title Private';
                $usr_name = 'Anonymous';
                $is_public = "no";
            }
        endforeach;

        $pdf=new PDF_HTML();
        $pdf->SetFont('Arial','',12);
        $pdf->AddPage();
        $pdf->WriteHTML($content);
        $pdf->Output();
        // header('Content-Disposition: attachment; filename="'.$title.'.pdf"');
        exit;
?>