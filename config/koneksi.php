<?php
session_start(); // Wajib ada untuk sistem login

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_ppdb";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>