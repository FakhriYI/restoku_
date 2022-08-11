<?php

include('koneksi.php');

$id_edit = $_POST['idmakanan'];
$nama_makanan = $_POST['txtmakanan'];
$ket_makanan = $_POST['txt_ket_makanan'];
$harga_makanan = $_POST['txt_harga_makanan'];
$data_gambar = $_FILES['gambar_makanan']['name'];
$data_ukuran = $_FILES['gambar_makanan']['size'];
$data_error = $_FILES['gambar_makanan']['error'];
$data_tmp = $_FILES['gambar_makanan']['tmp_name'];
$type_file = ['jpg', 'jpeg', 'png'];


$ekstension_file = strtolower(pathinfo($data_gambar, PATHINFO_EXTENSION));
$nama_file = pathinfo($data_gambar, PATHINFO_FILENAME);


if ($data_error == 0) {
    $nama_gambar = $nama_file . '.' . $ekstension_file;

    move_uploaded_file($data_tmp, '../rsc/img/' . $nama_gambar);

    $query_gambar_update = "UPDATE `makanan` set img_makanan = '$nama_gambar' where id_makanan = '$id_edit' ";
    $eksek = $koneksi->query($query_gambar_update);
}

$update_data = "UPDATE `makanan` SET nama_makanan = '$nama_makanan', keterangan_makanan = '$ket_makanan', harga_makanan = '$harga_makanan' where id_makanan = '$id_edit'";
$result = $koneksi->query($update_data);
echo "<script>
alert('berhasil')
window.location = '../rsc/views/layout/admin.php?page=makanan'
</script>";
