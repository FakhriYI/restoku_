<?php

include('koneksi.php');

$get_id_hapus = $_GET['id-minuman'];

$query_hapus = "DELETE FROM `minuman` WHERE id_minuman = '$get_id_hapus'";
$result = $koneksi->query($query_hapus);
// $datanya = $result->fetch_array();
echo "
    <script>
        alert('Data Berhasil di Hapus')
        window.location = '../rsc/views/layout/admin.php?page=minuman'
    </script>
";
