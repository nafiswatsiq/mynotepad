<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host = "localhost";
$user = "root";
$pass = "";
$db = "notepad";
$conn = new mysqli($host, $user, $pass, $db);
?>