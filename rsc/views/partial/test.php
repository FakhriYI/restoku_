<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

    <div class="w3-container">
        <h2>W3.CSS Login Modal</h2>
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>

        <?php include('test2.php') ?>
    </div>

</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pagination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<!-- asdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff -->

<body>

    <?php

    include('../../../database/koneksi.php');
    $get_data = "SELECT * FROM `makanan` ";
    $result1 = $koneksi->query($get_data);
    ?>

    <div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
        <h3>DataTabels dengan PHP dan Bootstrap</h3>
        <hr>

        <table class="table table-stripped table-hover datatab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $result1->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $data['id_makanan'] ?></td>
                        <td><?php echo $data['nama_makanan'] ?></td>
                        <td><?php echo $data['keterangan_makanan'] ?></td>
                        <td><?php echo $data['harga_makanan'] ?></td>
                        <!-- Button untuk modal -->
                        <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_makanan']; ?>">Edit</a>
                        </td>
                    </tr>
                    <!-- Modal Edit Mahasiswa-->
                    <div class="modal fade" id="myModal<?php echo $data['id_makanan']; ?>" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Data Mahasiswa</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="editmhs.php" method="get">

                                        <?php
                                        $id = $data['id_makanan'];
                                        $query_edit = "SELECT * FROM makanan WHERE id_makanan='$id'";
                                        $result11 = $koneksi->query($query_edit);

                                        while ($row = $result11->fetch_array()) {
                                        ?>

                                            <input type="hidden" name="id_mhs" value="">

                                            <div class="form-group">
                                                <label>Id Makanan</label>
                                                <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['id_makanan']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama makanan</label>
                                                <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['id_makanan']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Makanan</label>
                                                <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['id_makanan']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Harga Makanan</label>
                                                <input type="text" name="fakultas_mhs" class="form-control" value="<?php echo $row['fakultas']; ?>">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                        <?php
                                        }
                                        //mysql_close($host);
                                        ?>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('.datatab').DataTable();
    });
</script>

</html>