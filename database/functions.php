<?php

function tambahmakanan($data)
{
    $kode_item = $_POST['idmakanan'];
    $nama_makanan = $_POST['txtmakanan'];
    $ket_makanan = $_POST['txt_ket_makanan'];
    $harga_makanan = $_POST['txt_harga_makanan'];
    $data_gambar = $_FILES['gambar_makanan']['name'];
    $data_ukuran = $_FILES['gambar_makanan']['size'];
    $data_error = $_FILES['gambar_makanan']['error'];
    $data_tmp = $_FILES['gambar_makanan']['tmp_name'];

    $type_file = ['jpg', 'jpeg', 'png'];
    $ekstension_file = explode('.', $data_gambar);
    $ekstension_file = strtolower(end($ekstension_file));


    if (

        $data_error === 0
    ) {

        if (in_array($ekstension_file, $type_file)) {
            if ($data_ukuran < 2000000) {
                move_uploaded_file($data_tmp, '../rsc/img/' . $data_gambar);

                $query_input = "INSERT INTO `makanan` 
           
                VALUES ('$kode_item','$nama_makanan','$ket_makanan', '$harga_makanan', '$data_gambar')";
                $result = $koneksi->query($query_input);

                echo "<script>
                alert('Data Berhasil diSimpan');
                </script>";
                header('location:../rsc/views/layout/admin.php');
            }
        } else {
            echo "<script>
        alert('Harap Upload Foto Ekstensi PNG JPG dan JPEG')
        </script>";
            header('location:../rsc/views/layout/admin.php');
            return false;
        }
    } else {
        echo "<script>
    alert('Harap Pilih Foto')
    </script>";
        header('location:../rsc/views/layout/admin.php');
        return false;
    }
};
