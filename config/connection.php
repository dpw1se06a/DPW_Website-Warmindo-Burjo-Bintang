<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'warmindo';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Error : " . $conn->connect_error);
}

