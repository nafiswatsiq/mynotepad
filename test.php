<?php
  include 'koneksi.php';
  $curl = curl_init();
  // OPTIONS:
  $url = "https://owlengine.com/api/text/translate?content=yakin%20ga%20mau%20makan%20nasi%20sambil%20salto%20di%20sawah&language_from=id&language_to=en";
  
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

echo $data["data"]["translated"];
// foreach ($data["data"] as $item) {
//   // echo $item["translated"];
// }