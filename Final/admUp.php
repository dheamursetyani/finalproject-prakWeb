<?php
// Membuat koneksi ke database 'Zoya_store (2)' dengan username 'root' dan password ''
$conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');

// Mengambil data dari form dengan metode POST
$idbarang = $_POST['id_barang'];
$namabarang = $_POST['nama_barang'];
$jenisbarang = $_POST['jenis_barang'];
$harga = $_POST['harga'];
$submit = $_POST['submit'];

// Membuat query untuk mengupdate tabel 'barang'
$update = "UPDATE barang SET id_barang='$idbarang', nama_barang='$namabarang', jenis_barang='$jenisbarang', harga='$harga' WHERE id_barang='$idbarang'";

// Mengecek apakah tombol submit ditekan
if ($submit) {
    // Validasi data input
    if ($idbarang == '') {
        echo "Id Barang tidak boleh kosong, diisi dulu";
    } elseif ($namabarang == '') {
        echo "Nama Barang tidak boleh kosong";
    } elseif ($harga == '') {
        echo "Harga tidak boleh kosong";
    } elseif ($idbarang == '') { // Kondisi ini duplikat dan tidak diperlukan
        echo "Id Barang tidak boleh kosong, diisi dulu";
    } else {
        // Menjalankan query update
        mysqli_query($conn, $update);
        
        // Menampilkan pesan berhasil dan mengarahkan kembali ke halaman admin
        echo "
        <script>
        alert('data berhasil di update');
        document.location.href='admin.php';
        </script>";
    }
}
?>