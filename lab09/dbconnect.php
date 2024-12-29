<?php
$host = "localhost";
$database = "h9ngo";
$user = "h9ngo";
$password = "XW4UNNeg";

$connect = mysqli_connect($host, $user, $password, $database) 
or die(mysqli_error());
echo "<div style='color: green; font-size: 20px'>Connected to MySQL Database <b>$database</b></div>";
?>
