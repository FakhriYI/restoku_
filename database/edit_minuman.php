<?php

include('koneksi.php');

$id_edit = $_POST['idminuman'];
$nama_minuman = $_POST['txtminuman'];
$ket_minuman = $_POST['txt_ket_minuman'];
$harga_minuman = $_POST['txt_harga_minuman'];
$data_gambar = $_FILES['gambar_minuman']['name'];
$data_ukuran = $_FILES['gambar_minuman']['size'];
$data_error = $_FILES['gambar_minuman']['error'];
$data_tmp = $_FILES['gambar_minuman']['tmp_name'];
$type_file = ['jpg', 'jpeg', 'png'];

$ekstension_file = strtolower(pathinfo($data_gambar, PATHINFO_EXTENSION));
$nama_file = pathinfo($data_gambar, PATHINFO_FILENAME);

// var_dump(isset($_FILES['gambar_minuman']['name']));
// die();

// if (isset($_FILES['gambar_minuman']['name'])) {
//     $nama_gambar = $nama_file . '.' . $ekstension_file;

//     move_uploaded_file($data_tmp, '../rsc/img/' . $nama_gambar);

//     $query_gambar_update = "UPDATE `minuman` set img_minuman = '$nama_gambar' where id_minuman = '$id_edit' ";
//     $eksek = $koneksi->query($query_gambar_update);
// }
if ($data_error == 0) {
    $nama_gambar = $nama_file . '.' . $ekstension_file;

    move_uploaded_file($data_tmp, '../rsc/img/' . $nama_gambar);

    $query_gambar_update = "UPDATE `minuman` set img_minuman = '$nama_gambar' where id_minuman = '$id_edit' ";
    $eksek = $koneksi->query($query_gambar_update);
}

$update_data = "UPDATE `minuman` SET nama_minuman = '$nama_minuman', keterangan_minuman = '$ket_minuman', harga_minuman = '$harga_minuman' where id_minuman = '$id_edit'";
$result = $koneksi->query($update_data);
echo "<script>
alert('berhasil')
window.location = '../rsc/views/layout/admin.php?page=minuman'
</script>";
