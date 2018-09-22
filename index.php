<!DOCTYPE html>
<html>
<head>
	<title>Tampilan awal</title>
</head>
<body>
	<form method="post">
		<table align="center" border="2">
			<tr>
				<td colspan="3" align="center"><h3>LOGIN</h3></td>
			</tr>

			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="userid" placeholder="Masukkan ID anda"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="Password" name="passid" placeholder="Masukkan password anda"></td>
			</tr>

			<tr align="right">
				<td colspan="2"><button><a href="daftar.php">Daftar</a></button></td>
				<td ><input type="submit" name="kirim" value="LOGIN"></td>
			</tr>			
		</table>
	</form>
</body>
</html>

<?php 
if (isset($_POST['kirim'])) {
	$username = $_POST['userid'];
	$password = md5($_POST['passid']);
	include 'koneksi.php';
	
 	$hasil = mysqli_query($conn,"select * from data_login WHERE name_id = '$username' AND pass = '$password'");
 	$row = mysqli_fetch_array($hasil);
 		if ($row['name_id'] == $username AND $row['pass'] == $password) {
 			session_start(); 
 			$_SESSION['nameid'] = $username;
 			$_SESSION['emailid'] = $row['email'];
 			$_SESSION['codeid'] = $row['code'];
 			header("location:halamanutama.php"); 
 		}	
 		else {
 	echo "Gagal Masuk"; 
 	}
 	
 		
}

 ?>