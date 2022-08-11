<?php
session_start();

if (isset($_SESSION['resto']['username'])) {
    header("location:index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Login Admin</title>
</head>

<body>
    <form class="modal-content animate" action="../../../database/proses_login.php" style="padding: 10px;" method="post">

        <div class="imgcontainer">
            <img src="../../icon/ava.png" alt="Avatar" class="avatar">
        </div>


        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Belum Punya akun ? klik <a href="register.php">di sini</a> untuk daftar akun</span>
        </div>
    </form>

</body>

</html>