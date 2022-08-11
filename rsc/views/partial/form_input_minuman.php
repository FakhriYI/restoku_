<?php
include('../../../database/koneksi.php');


if (isset($_POST['submit'])) {
    header('location:../../../database/input_minuman.php');
}

$get_id_minuman = "SELECT MAX(id_minuman) as id_minuman_ FROM `minuman`";

$result = $koneksi->query($get_id_minuman);
$data = $result->fetch_array();

$kode_item_minuman =  $data['id_minuman_'];
$kode_urut = (int) substr($kode_item_minuman, 2, 3);
$kode_urut++;
$kode_item = "MN";
$new_kode_barang = $kode_item . sprintf("%03s", $kode_urut);


?>

<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">


    <form class="w3-container" action="../../../database/input_minuman.php" method="post" enctype="multipart/form-data">
        <div class="w3-section modal-input-minuman">

            <label for="idnya">ID minuman</label>
            <input type="text" name="idminuman" id="idminuman" value="<?php echo $new_kode_barang ?>" readonly>
            <label for="minuman">Nama Minuman</label>
            <input type="text" name="txtminuman" id="txtminuman" required>
            <label for="keterangan_minuman">Keterangan Minuman</label>
            <input type="text" name="txt_ket_minuman" id="txt_ket_minuman" required>
            <label for="harga_minuman">Harga Minuman</label>
            <input type="text" name="txt_harga_minuman" id="txt_harga_minuman" onkeypress="return numberkey(event)" required>
            <label for="gambar_minuman">Tambah Gambar Minuman</label>

            <!-- pilih gambar -->
            <input type="file" src="gambar_minuman" name="gambar_minuman">

            <!-- <input type="submit" value="submit" class="submit" class="submit"> -->
            <button type="submit">submit</button>
            <button onclick="document.getElementById('modal-input-minuman').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>


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