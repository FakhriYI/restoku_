<?php
include('koneksi.php');

$kode_item = $_POST['idminuman'];
$nama_minuman = $_POST['txtminuman'];
$ket_minuman = $_POST['txt_ket_minuman'];
$harga_minuman = $_POST['txt_harga_minuman'];

// $generate_string = sha1(rand());
$data_gambar = $_FILES['gambar_minuman']['name'];

$data_ukuran = $_FILES['gambar_minuman']['size'];
$data_error = $_FILES['gambar_minuman']['error'];
$data_tmp = $_FILES['gambar_minuman']['tmp_name'];
$status = 0;


$type_file = ['jpg', 'jpeg', 'png'];


$ekstension_file = strtolower(pathinfo($data_gambar, PATHINFO_EXTENSION));
$nama_file = pathinfo($data_gambar, PATHINFO_FILENAME);

if (

    $data_error === 0
) {

    if (in_array($ekstension_file, $type_file)) {
        if ($data_ukuran < 2000000) {
            // $nama_gambar = $nama_file . $generate_string . '.' . $ekstension_file;
            $nama_gambar = $nama_file . '.' . $ekstension_file;

            move_uploaded_file($data_tmp, '../rsc/img/' . $nama_gambar);

            $query_input = "INSERT INTO `minuman` 
                VALUES ('$kode_item','$nama_minuman','$ket_minuman', '$harga_minuman', '$nama_gambar','$status')";
            $result = $koneksi->query($query_input);


            echo "<script>
                alert('Data Berhasil diSimpan')
                window.location = '../rsc/views/layout/admin.php?page=minuman'
                </script>";
        } else {
            echo "<script>
                alert('Ukuran File Terlalu Besar!')
                window.location = '../rsc/views/layout/admin.php?page=minuman'
                </script>";
        }
    } else {
        echo "<script>
            alert('Harap Upload Foto Ekstensi PNG JPG dan JPEG')
            window.location = '../rsc/views/layout/admin.php?page=minuman'
            </script>";
    }
} else {
    echo "<script>
        alert('Harap Pilih Foto')
        window.location = '../rsc/views/layout/admin.php?page=minuman'
        
        </script>";
}
