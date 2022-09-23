<?php
  include '../koneksi.php';
  $content = $_POST['content'];
  // $content = "Cita cita dan tujuan bangsa Indonesia tercantum dalam UUD NRI 1945 Alinea ke empat yaitu melindungi segenap bangsa Indonesia dan seluruh tumpah darah Indonesia dan untuk memajukan kesejahteraan umum, mencerdaskan kehidupan bangsa dan ikut melaksanakan ketertiban dunia yang berdasarkan kemerdekaan, perdamaian abadi dan keadilan sosial. Di alinea tersebut juga terdapat nilai dasar Bangsa Indonesia atau yang disebut Pancasila.";
  $content = str_replace(' ', '%20', $content);

  $curl = curl_init();
  // OPTIONS:
  $url = "https://owlengine.com/api/text/paraphrase?content=".$content."&language=id";
  
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'Authorization: Bearer '. $API_KEY,
     'accept: application/json',
  ));

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  // EXECUTE:
  $result = curl_exec($curl);

  if(!$result){
    die("Connection Failure");
  }

  curl_close($curl);

  $data = json_decode($result, true);

  echo json_encode($data["data"]['paraphrased'], true);