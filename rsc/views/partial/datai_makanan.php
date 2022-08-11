<?php
include('../../../database/koneksi.php');

$get_makanan = "SELECT * FROM  `makanan`";
$ekse = $koneksi->query($get_makanan);


?>

<h2>Makanan</h2>
<div class="scroll-item">

    <?php
    while ($data = $ekse->fetch_array()) :

    ?>
        <div class="card-item">
            <div class="img-ikon">
                <!-- <img src="../../img/fork.png" alt=""> -->
                <?php echo "<img src='../../img/$data[img_makanan]' >"; ?>

            </div>
            <br>
            <h4><?php echo $data['nama_makanan']; ?></h4>
            <p><?php echo $data['keterangan_makanan']; ?></p>
            <h4><?php echo $data['harga_makanan']; ?></h4>
            <button onclick="loadlist('<?php echo $data['id_makanan']; ?>', '<?php echo $data['nama_makanan']; ?>', '<?php echo $data['harga_makanan']; ?>',  'makanan' )" id="tambah_list">Tambah</button>
        </div>
    <?php endwhile; ?>
</div>