<?php
include('../../../database/koneksi.php');


if (isset($_POST['submit'])) {
    header('location:../../../database/input_makanan.php');
}

$get_id_makanan = "SELECT MAX(id_makanan) as id_makanan_ FROM `makanan`";

$result = $koneksi->query($get_id_makanan);
$data = $result->fetch_array();

$kode_item_makanan =  $data['id_makanan_'];
$kode_urut = (int) substr($kode_item_makanan, 1, 4);
$kode_urut++;
$kode_item = "M";
$new_kode_barang = $kode_item . sprintf("%04s", $kode_urut);


?>

<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">


    <form class="w3-container" action="../../../database/input_makanan.php" method="post" enctype="multipart/form-data">
        <div class="w3-section modal-input-makanan">

            <label for="idnya">ID Makanan</label>
            <input type="text" name="idmakanan" id="idmakanan" value="<?php echo $new_kode_barang ?>" readonly>
            <label for="makanan">Nama Makanan</label>
            <input type="text" name="txtmakanan" id="txtmakanan" required>
            <label for="keterangan_makanan">Keterangan Makanan</label>
            <input type="text" name="txt_ket_makanan" id="txt_ket_makanan" required>
            <label for="harga_makanan">Harga Makanan</label>
            <input type="text" name="txt_harga_makanan" id="txt_harga_makanan" onkeypress="return numberkey(event)" required>
            <label for="gambar_makanan">Tambah Gambar Makanan</label>

            <!-- pilih gambar -->
            <input type="file" src="gambar_makanan" name="gambar_makanan">

            <!-- <input type="submit" value="submit" class="submit" class="submit"> -->
            <button type="submit">submit</button>
            <button onclick="document.getElementById('modal-input-makanan').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>


        </div>
    </form>



</div>
<script>
    function numberkey(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>