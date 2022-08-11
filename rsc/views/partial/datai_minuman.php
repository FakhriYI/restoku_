<?php
include('../../../database/koneksi.php');

$get_minuman = "SELECT * FROM  `minuman`";
$ekse = $koneksi->query($get_minuman);


?>
<h2>Minuman</h2>
<div class="scroll-item">
    <?php

    while ($data_minuman = $ekse->fetch_array()) :

    ?>
        <div class="card-item">
            <div class="img-ikon">
                <!-- <img src="../../img/fork.png" alt=""> -->
                <?php echo "<img src='../../img/$data_minuman[img_minuman]' >"; ?>

            </div>
            <br>
            <h4><?php echo $data_minuman['nama_minuman']; ?></h4>
            <p><?php echo $data_minuman['keterangan_minuman']; ?></p>
            <h4><?php echo $data_minuman['harga_minuman']; ?></h4>
            <button onclick="loadlist('<?php echo $data_minuman['id_minuman']; ?>','<?php echo $data_minuman['nama_minuman']; ?>', '<?php echo $data_minuman['harga_minuman']; ?>', 'minuman' )" id="tambah_list">Tambah</button>
        </div>
    <?php endwhile; ?>
</div>