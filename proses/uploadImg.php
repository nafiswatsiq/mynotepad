<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
if( $_FILES['file']['size'] >= 1000000){
   echo "larger";
}elseif ($_FILES['file']['name']) {
   if (!$_FILES['file']['error']) {
      $name = md5(rand(100, 200));
      $ext = explode('.', $_FILES['file']['name']);
      $filename = $name . '.' . $ext[1];
      $destination = '../assets/images/' . $filename; //change this directory
      $location = $_FILES["file"]["tmp_name"];
      move_uploaded_file($location, $destination);

      echo $url.'notepad/assets/images/' . $filename;//change this URL

   } else {
      echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
   }
}else{
   header('location: ../404');
}