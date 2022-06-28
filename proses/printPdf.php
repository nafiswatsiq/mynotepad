<?php
require('../assets/vendors/fpdf184/fpdf.php');
require_once '../koneksi.php';

$id_note = $_GET['note'];
// if(isset($id_note)){
    $result = mysqli_query($conn, "SELECT * FROM data_note WHERE id_note = '$id_note'");
    // enkripsi
    $method="AES-128-CTR";
    $key ="hanyaadmin";
    $option=0;
    $iv="1251632135716362";

    $cek = mysqli_num_rows($result);
    // if($cek > 0){
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
    // }else{
    //     header('location: ../404');
    // }
// }else{
//     header('location: ../404');
// }

class PDF extends FPDF
{
// Page header
function Header()
{
    global $title;
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(-1);
    // Framed title
    $this->Cell(30,10,$title,0,0,'L');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)

$pdf->Cell(0,10, htmlspecialchars_decode($content, ENT_QUOTES));

$pdf->Output();
header('Content-Disposition: attachment; filename="'.$title.'.pdf"');
// header('location: '.$_SERVER['PHP_SELF']);
?>