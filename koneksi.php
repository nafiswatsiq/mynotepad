<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host = "localhost";
$user = "root";
$pass = "";
$db = "notepad";
$conn = new mysqli($host, $user, $pass, $db);

$API_KEY = "16|ftwUqOwyMsauoHQ7AwZ5Q0cju0yYUZH5uFmlrHYC";