<?php
			$conn = mysqli_connect('localhost', 'root','','Zoya_store (2)');
			$idbarang = $_GET['id_barang'];
			$cari = "select * from barang where id_barang= '$idbarang'";
			$hasil_cari = mysqli_query($conn,$cari);
			$data = mysqli_fetch_array($hasil_cari);
			function active_radio_button($value,$input){
				$result = $value==$input? 'checked':'';
				return $result;
			}
			if($data > 0){	
		?>
<html>
	<head>
		<title>Data Barang</title>
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

				<h3><br>Form Update Barang</h3>
				<center>
					<br>
				<table>
					<form method="POST" action="admUp.php">
					<tr>
						<td>Id Barang</td>
						<td>:</td>
						<td><input type="text" name="id_barang" size="10" value="<?php echo $data['id_barang']?>"></td>
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>:</td>
						<td><input type="text" name="nama_barang" size="30" value="<?=$data['nama_barang']?>"></td>
					</tr>
					<tr>
						<td>Jenis Barang</td>
						<td>:</td>
						<td><input type="radio" name="jenis_barang" value="Baju" <?php echo active_radio_button("Baju", $data['jenis_barang'])?>>Baju
							<input type="radio" name="jenis_barang" value="Hijab"<?php echo active_radio_button("Hijab", $data['jenis_barang'])?>>Hijab
							<input type="radio" name="jenis_barang" value="Celana"<?php echo active_radio_button("Celana", $data['jenis_barang'])?>>Celana
						</td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td><input type="text" name="harga" size="40" value="<?=$data['harga']?>"></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="UPDATE DATA"></td>
					</tr>
					</form>
				</table>
			</center>
			<?php
			}
			?>
				
			</body>
	</html>