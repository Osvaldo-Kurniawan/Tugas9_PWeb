<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style> 
		body { 
			background-color: #1a1a1a; color: #fff; 
		} 
		.container { 
			margin-top: 50px; 
			background-color: #333; 
			padding: 20px; 
			border-radius: 10px; } 
		h1 { 
			margin-bottom: 30px; 
		} 
		.form-control { 
			background-color: #444; 
			color: #fff; 
			border: none; 
		} 
		.form-check-input { 
			background-color: #444; 
			color: #fff; 
			border: none; 
		} 
		.form-check-label { 
			color: #fff; 
		} 
		.form-control-file { 
			background-color: #444; 
			color: #fff; 
			border: none; 
		} 
		.btn-primary { 
			background-color: #4d4d4d; /* Dark gray */
			border-color: #1e90ff;	
			color: white; 
		} 
		.btn-secondary { 
			background-color: #4d4d4d; /* Dark gray */
			border-color: #c0c0c1;	
			color: white;
		} 
		.btn:hover {
			background-color: #333333; /* Darker gray on hover */
			border-color: #333333;
			color: white;
			box-shadow: 0 0 5px 5px rgba(0, 0, , 0.5);
		} 
	</style>
</head>
<body>
	<div class="container">
		<center><h1 class="mt-5">Ubah Data Siswa</h1></center>
		<?php
		include "koneksi.php";
		$id = $_GET['id'];
		$sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$data = $sql->fetch();
		?>
		<form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nis">NIS</label>
				<input type="text" class="form-control" id="nis" name="nis" value="<?php echo $data['nis']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
			</div>
			<div class="form-group">
				<label for="jenis_kelamin">Jenis Kelamin</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" <?php if($data['jenis_kelamin'] == "Laki-laki") echo "checked"; ?>>
					<label class="form-check-label" for="laki-laki">Laki-laki</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php if($data['jenis_kelamin'] == "Perempuan") echo "checked"; ?>>
					<label class="form-check-label" for="perempuan">Perempuan</label>
				</div>
			</div>
			<div class="form-group">
				<label for="telp">Telepon</label>
				<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $data['telp']; ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="foto">Foto</label>
				<input type="file" class="form-control-file" id="foto" name="foto">
			</div>
			<hr>
			<button type="submit" class="btn btn-primary">Ubah</button>
			<a href="index.php" class="btn btn-secondary">Batal</a>
		</form>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
