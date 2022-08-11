<?php

include('koneksi.php');

$get_id_hapus = $_GET['id-makanan'];

$query_hapus = "DELETE FROM `makanan` WHERE id_makanan = '$get_id_hapus'";
$result = $koneksi->query($query_hapus);
// $datanya = $result->fetch_array();
echo "
    <script>
        alert('Data Berhasil di Hapus')
        window.location = '../rsc/views/layout/admin.php?page=makanan'
    </script>
";
