<?php
session_start();

if (!isset($_SESSION['resto']['username'])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">


    <title>admin</title>
</head>

<body>


    <?php include('../partial/admin_navigasi.php') ?>


    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'makanan':
                include "../partial/data_makanan.php";
                break;
            case 'minuman':
                include "../partial/data_minuman.php";
                break;
                // case 'snack':
                //     include "../partial/data_snack.php";
                //     break;

            default:
                # code...
                break;
        }
    } else {
        include "../partial/dashboard.php";
    }

    ?>

</body>

</html>