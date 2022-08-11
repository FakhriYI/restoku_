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
                            <a href="#" type="button " onclick="document.getElementById('modal-edit-makanan<?php echo $data1['id_makanan']; ?>').style.display='flex'" data-toggle="modal" data-target="modal-edit-makanan<?php echo $data1['id_makanan']; ?>">Edit</a>
                            <a href="../../../database/delete.php?id-makanan=<?php echo $data1['id_makanan']  ?>">Hapus</a>

                        </td>
                    </tr>
                    <!-- modal edit -->

                    <div class=" modal w3-modal modal-edit-mkn" id="modal-edit-makanan<?php echo $data1['id_makanan']; ?>">

                        <?php include("form_edit_makanan.php") ?>
                    </div>
                <?php endwhile;

                ?>

            </tbody>
        </table>


    </div>
</div>