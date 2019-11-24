<?php

$servername = "10.14.76.151";
$username = "root";
$password = "";
$dbname = "bitbook"

$conn = new mysqli($servername, $username, $password, $dbname);

if(! $conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

?>