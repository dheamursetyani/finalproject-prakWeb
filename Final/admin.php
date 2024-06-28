<!DOCTYPE html>
<html>
<head>
    <!-- Menandakan bahwa dokumen ini menggunakan HTML5 -->
    <meta charset="utf-8">
    <!-- Mengatur karakter encoding ke UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Mengatur viewport untuk responsivitas di perangkat mobile -->
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- Menghubungkan file CSS eksternal bernama admin.css -->
    
    <?php
    // Menggunakan PHP untuk membuat koneksi ke database 'Zoya_store (2)' pada server 'localhost' dengan username 'root' dan tanpa password
    $conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');
    ?>
    
    <style>
        body {
            background-color: #9BA4B5;
        }
        table {
            background-color: #9BA4B5;
        }
    </style>
    <!-- CSS internal untuk mengatur warna latar belakang body dan table -->
    
    <title>Halaman Admin</title>
    <!-- Mengatur judul halaman menjadi "Halaman Admin" -->
</head>

<body style="margin-bottom: 50px;">
    <!-- Bagian body halaman dimulai dengan margin bawah 50px -->
    
    <nav>
        <div class="pertama">
            <div class="logo"><a href="">Klambi Store</a></div>
            <!-- Bagian logo dengan tautan ke halaman utama -->
            
            <div class="menu">
                <ul>
                    <li><a href="logout.php">Log Out</a></li>
                    <!-- Tautan untuk logout -->
                    <li><a href="about.html">About Us</a></li>
                    <!-- Tautan ke halaman About Us -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Bagian navigasi selesai -->
    
    <center>
        <h3>Masukan Data Barang </h3>
        <!-- Judul form input data barang -->
        <br>
        <table border='0' width='30%'>
            <!-- Tabel untuk form input data barang dengan lebar 30% -->
            <form method='POST' action='admin.php'>
                <!-- Formulir menggunakan metode POST dan mengarah ke admin.php -->
                <tr>
                    <td width='25%'>Id Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='id_barang' size='30'></td>
                    <!-- Input teks untuk Id Barang -->
                </tr>
                <tr>
                    <td width='25%'>Nama Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='nama_barang' size='30'></td>
                    <!-- Input teks untuk Nama Barang -->
                </tr>
                <tr>
                    <td width='25%'>Jenis Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type='radio' value='Baju' checked name='jenis_barang'>Baju
                        <input type='radio' value='Hijab' name='jenis_barang'>Hijab
                        <input type='radio' value='Celana' name='jenis_barang'>Celana
                        <!-- Pilihan radio untuk Jenis Barang -->
                    </td>
                </tr>
                <tr>
                    <td width='25%'>Harga</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='harga' size='30'></td>
                    <!-- Input teks untuk Harga -->
                </tr>
            </table>
            <input type='submit' value='Masukan' name='submit'>
            <!-- Tombol submit untuk memasukkan data -->
        </form>

        <?php
        // Menonaktifkan pelaporan error untuk E_NOTICE dan E_WARNING
        error_reporting(E_ALL^E_NOTICE^E_WARNING);
        
        // Variabel untuk menyimpan nilai-nilai yang diterima dari form input
        $idbarang = $_POST['id_barang'];
        $namabarang = $_POST['nama_barang'];
        $jenisbarang = $_POST['jenis_barang'];
        $harga = $_POST['harga'];
        $submit = $_POST['submit'];
        
        // Query untuk memasukkan data ke dalam tabel 'barang'
        $input = "INSERT INTO barang (id_barang, nama_barang, jenis_barang, harga) VALUES ('$idbarang', '$namabarang', '$jenisbarang', '$harga')";
        
        // Memastikan bahwa input tidak kosong
        if ($submit){
            if ($idbarang == ''){
                echo "Id Barang tidak boleh kosong";
            } elseif ($namabarang == ''){
                echo "Nama Barang tidak boleh kosong";
            } elseif ($harga == ''){
                echo "Harga tidak boleh kosong";
            } else {
                // Menjalankan query untuk memasukkan data ke database
                mysqli_query($conn, $input);
                echo "Data Berhasil dimasukkan";
            }
        }
        ?>
        
        <hr>
        <!-- Garis horizontal sebagai pemisah -->
        <h3>Data Barang</h3>
        <!-- Judul untuk tabel data barang -->
        <table border='1' width='50%'>
            <!-- Tabel untuk menampilkan data barang dengan lebar 50% dan border 1 -->
            <tr>
                <td align='center' width='20%'><b>Id Barang</b></td>
                <td align='center' width='30%'><b>Nama Barang</b></td>
                <td align='center' width='10%'><b>Jenis Barang</b></td>
                <td align='center' width='30%'><b>Harga</b></td>
                <td align='center' width='30%'><b>Keterangan</b></td>
            </tr>

            <?php
            // Query SQL untuk mengambil semua data dari tabel 'barang' dan mengurutkannya berdasarkan id_barang
            $cari = "SELECT * FROM barang ORDER BY id_barang";
            $hasil_cari = mysqli_query($conn, $cari); // Menyimpan hasil dari query
            
            // Menampilkan setiap baris data dari hasil query
            while ($data = mysqli_fetch_row($hasil_cari)){
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td width='30%'>$data[3]</td>
                    <td><a href='admForm.php?id_barang=$data[0]'>Edit</a> |
                    <a href='admDel.php?id_barang=$data[0]'>Delete</a></td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
