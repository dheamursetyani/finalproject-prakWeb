<?php
//ntuk memulai atau mengaktifkan session dalam PHP. Ini harus dipanggil sebelum menggunakan session dalam kode
session_start();
// untuk menonaktifkan laporan kesalahan tertentu
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
//koneksi ke parameter, user, database
$koneksi = mysqli_connect('localhost', 'root', '', 'Zoya_store (2)');

//kode yang akan di gunakan saat tombol laogin di klik
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //mengambil data dari tabel 'login' berdasarkan username dan password yang diinputkan pengguna
    $sql = "SELECT * FROM login WHERE Username='$username' AND Password='$password'";
    $query = mysqli_query($koneksi, $sql);
    $lihat = mysqli_num_rows($query);

    //Dalam blok if ini, kita memeriksa status pengguna dari data yang ditemukan
    if ($lihat > 0) {
        $row = mysqli_fetch_assoc($query);
        if ($row['status'] == 'Admin') {
            $_SESSION['username'] = $row['Username'];
            $_SESSION['status'] = 'Admin';
            header("location: admin.php");
            exit();
        } elseif ($row['status'] == 'Member') {
            $_SESSION['username'] = $row['Username'];
            $_SESSION['status'] = 'Member';
            header("location: member.php");
            exit();
        }
    } else {
        echo "<script>
                alert('Anda Gagal Login, silahkan coba lagi');
                document.location='KlambiLogin.php';
              </script>";
        exit();
    }
}
?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="ZL.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Login</h1>
                <hr>
                <p>Work hard so you can shop at Klambi</p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
                <button type="submit" name="submit">Login</button>
                <!-- <p>
                    <a href="#">Forgot Password?</a>
                </p> -->
            </form>
        </div>
        <div class="right">
            <img src="Shop online.png" alt="">
        </div>
    </div>
</body>
</html>
