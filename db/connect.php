<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'logindata';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fail connection". $conn->connect_error);
}

?>