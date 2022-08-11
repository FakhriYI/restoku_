<?php
include "../../../database/koneksi.php";
$query_transaksi = "SELECT * FROM `transaksi` ";
$result = $koneksi->query($query_transaksi);

?>
<div class="body-dashboard">
    <h1>Halo Admin</h1>

    <div class="dashboard-transaksi">
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">ID Transaksi</th>
                    <th style="text-align: center;">Nama Pesanan</th>
                    <th style="text-align: center;">Total Harga</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $result->fetch_array()) :
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td style="text-align: center;"><?php echo $data['id_trans'] ?></td>
                        <td style="text-align: center;"><?php echo $data['nama_pesanan'] ?></td>
                        <td style="text-align: center;"><?php echo $data['total_harga'] ?></td>
                        <td style="text-align: center;">
                            <?php

                            if ($data['status_bayar'] == 0) {
                                echo "<button style='width: 100px;'><a href='proses_bayar.php'>Proses</a></button>";
                            }
                            if ($data['status_bayar'] == 1) {
                                echo "<button style='width: 100px;'>Selesai</button>";
                            }
                            ?> | <button style="width: 100px;">Detail Pesanan</button>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>