<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'restoku_';

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die('koneksi terputus' . $koneksi->connect_error);
}
