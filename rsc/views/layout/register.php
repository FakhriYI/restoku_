<?php
include('../../../database/koneksi.php');
session_start();

if (isset($_SESSION['resto']['username'])) {
    header("location:index.php");
    exit();
}

$query_idpeg = "SELECT MAX(id_pegawai) as id_peg_ from `pegawai`";
$result = $koneksi->query($query_idpeg);

$data = $result->fetch_array();
$kode_peg = $data['id_peg_'];
$kode_urut_peg = (int) substr($kode_peg, 3, 3);
$kode_urut_peg++;
$kode_huruf = "peg";
$kode_peg = $kode_huruf . sprintf("%03s", $kode_urut_peg);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Register Akun</title>
</head>

<body>
    <form class="modal-content animate" action="../../../database/proses_daftar.php" method="post">

        <div class="imgcontainer">
            <img src="../../icon/ava.png" alt="Avatar" class="avatar">
            <h1>Daftar Akun</h1>
        </div>


        <div class="container">

            <input type="text" name="id_peg" value="<?php echo $kode_peg ?>" readonly>

            <label for="uname"><b>Nama</b></label>
            <input type="text" placeholder="Nama Anda" name="nama_user" required>

            <label for="uname"><b>Nomor Telpon</b></label>
            <input type="text" placeholder="Nomor Telpon" name="nomor_telpon" required>
            <br>
            <!-- <label for="uname"><b> Tanggal Lahir</b></label><br>
            <br>
            <input type="date" placeholder="Nomor Telpon" name="tgl_lahir" required>
            <br> -->
            <br>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>


        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="submit">Daftar</button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <!-- <span class="psw">Belum Punya akun ? klik <a href="register.php">di sini</a> untuk daftar akun</span> -->
        </div>
    </form>

</body>

</html>