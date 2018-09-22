<!DOCTYPE html>
<html>
<head>
	<title>Tampilan daftar</title>
</head>
<body>
	<form action="" method="post">
		<table align="center" border="2">
			<tr>
				<td colspan="3" align="center"><h3>DAFTAR</h3></td>
			</tr>
			
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="userid" placeholder="Masukkan ID anda"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="text" name="passid" placeholder="Masukkan password anda"></td>
			</tr>

			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email" placeholder="Masukkan email anda"></td>
			</tr>

			<tr align="center">
				<td colspan="2"><input type="submit" name="send"></td>
				<td><button><a href="index.php">Kembali</a></button></td>
			</tr>						
		</table>
	</form>
</body>
</html>

<?php 
include 'koneksi.php';
$kl = mysqli_query($conn,"SELECT*FROM data_login");



if (isset($_POST['send'])) {
	if ($_POST['userid']!="" && $_POST['passid']!="" && $_POST['email']!="") {
		$id = $_POST['userid'];
	$pass = md5($_POST['passid']);
	$email = $_POST['email'];
	
	$hsl = mysqli_fetch_array($kl);
	
	
	$qury = mysqli_query($conn,"INSERT INTO data_login(code, name_id, pass, email) VALUES ('','$id','$pass','$email')");
	if (isset($qury)) {
		echo "<center>Pendaftaran BERHASIL<meta  http-equiv=refresh content=2;url=index.php></center>";
	}
	}else{
		echo "<center>Pendaftaran GAGAL<meta  http-equiv=refresh content=2;url=daftar.php></center>";
	}
	

	
}




?>