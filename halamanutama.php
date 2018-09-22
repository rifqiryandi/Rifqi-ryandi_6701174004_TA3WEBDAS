<?php 
	session_start();
	include 'koneksi.php';
	$kd = $_SESSION['codeid'];
	$aksi = mysqli_query($conn,"SELECT * FROM data_file WHERE code ='$kd'");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>halaman utama bram</title>
</head>
<body>
	<form>
		<table align="center">
		<tr>
			<td colspan="2" align="center"><h2>Selamat datang di BRAM :)</h2> </td>
		</tr>
		<tr>
			<td>Nama  :</td>
			<td><?php echo $_SESSION['nameid'];?></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><?php echo $_SESSION['emailid'];?></td>
		</tr>
		<tr>
			<td align="left"><button><a href="logout.php">Keluar</a></button></td>
			<td  align="right"><button><a href="simpan_gambar.php">Tambah</a></button></td>

		</tr>
		<tr>
			<td colspan="2"><?php  
			while ($rsl = mysqli_fetch_array($aksi)) {
				echo "<a href= edit.php?id=".$rsl['code_img'].">"."<img src=img/".$rsl['gambar']." height=240>"."</a>";
			}
			?></td>
		</tr>
		
	</table>
	</form>
</body>
</html>