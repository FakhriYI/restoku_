<?php
include("koneksi.php");
session_start();

// $id_produk = $_POST["test"];

$pesanan = isset($_POST["pesanan"]) ? json_decode($_POST["pesanan"]) : null;
$data = [];

if ($pesanan) {
    $tanggal = date("Y-m-d");
    $insert_tmakanan = "INSERT INTO `transaksi` values ('',NULL, '$tanggal', 0)";
    $eks = $koneksi->query($insert_tmakanan);
    if ($eks) {
        $id_transaksi = $koneksi->insert_id;
        $total = 0;
        foreach ($pesanan as $pesan) {
            // echo json_encode($pesanan);
            if ($pesan->jenis_produk == 'makanan') {
                // echo json_encode("INSERT INTO `dtil_makanan` VALUES ('', '$pesan->id', $id_transaksi, $pesan->qty, $pesan->harga)");
                // die();
                // $query = "INSERT INTO produkMakan () VALUES (".$pesan->id.", '".$pesan->nama_produk."')";
                $query_makanan = "INSERT INTO `dtil_makanan` VALUES ('', '$pesan->id', $id_transaksi, $pesan->qty, $pesan->harga)";
                $koneksi->query($query_makanan);
            } else {
                $query_minuman = "INSERT INTO `dtil_minuman` VALUES ('', '$pesan->id', $id_transaksi, $pesan->qty, $pesan->harga)";
                $koneksi->query($query_minuman);
            }
            $total += $pesan->qty * $pesan->harga;
        }
    }
}




// $query_input = "INSERT INTO `minuman` 
// VALUES ('$kode_item','$nama_minuman','$ket_minuman', '$harga_minuman', '$nama_gambar','$status')";
// $result = $koneksi->query($query_input);
// echo $pesanan;
// if ($pesanan) {
//     // echo json_encode($pesanan);
//     // foreach ($pesanan as $pesan) {
//     //     if ($pesan->jenis_produk == 'makanan') {
//     //         // $query = "INSERT INTO produkMakan () VALUES (".$pesan->id.", '".$pesan->nama_produk."')";
//     //         $query_makanan = "insert into `dtil` set ()"
//     //     } else {
//     //     }
//     //     // $data[$pesan->id] = $pesan->jenis_produk;
//     //     // echo json_encode($pesan);
//     // }
// }

// echo json_decode("123");
// echo json_encode($data);

echo json_encode($pesanan);
