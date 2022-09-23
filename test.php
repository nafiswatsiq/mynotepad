<?php

// $headers = [
//   'accept: application/json',
//   'Authorization: Bearer 14|OJBpDaVcZTIoggtiIH5LO2epc4Ir1UGlz9UOqyVR'
// ];

// $ch = curl_init("https://owlengine.com/api/text/translate?content=yakin%20ga%20mau%20makan%20nasi%20sambil%20salto%20di%20sawah&language_from=id&language_to=en");

// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);

// $response = curl_exec($ch);

// curl_close($ch);

// $data = json_decode($response);
// var_dump($data);


  $curl = curl_init();
  // OPTIONS:
  $url = "https://owlengine.com/api/text/translate?content=yakin%20ga%20mau%20makan%20nasi%20sambil%20salto%20di%20sawah&language_from=id&language_to=en";
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'Authorization: Bearer 14|OJBpDaVcZTIoggtiIH5LO2epc4Ir1UGlz9UOqyVR',
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