<?php
$namaBarang;
$hargaSatuan;
$jumlahPembelian;
$diskon;
$potongan;
$totalHarga;
$alert;

if (isset($_POST["send"])) {
    $namaBarang = $_POST["namaBarang"];
    $hargaSatuan = $_POST["hargaSatuan"];
    $jumlahPembelian = $_POST["jumlah"];

    if ($namaBarang === ""){
        $alert = "Harap Isi nama barang";
    }elseif ($hargaSatuan < 0) {
        $alert = "harga satuan tidak boleh negatif";
    }elseif ($jumlahPembelian < 1) {
        $alert = "pembelian barang minimal 1";
    }else {
        $totalHarga = $hargaSatuan * $jumlahPembelian;

        if ($totalHarga >= 1000000) {
            $diskon = 20;
        }elseif ($totalHarga >= 500000) {
            $diskon = 10;
        }elseif ($totalHarga >= 250000) {
            $diskon = 5;
        }else {
            $diskon = 0;
        }

        $potongan = $totalHarga * $diskon / 100;
        $totalPembayaran = $totalHarga - $potongan;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Pembayaran</h1>
        <br>
        <div>
            <label for="">Nama Barang :</label>
            <input type="text" name="namaBarang" id="namaBarang">
        </div>
        <br>
        <div>
            <label for="">Harga Satuan :</label>
            <input type="number" name="hargaSatuan" id="hargaSatuan">
        </div>
        <br>
        <div>
            <label for="">Jumlah Pembelian :</label>
            <input type="number" name="jumlah" id="jumlah">
        </div>
        <br>
        <button type="submit" name="send">Hitung</button>
        <?php
        echo $alert;
        ?>
    </form>
    <br>
    <hr>
    <?php
    echo "Nama Barang: " . $namaBarang;
    echo "<br>";
    echo "Harga Satuan: " . "Rp " . $hargaSatuan;
    echo "<br>";
    echo "Jumlah: " . $jumlahPembelian;
    echo "<br>";
    echo "Diskon: " . $diskon . "%";
    echo "<br>";
    echo "Total Pembayaran: " . "Rp " . $totalHarga;
    ?>
</body>
</html>