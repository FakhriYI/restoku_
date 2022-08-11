<?php
if (isset($_POST['submit'])) {
    header('location:../../../database/edit_makanan.php');
}

?>

<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <form class="w3-container" role="form" action="../../../database/edit_makanan.php" method="post" enctype="multipart/form-data">
        <?php
        $id_editnya = $data1['id_makanan'];
        // var_dump($data1);
        $edit_query = "SELECT * FROM `makanan` WHERE id_makanan = '$id_editnya'";
        $result_edit = $koneksi->query($edit_query);
        while ($data_editnya = $result_edit->fetch_array()) :
            // var_dump($data_editnya);
        ?>
            <div class="w3-section modal-edit-makanan" id="modal-edit-makanan">

                <h1>Form Edit</h1>
                <label for="idnya">ID Makanan</label>
                <input type="text" name="idmakanan" id="idmakanan" value="<?php echo $data_editnya['id_makanan'] ?>" readonly>
                <label for="makanan">Nama Makanan</label>
                <input type="text" name="txtmakanan" value="<?php echo $data_editnya['nama_makanan'] ?>" id="txtmakanan_" required>
                <label for="keterangan_makanan">Keterangan Makanan</label>
                <input type="text" name="txt_ket_makanan" id="txt_ket_makanan" value="<?php echo $data_editnya['keterangan_makanan'] ?>" required>
                <label for="harga_makanan">Harga Makanan</label>
                <input type="text" name="txt_harga_makanan" id="txt_harga_makanan" value="<?php echo $data_editnya['harga_makanan'] ?>" onkeypress="return numberkey(event)" required>
                <label for="harga_makanan">Data Gambar</label>
                <br>
                <?php echo "<img src='../../img/$data_editnya[img_makanan]' width='70' height='70'>"; ?>
                <br>
                <br>
                <label for="gambar_makanan">Ubah Gambar Makanan</label>
                <br>
                <!-- pilih gambar -->
                <input type="file" src="gambar_makanan" name="gambar_makanan">


                <!-- <input type="submit" value="submit" class="submit" class="submit"> -->
                <button type="submit">update</button>
                <button onclick="document.getElementById('modal-edit-makanan<?php echo $data1['id_makanan']; ?>').style.display='none'" type="button" class="w3-button w3-red">Gagal</button>
            </div>
        <?php endwhile; ?>
    </form>
</div>