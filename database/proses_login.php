<?php
include('koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query_login = "SELECT * FROM `pegawai` 
            WHERE username = '$username' AND password = '$password'";

$result = $koneksi->query($query_login);



if ($result->num_rows > 0) {
    $data = $result->fetch_array();
    session_start();

    $_SESSION['resto']['username'] = $data['username'];
    $_SESSION['resto']['idpeg'] = $data['idpeg'];
    $_SESSION['resto']['nama'] = $data['nama'];

    // $koneksi->query("UPDATE `pegawai` SET last_login = NOW() WHERE id = '$data[idpeg]' ");
    // var_dump($username, $password);
    header("location:../rsc/views/layout/admin.php");
    // echo "masuk";
} else {
    header('location:../rsc/views/layout/login.php');
}
