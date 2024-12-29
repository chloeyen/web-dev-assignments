<?php
$host = "your_host";
$database = "your_database";
$user = "your_username";
$password = "your_password";

$connect = mysqli_connect($host, $user, $password, $database)
    or die(mysqli_error());
echo "<div style='color: green; font-size: 20px'>Connected to MySQL Database <b>$database</b></div>";
