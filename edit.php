<?php 
$id = $_GET['id'];
include 'koneksi.php';

$ak = mysqli_query($conn,"SELECT * FROM data_file WHERE code_img ='$id'");

$rsl = mysqli_fetch_array($ak)
 ?>

 <form method="post" enctype="multipart/form-data">
 	<center>
 		<p>Preview:<?php echo"<img src=img/".$rsl['gambar']." height=240>";?></p>
 		<input type="file" name="imgg">
 		<input type="submit" name="ubah" value="ubah"> / <input type="submit" name="hapus" value="hapus"> / <button><a href="halamanutama.php">kembali</a></button>
 	</center>
 </form>

 <?php 
if (isset($_POST['ubah'])) {
	$new = $_FILES['imgg']['name'];
	$qry = mysqli_query($conn,"UPDATE data_file SET gambar='$new' WHERE code_img = '$id'");
	if (isset($qry)) {
		echo "Update berhasil <meta  http-equiv=refresh content=2;url=halamanutama.php>";
	}else{
		echo "Update gagal <meta  http-equiv=refresh content=2;url=edit.php>";
	}
}
if (isset($_POST['hapus'])) {
	$delete = mysqli_query($conn,"DELETE FROM data_file WHERE code_img = '$id'");
	if (isset($delete)) {
		echo "hapus berhasil <meta  http-equiv=refresh content=2;url=halamanutama.php>";
	}else{
		echo "hapus gagal <meta  http-equiv=refresh content=2;url=edit.php>";
	}		
	
}

  ?>