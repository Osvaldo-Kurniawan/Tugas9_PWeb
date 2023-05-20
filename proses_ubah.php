<?php
include "koneksi.php";
$id = $_GET['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if(empty($foto)){
	// Proses ubah data ke Database
	$sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat WHERE id=:id");
	$sql->bindParam(':nis', $nis);
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':jk', $jenis_kelamin);
	$sql->bindParam(':telp', $telp);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':id', $id);
	$execute = $sql->execute();

	if($sql){
		header("location: index.php");
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ 
	$fotobaru = date('dmYHis').$foto;
	$path = "images/".$fotobaru;

	// Proses upload (Insert)
	if(move_uploaded_file($tmp, $path)){ 
		$sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$data = $sql->fetch();

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("images/".$data['foto'])) 
			unlink("images/".$data['foto']);

		// Proses ubah data ke Database
		$sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat, foto=:foto WHERE id=:id");
		$sql->bindParam(':nis', $nis);
		$sql->bindParam(':nama', $nama);
		$sql->bindParam(':jk', $jenis_kelamin);
		$sql->bindParam(':telp', $telp);
		$sql->bindParam(':alamat', $alamat);
		$sql->bindParam(':foto', $fotobaru);
		$sql->bindParam(':id', $id);
		$execute = $sql->execute();

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			header("location: index.php"); // Redirect ke halaman index.php
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}
?>
