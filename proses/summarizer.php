<?php
  include '../koneksi.php';
  $content = $_POST['content'];
  if (isset($content)){
    $content = str_replace('<p>', '', $content);
    $content = str_replace('</p>', '', $content);
    $content = str_replace('<br>', '', $content);
    $content = str_replace(' ', '%20', $content);
  
    $curl = curl_init();
    // OPTIONS:
    $url = "https://owlengine.com/api/text/summarize?content=".$content."&language=id";
    
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
  
    echo json_encode($data["data"]['summarized'], true);
  }else{
    header('location: ../404');
  }