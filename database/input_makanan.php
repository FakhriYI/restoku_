<?php
include('koneksi.php');

$kode_item = $_POST['idmakanan'];
$nama_makanan = $_POST['txtmakanan'];
$ket_makanan = $_POST['txt_ket_makanan'];
$harga_makanan = $_POST['txt_harga_makanan'];

// $generate_string = sha1(rand());
$data_gambar = $_FILES['gambar_makanan']['name'];
// var_dump($_FILES);
// die();

$data_ukuran = $_FILES['gambar_makanan']['size'];
$data_error = $_FILES['gambar_makanan']['error'];
$data_tmp = $_FILES['gambar_makanan']['tmp_name'];



$type_file = ['jpg', 'jpeg', 'png'];

$status = 0;
$ekstension_file = strtolower(pathinfo($data_gambar, PATHINFO_EXTENSION));
// var_dump($_POST);
// var_dump($_FILES);
// die();
$nama_file = pathinfo($data_gambar, PATHINFO_FILENAME);

if (

    $data_error === 0
) {

    if (in_array($ekstension_file, $type_file)) {
        if ($data_ukuran < 2000000) {
            // $nama_gambar = $nama_file . $generate_string . '.' . $ekstension_file;
            $nama_gambar = $nama_file . '.' . $ekstension_file;

            move_uploaded_file($data_tmp, '../rsc/img/' . $nama_gambar);

            $query_input = "INSERT INTO `makanan` 
                VALUES ('$kode_item','$nama_makanan','$ket_makanan', '$harga_makanan', '$nama_gambar','$status')";
            $result = $koneksi->query($query_input);

            echo "<script>
                alert('Wes Ditambah')
                window.location = '../rsc/views/layout/admin.php?page=makanan'
                </script>";
        } else {
            echo "<script>
                alert('Ukuran File Terlalu Besar!')
                window.location = '../rsc/views/layout/admin.php?page=makanan'
                </script>";
        }
    } else {
        echo "<script>
            alert('Harap Upload Foto Ekstensi PNG JPG dan JPEG')
            window.location = '../rsc/views/layout/admin.php?page=makanan'
            </script>";
    }
} else {
    echo "<script>
        alert('Harap Pilih Foto')
        window.location = '../rsc/views/layout/admin.php?page=makanan'
        
        </script>";
}
