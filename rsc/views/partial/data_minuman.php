<?php
include('../../../database/koneksi.php');


error_reporting(0);


$get_data = "SELECT * FROM `minuman` ";
$result1 = $koneksi->query($get_data);


?>
<div class="container-makanan">
    <div class="nav-makanan">
        <div class="form-group" style="margin-right: 500px;">
            <label for="cari-minuman"> Cari minuman : </label>
            <input type="search" name="cari-minuman" id="">
        </div>
        <button id="tambah_minuman" style="width: 120px; border-radius: 30px" onclick="document.getElementById('modal-input-minuman').style.display='flex'">Tambah Data +</button>
        <div class="modal w3-modal modal-input-mkn" id="modal-input-minuman">
            <?php include('form_input_minuman.php') ?>
        </div>

    </div>

    <div class="body-data-minuman">
        <h1>Data minuman</h1>
        <table class="table table-stripped table-hover datatab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode minuman</th>
                    <th>Nama minuman</th>
                    <th>Keterangan minuman</th>
                    <th>Harga minuman</th>
                    <th>Display minuman</th>
                    <th>Action minuman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data1 = $result1->fetch_array()) :
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data1['id_minuman'] ?></td>
                        <td><?php echo $data1['nama_minuman'] ?></td>
                        <td><?php echo $data1['keterangan_minuman'] ?></td>
                        <td><?php echo $data1['harga_minuman'] ?></td>
                        <td>
                            <?php echo "<img src='../../img/$data1[img_minuman]' width='70' height='70'>"; ?>
                        </td>

                        <td>
                            <a href="#" type="button " onclick="document.getElementById('modal-edit-minuman<?php echo $data1['id_minuman'] ?>').style.display='flex'" data-toggle="modal" data-target="#modal-edit-minuman<?php echo $data1['id_minuman']; ?>">Edit</a>
                            <a href="../../../database/delete_minuman.php?id-minuman=<?php echo $data1['id_minuman']  ?>">Hapus</a>

                        </td>
                    </tr>
                    <!-- modal edit -->

                    <div class="modal w3-modal modal-input-mkn" id="modal-edit-minuman<?php echo $data1['id_minuman'] ?>">

                        <?php include("form_edit_minuman.php") ?>
                    </div>
                <?php endwhile;

                ?>

            </tbody>
        </table>


    </div>
</div>