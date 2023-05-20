<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi CRUD Upload Gambar dengan PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		body {
		background-color: #222;
		color: #fff}
		.container {
		margin-top: 50px;
		}
		h1 {
		margin-bottom: 30px;
		color: #fff;
		}
		.table td, .table th {
		vertical-align: middle;
		text-align: center;
		color: #fff;
		}
		.table th {
		background-color: #343a40;
		color: #fff;
		}
		.btn {
		margin-right: 5px;
		}
		.btn-warning {
		background-color: #4d4d4d; /* Dark gray */
		border-color: #ffd700;	
		color: white;
		}
		.btn-danger {
		background-color: #4d4d4d; /* Dark gray */
		border-color: #ff4d4d;	
		color: white;
		}
		.btn-primary {
		background-color: #4d4d4d; /* Dark gray */
		border-color: #1e90ff;	
		color: white;
		display: block;
		width: 100%;
		text-align: center;
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
		<h1>Data Siswa</h1>
		<table class="table table-bordered">
		<thead>
		<tr>
		<th>NIS</th>
		<th>Foto</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Telepon</>
		<th>Alamat</th>
		<th colspan="2">Aksi</th>
		</tr>
		</thead>
		<tbody>
		<?php
		include "koneksi.php";

		$sql = $pdo->prepare("SELECT * FROM siswa");
		$sql->execute();

		while($data = $sql->fetch()){ 
		echo "<tr>";
		echo "<td>".$data['nis']."</td>";
		echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['jenis_kelamin']."</td>";
		echo "<td>".$data['telp']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td><a href='form_ubah.php?id=".$data['id']."' class='btn btn-warning'>Ubah</a></td>";
		echo "<td><a href='proses_hapus.php?id=".$data['id']."' class='btn btn-danger'>Hapus</a></td>";
		echo "</tr>";
		}
		?>
		</tbody>
		</table>
		<a href="form_tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
