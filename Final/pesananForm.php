<?php
// Membuat koneksi ke database 'Zoya_store (2)' dengan username 'root' dan password kosong
$conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');

// Mengambil id_barang dari URL menggunakan metode GET
$idbarang = $_GET['id_barang'];

// Membuat query untuk mencari data pesanan berdasarkan id_barang
$cari = "SELECT * FROM pesanan WHERE id_barang= '$idbarang'";

// Menjalankan query dan menyimpan hasilnya dalam variabel $hasil_cari
$hasil_cari = mysqli_query($conn, $cari);

// Mengambil data hasil query dalam bentuk array
$data = mysqli_fetch_array($hasil_cari);

// Fungsi untuk menandai radio button sebagai 'checked' jika nilai input sama dengan nilai yang ada dalam data pesanan
function active_radio_button($value, $input) {
    $result = $value == $input ? 'checked' : '';
    return $result;
}

// Mengecek apakah data ditemukan
if ($data > 0) {
?>
<html>
<head>
    <title>Data Pesanan</title>
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
        <h3><br>FORM Pesanan</h3>
        <br>
        <table>
            <form method="POST" action="diskon.php">
                <tr>
                    <td>Id Barang</td>
                    <td>:</td>
                    <td><input type="text" name="id_barang" size="10" value="<?php echo $data['id_barang'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td><input type="text" name="nama_barang" size="30" value="<?=$data['nama_barang'] ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Barang</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="jenis_barang" value="Baju" <?php echo active_radio_button("Baju", $data['jenis_barang']) ?>>Baju
                        <input type="radio" name="jenis_barang" value="Hijab" <?php echo active_radio_button("Hijab", $data['jenis_barang']) ?>>Hijab
                        <input type="radio" name="jenis_barang" value="Celana" <?php echo active_radio_button("Celana", $data['jenis_barang']) ?>>Celana
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" name="harga" size="30" value="<?=$data['harga'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="MASUKKAN DISKON"></td>
                </tr>
            </form>
        </table>
    </center>
    <?php
    }
    ?>
</body>
</html>