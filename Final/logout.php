<?php 
// Memulai session
session_start(); 

// Menghancurkan semua data session yang sedang berjalan
session_destroy(); 
?>
<!-- Menampilkan pesan logout dan mengarahkan pengguna ke halaman login -->
<script language="Javascript">
 	alert('Anda Telah Logout');
 	document.location='KlambiLogin.php';
</script>