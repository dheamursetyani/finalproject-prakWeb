<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Mengatur viewport agar sesuai dengan lebar perangkat dan skala awal 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Menghubungkan stylesheet eksternal -->
    <link rel="stylesheet" type="text/css" href="admin.css">
    <?php
    // Membuat koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');
    ?>
    <!-- Mengatur gaya khusus untuk halaman ini -->
    <style>
        body {
            background-color: #9BA4B5;
        }
        table {
            background-color: #9BA4B5;
        }
    </style>
    <title>Halaman Admin</title>
</head>
<body style="margin-bottom: 50px;">
    <!-- Navigasi -->
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
    <!-- Menampilkan judul tabel -->
    <h3>Data Barang</h3>
    <!-- Membuat tabel untuk menampilkan data barang -->
    <table border='1' width='50%'>
        <!-- Form yang mengirimkan data ke 'member.php' -->
        <form method='POST' action='member.php'>
            <!-- Header tabel -->
            <tr>
                <td align='center' width='20%'><b>Id Barang</b></td>
                <td align='center' width='30%'><b>Nama Barang</b></td>
                <td align='center' width='10%'><b>Jenis Barang</b></td>
                <td align='center' width='30%'><b>Harga</b></td>
                <td align='center' width='30%'><b>Keterangan</b></td>
            </tr>
            <?php
            // Query untuk mengambil semua data dari tabel barang
            $cari = "SELECT * FROM barang ORDER BY id_barang";
            $hasil_cari = mysqli_query($conn, $cari);
            // Loop melalui setiap baris data yang diambil
            while ($data = mysqli_fetch_row($hasil_cari)){
                echo"
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td width='30%'>$data[3]</td>
                    <td><a href='pesanan.php?id_barang=$data[0]'>Pesan</a></td>
                </tr>";
            }
            ?>
        </form>
    </table>
    </center>
</body>
</html>