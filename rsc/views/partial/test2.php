<?php
include('../../../database/koneksi.php');


error_reporting(0);


$get_data = "SELECT * FROM `makanan` ";
$result1 = $koneksi->query($get_data);


?>
<div class="container-makanan">
    <div class="nav-makanan">
        <div class="form-group" style="margin-right: 500px;">
            <label for="cari-makanan"> Cari Makanan : </label>
            <input type="search" name="cari-makanan" id="">
        </div>
        <button id="tambah_makanan" style="width: 120px; border-radius: 30px" onclick="document.getElementById('modal-input-makanan').style.display='flex'">Tambah Data +</button>
        <div class="modal w3-modal modal-input-mkn" id="modal-input-makanan">
            <?php include('form_input_makanan.php') ?>
        </div>

    </div>

    <div class="body-data-makanan">
        <h1>Data Makanan</h1>
        <table class="table table-stripped table-hover datatab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Makanan</th>
                    <th>Nama Makanan</th>
                    <th>Keterangan Makanan</th>
                    <th>Harga Makanan</th>
                    <th>Display Makanan</th>
                    <th>Action Makanan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data1 = $result1->fetch_array()) :
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data1['id_makanan'] ?></td>
                        <td><?php echo $data1['nama_makanan'] ?></td>
                        <td><?php echo $data1['keterangan_makanan'] ?></td>
                        <td><?php echo $data1['harga_makanan'] ?></td>
                        <td>
                            <?php echo "<img src='../../img/$data1[img_makanan]' width='70' height='70'>"; ?>
                        </td>

                        <td>
                            <a href="#" type="button" onclick="document.getElementById('modal-edit-makanan').style.display='flex'" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-edit-makanan<?php echo $data1['id_makanan']; ?>">Edit</a>
                            <a href="hapus.php">Hapus</a>
                        </td>
                    </tr>
                    <!-- modal edit -->

                    <div class="modal w3-modal modal-input-mkn" id="modal-edit-makanan<?php echo $data1['id_makanan'] ?>">

                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <form class="w3-container" role="form" action="../../../database/edit_makanan.php" method="get" enctype="multipart/form-data">
                                <?php
                                $id_editnya = $data1['id_makanan'];
                                // var_dump($data1);
                                $edit_query = "SELECT * FROM `makanan` WHERE id_makanan = '$id_editnya'";
                                $result_edit = $koneksi->query($edit_query);
                                while ($data_editnya = $result_edit->fetch_array()) :
                                    // var_dump($data_editnya);
                                ?>
                                    <div class="w3-section modal-edit-makanan">

                                        <h1>Form Edit</h1>
                                        <label for="idnya">ID Makanan</label>
                                        <input type="text" name="idmakanan" id="idmakanan" value="<?php echo $data_editnya['id_makanan'] ?>" readonly>
                                        <label for="makanan">Nama Makanan</label>
                                        <input type="text" name="txtmakanan" id="txtmakanan_" required>
                                        <label for="keterangan_makanan">Keterangan Makanan</label>
                                        <input type="text" name="txt_ket_makanan" id="txt_ket_makanan" required>
                                        <label for="harga_makanan">Harga Makanan</label>
                                        <input type="text" name="txt_harga_makanan" id="txt_harga_makanan" onkeypress="return numberkey(event)" required>
                                        <label for="gambar_makanan">Tambah Gambar Makanan</label>

                                        <!-- pilih gambar -->
                                        <input type="file" src="gambar_makanan" name="gambar_makanan">

                                        <!-- <input type="submit" value="submit" class="submit" class="submit"> -->
                                        <button type="submit">update</button>
                                        <button onclick="document.getElementById('modal-edit-makanan').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                    </div>
                                <?php endwhile; ?>
                            </form>
                        </div>
                    </div>
                <?php endwhile;

                ?>

            </tbody>
        </table>


    </div>
</div>