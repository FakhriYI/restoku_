<?php
if (isset($_POST['submit'])) {
    header('location:../../../database/edit_minuman.php');
}

?>

<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <form class="w3-container" role="form" action="../../../database/edit_minuman.php" method="post" enctype="multipart/form-data">
        <?php
        $id_editnya = $data1['id_minuman'];
        // var_dump($data1);
        $edit_query = "SELECT * FROM `minuman` WHERE id_minuman = '$id_editnya'";
        $result_edit = $koneksi->query($edit_query);
        while ($data_editnya = $result_edit->fetch_array()) :
            // var_dump($data_editnya);
        ?>
            <div class="w3-section modal-edit-minuman">

                <h1>Form Edit</h1>
                <label for="idnya">ID Minuman</label>
                <input type="text" name="idminuman" id="idminuman" value="<?php echo $data_editnya['id_minuman'] ?>" readonly>
                <label for="minuman">Nama Minuman</label>
                <input type="text" name="txtminuman" value="<?php echo $data_editnya['nama_minuman'] ?>" id="txtminuman_" required>
                <label for="keterangan_minuman">Keterangan Minuman</label>
                <input type="text" name="txt_ket_minuman" id="txt_ket_minuman" value="<?php echo $data_editnya['keterangan_minuman'] ?>" required>
                <label for="harga_minuman">Harga Minuman</label>
                <input type="text" name="txt_harga_minuman" id="txt_harga_minuman" value="<?php echo $data_editnya['harga_minuman'] ?>" onkeypress="return numberkey(event)" required>
                <label for="harga_minuman">Data Gambar</label>
                <br>
                <?php echo "<img src='../../img/$data_editnya[img_minuman]' width='70' height='70'>"; ?>
                <br>
                <br>
                <label for="gambar_minuman">Ubah Gambar minuman</label>
                <br>
                <!-- pilih gambar -->
                <input type="file" src="gambar_minuman" name="gambar_minuman">


                <!-- <input type="submit" value="submit" class="submit" class="submit"> -->
                <button type="submit">update</button>
                <button onclick="document.getElementById('modal-edit-minuman<?php echo $data1['id_minuman'] ?>').style.display='none'" type="button" class="w3-button w3-red">Gagal</button>
            </div>
        <?php endwhile; ?>
    </form>
</div>