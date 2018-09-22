<form method="post" enctype="multipart/form-data">
	<center>
		
		<p>Masukkan gambar anda:</p>
	<input type="file" name="pic"><br>
	<input type="submit" name="upl" value="simpan">	<br>
	<button><a href="halamanutama.php">Kembali</a></button>

	</center>
	
</form>

<?php 
session_start();
include 'koneksi.php';
if (isset($_POST['upl'])) {
	if ($_FILES['pic']['name'] != "") {
	
	$fkk = $_SESSION['codeid'];
	$gambar = $_FILES['pic']['name'];

	$aksi = mysqli_query($conn,"INSERT INTO `data_file`(`code`, `code_img`, `gambar`) VALUES ('$fkk','','$gambar')");
	if (isset($aksi)) {
		echo "<center>Simpan berhasil <meta  http-equiv=refresh content=2;url=halamanutama.php></center>";
		}
	}else{
		echo "<center>Simpan GAGAL<meta  http-equiv=refresh content=2;url=simpan_gambar.php></center>";
	}
	
}

 ?>