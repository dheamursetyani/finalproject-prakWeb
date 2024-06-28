<?php
$conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');

// digunakan untuk memeriksa apakah parameter id_barang ada dalam URL. Jika ada, maka kode di dalam blok ini akan dieksekusi
if (isset($_GET['id_barang'])) {
    $idBarang = $_GET['id_barang'];

    // Query untuk mengambil data barang berdasarkan id_barang
    $query = "SELECT * FROM barang WHERE id_barang = '$idBarang'";
    $result = mysqli_query($conn, $query);
    //digunakan untuk menghitung jumlah baris yang ditemukan dalam hasil query. digunakan untuk mengambil data hasil query sebagai array asosiatif.
    if (mysqli_num_rows($result) > 0) {
        $barang = mysqli_fetch_assoc($result);

        // Simpan pesanan ke database
        $idbarang = $barang['id_barang'];
        $namabarang = $barang['nama_barang'];
        $jenisbarang = $barang['jenis_barang'];
        $harga = $barang['harga'];
        $insertQuery = "INSERT INTO pesanan (id_barang, nama_barang, jenis_barang, harga) VALUES ('$idbarang', '$namabarang', '$jenisbarang', '$harga')";
        mysqli_query($conn, $insertQuery);
    } else {
        echo "Data barang tidak ditemukan.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesanan</title>
</head>
<link rel="stylesheet" type="text/css" href="admin.css">
<style>
        body {
            background-color: #9BA4B5;
        }
        table {
            background-color: #9BA4B5;
        }
    </style>
<body>
    <nav>
        <div class="pertama">
            <div class="logo"><a href="">Klambi Store</a></div>
            <div class="menu">
                <ul>
                    <li><a href="logout.php">Log Out</a></li>
                    <li><a href="about.html">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <center>
    <hr>
    <h3><br>Data Pesanan</h3>
    <br>
    <table border='1' width='50%'>
        <tr>
            <td align='center' width='20%'><b>ID Barang</b></td>
            <td align='center' width='30%'><b>Nama Barang</b></td>
            <td align='center' width='10%'><b>Jenis Barang</b></td>
            <td align='center' width='30%'><b>Harga</b></td>
            <td align='center' width='10%'><b>Action</b></td>
        </tr>
        <?php
        $queryPesanan = "SELECT * FROM pesanan"; //variabel yang berisi query untuk mengambil semua data pesanan dari tabel "pesanan".
        $resultPesanan = mysqli_query($conn, $queryPesanan);
        // digunakan dalam perulangan while untuk mengambil setiap baris data dari hasil query sebagai array asosiatif. Setiap baris data pesanan disimpan dalam variabel $pesanan.
        while ($pesanan = mysqli_fetch_assoc($resultPesanan)) {
            echo "
            <tr>
                <td align='center' width='20%'>" . $pesanan['id_barang'] . "</td>
                <td align='center' width='30%'>" . $pesanan['nama_barang'] . "</td>
                <td align='center' width='10%'>" . $pesanan['jenis_barang'] . "</td>
                <td align='center' width='30%'>" . $pesanan['harga'] . "</td>
                <td align='center' width='10%'><a href='PesananForm.php?id_barang=" . $pesanan['id_barang'] . "'>Diskon</a></td>
            </tr>";
        }
        ?>
    </table>
    </center>
</body>
</html>