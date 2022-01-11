<?php 
session_start();
session_unset();
session_destroy();

setcookie('IDUSR', '', strtotime(''), '/');
header('location: ../login.php?m=1');
?>