<div class="header-profile">
    <div class="profile-order">
        <h2>Nomor Order</h2>
        <p id="no_order">&nbsp #1</p>
    </div>
    <img src="../../icon/ava.png" alt="" style="height: 50px;width: 50px;">
</div>
<hr>
<br>
<div class="body-pesanan">
    <h4>List Pesanan :</h4>
    <div class="header-judul-pesanan">
        <h3 style="flex: 1;">Menu</h3>
        <h3 style="width: 70px;">Harga</h3>
        <h3 style="width: 40px;">Qty</h3>
        <h3 style="width: 60px;">Hapus</h3>
    </div>
    <div class="body-list-pesanan">
        <div class="list-pesanan" id="list-pesan" style="overflow: auto;white-space: nowrap;">

        </div>
    </div>
    <hr>
    <div class="toga" style="display: flex;justify-content:space-between;">
        <!-- <br>
        <br> -->
        <h3>Total Harga :
        </h3>
        <div id="total" style="margin-right: 120px;">

        </div>
    </div>
    <button style="width: 90px;margin: 5px;" id="beli">Beli!</button>

</div>

<script>
    const wrapperPesanan = document.getElementById('list-pesan')
    const jumlh_tot = document.getElementById('total')
    const beli = document.getElementById('beli')

    function refresh() {
        wrapperPesanan.innerHTML = ''
        const pesanan = JSON.parse(localStorage.getItem("pesanan")) ? JSON.parse(localStorage.getItem("pesanan")) : []
        for (let i = 0; i < pesanan.length; i++) {
            wrapperPesanan.innerHTML +=
                `<div  class="itempesanan" style="display: flex;justify-content: space-between;align-items:center;">
                    <p style="flex: 1;">${pesanan[i]['nama_produk']}</p>
                    <p style="width: 70px;display: flex;justify-content: flex-end;">Rp. ${pesanan[i]['harga']}</p>
                    <p style="width: 40px;display: flex;justify-content: flex-end;"> ${pesanan[i]['qty']} </p>
                    <div style="width: 60px;display: flex;justify-content: flex-end;">
                        <button class="hapus" onclick="kurang_pesanan('${pesanan[i]['id']}',this)" style="width: 10px; display: flex;justify-content: center;background-color:red;"> - </button>
                    </div>
                </div>`
        }

        // console.log(pesanan);
        let harga_total = 0
        for (let i = 0; i < pesanan.length; i++) {
            // console.log(pesanan[i]);

            // let total = pesanan[i]['harga'] * pesanan[i]['qty']
            // harga_total = harga_total + total
            harga_total += pesanan[i]['harga'] * pesanan[i]['qty']

        }
        // harga_total = total
        jumlh_tot.innerHTML = `<p> Rp. ${harga_total}</p>`
        // total += total
        // console.log(harga_total)
    }


    beli.addEventListener("click", async function() {
        const data = new FormData()
        data.append("pesanan", localStorage.getItem("pesanan"))
        fetch("http://localhost/restoku/database/proses_transaksi.php", {
            method: 'POST',
            body: data

        }).then(response => response.json()).then(data => {
            alert("data masuk!")
            localStorage.removeItem("pesanan")
            location.reload();
        })


    })

    refresh()
</script>