<?php
include('../../../database/koneksi.php');

$query_data = "SELECT * FROM makanan";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Resto Ku</title>
</head>

<body>

    <?php include("../partial/navbar.php") ?>

    <div class="container-body">
        <div class="container-konten">

            <?php
            if (isset($_GET['page'])) {
                $halaman = $_GET['page'];

                switch ($halaman) {
                    case 'index-makanan':
                        include "../partial/datai_makanan.php";
                        break;
                    case 'index-minuman':
                        include "../partial/datai_minuman.php";
                        break;

                    default:

                        break;
                }
            } else {
                // include "../partial/datai_rekom.php";
                include "../partial/datai_makanan.php";
            }

            ?>
        </div>
        <div class="container-pesan">
            <p style="width: 200px;">nama</p>
            <?php include("../partial/pesanan.php") ?>
        </div>

    </div>

</body>

<script>
    const getlist = document.getElementById('list-pesan')
    const hapuslist = document.getElementsByClassName('hapus')
    const itempesanan = document.getElementsByClassName('itempesanan')




    function loadlist(idProduk, namaProduk, harga, jenis) {
        // console.log(getlist)

        // console.log(idProduk, namaProduk, harga, jenis)
        const dataProduk = JSON.parse(localStorage.getItem("pesanan")) ?? []
        if (dataProduk != undefined) {
            // dataProduk.map(data => {
            //     if (data["id"] == idProduk) {
            //         data["qty"]++;
            //     }
            // })
            // const exist = dataProduk.find(data => {
            //     return data["id"] == idProduk
            // })

            let exist = 0;

            for (let i = 0; i < dataProduk.length; i++) {
                if (dataProduk[i]['id'] == idProduk) {
                    exist = 1
                }
            }

            if (exist) {
                dataProduk.map(data => {
                    if (data["id"] == idProduk) {
                        data["qty"]++;
                    }
                })
            } else {
                dataProduk.push({
                    id: idProduk,
                    jenis_produk: jenis,
                    nama_produk: namaProduk,
                    harga: harga,
                    qty: 1
                })

            }

        }
        // console.log(dataProduk)
        // dataProduk.push({
        //     id: idProduk,
        //     jenis_produk: jenis,
        //     nama_produk: namaProduk,
        //     harga: harga,
        //     qty: 1
        // })

        localStorage.setItem("pesanan", JSON.stringify(dataProduk))
        refresh()
        // const dataProduk = {
        //     id: 'MK001',
        //     jenis_produk: 'makanan',
        //     nama_produk: 'Nasi Goreng 69',
        //     harga: 130000,
        //     qty: 1
        // }
        // localStorage.removeItem("pesanan");
        // localStorage.setItem("pesanan", JSON.stringify(test))
        // getlist.innerHTML += `<div class="itempesanan" style="display: flex;justify-content: space-between;align-items:center;">
        //     <p sty>${namaProduk}</p>
        //     <p>Rp. ${harga}</p>
        //     <p> 1 </p>
        //     <button class="hapus" style="width: 10px; display: flex;justify-content: center;background-color:red;"> - </button>
        // </div>`



    }

    for (let i = 0; i < hapuslist.length; i++) {
        const element = hapuslist[i];
        element.addEventListener("click", function() {
            console.log()
            element.parentNode.remove()
        })
    }

    function kurang_pesanan(idProduk, element) {
        // console.log(element.parentNode.parentNode.remove)
        const data = JSON.parse(localStorage.getItem("pesanan"));

        for (let index = 0; index < data.length; index++) {
            // console.log(data[index])
            if (data[index]['id'] == idProduk) {
                data[index]['qty'] -= 1
                if (data[index]['qty'] <= 0) {
                    // element.parentNode.parentNode.remove()
                    // console.log(element.parentNode.remove())
                    element.parentNode.parentNode.parentNode.removeChild(element.parentNode.parentNode)
                    data.splice(index, 1);
                }
            }
        }
        localStorage.setItem("pesanan", JSON.stringify(data))
        refresh();

    }
</script>

</html>