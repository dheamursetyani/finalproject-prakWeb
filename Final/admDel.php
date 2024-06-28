<?php 
    // Koneksi ke database
	$conn = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');
    
    // Mengambil parameter id_barang dari URL
	$id_barang = $_GET['id_barang'];	
	
    // Mengambil nilai submit dari form yang dikirimkan via metode POST
	$submit = $_POST['submit'];
	
    // Membuat query SQL untuk menghapus data barang berdasarkan id_barang
	$delete = "DELETE FROM barang WHERE id_barang ='$id_barang'";

    // Menjalankan query DELETE
	mysqli_query($conn, $delete);
    
    // Menampilkan pesan sukses dan mengarahkan pengguna ke halaman admin.php
	echo "<script>alert('data berhasil dihapus');document.location.href='admin.php';</script>";
?>