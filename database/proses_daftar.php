<?php
include('koneksi.php');

$id_peg = $_POST['id_peg'];
$nama = $_POST['nama_user'];
$telp = $_POST['nomor_telpon'];
// $tgl_lahir = $_POST['tgl_lahir'];
$username = $_POST['username'];
$password = $_POST['password'];

// var_dump($_POST);
// die();

$query_daftar = "INSERT INTO `pegawai` values ('$id_peg','$username','$password','$nama','$telp')";
$result = $koneksi->query($query_daftar);



if ($result->num_rows > 0) {
    $data = $result->fetch_array();
    session_start();

    $_SESSION['resto']['username'] = $data['username'];
    $_SESSION['resto']['idpeg'] = $data['idpeg'];
    $_SESSION['resto']['nama'] = $data['nama'];

    $koneksi->query("UPDATE `pegawai` SET last_login = NOW() WHERE id = '$data[idpeg]' ");
    // var_dump($username, $password);
    header("location:../rsc/views/layout/admin.php");
    // echo "masuk";
} else {
    header('location:../rsc/views/layout/login.php');
}
