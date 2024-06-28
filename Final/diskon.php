<html> 
<head> 
<title>Hitung Diskon</title> 
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
<h2 align="center"><br>Hitung Diskon</h2> 
<br>
<form action="" method="post"> 
    <p>Masukkan Nilai Total Harga : Rp <input type="text" name="harga"> </p> 
    <p>Masukkan Nilai Potongan Harga (Diskon) : <input type="text" name="diskon"> %</p> 
    <input type="hidden" name="hitung" value="hitung"> 
    <input type="submit" value="HITUNG"> 
</form> 

<?php 
if(isset($_POST['hitung'])){
    // Menampung harga yang telah diinput oleh teks input yang 'name=harga'. 
    $harga = $_POST['harga'];

    // Menampung persentase diskon yang telah diinput oleh teks input yang 'name=diskon'.
    $diskon = $_POST['diskon'];

    // Rumus untuk menghitung diskon. 
    $potonganharga = $harga * ($diskon/100);

    // Rumus untuk menghitung total harga setelah dikurangi diskon.
    $hasil = $harga - $potonganharga;

    // Menampilkan hasil perhitungan diskon. 
    echo "Nilai Total Harga Semula : Rp ".$harga."<br/>"; 
    echo "Nilai Potongan Harga (Diskon) : ".$diskon."%<br/>"; 
    echo "Hasil Hitung Diskon : Rp ".$potonganharga."<br/>"; 
    echo "Nilai Total Harga : Rp ".$hasil."<br/>"; 
} 
?> 
</center>
</body> 
</html>