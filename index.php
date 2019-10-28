<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php';
	$customers = query("SELECT * FROM customers");

	// tombol cari ditekan
	if (isset($_POST["cari"])) {
		$customers = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Daftar Customers</title>
</head>
<body>
	
	<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Daftar <b>Customers</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="logout.php" class="btn btn-danger">
          					<span class="glyphicon glyphicon-log-out"></span>&nbsp;Log out
        				</a>
						<a href="tambah.php" class="btn btn-success btn-sm"><i class="material-icons">&#xE147;</i> <span>Tambah data customer</span></a>
					</div>
				</div>
			</div>

			<form action="" method="post" class="form-inline my-2 my-lg-2">
				<input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" class="form-control mr-sm-2">
				<button type="submit" name="cari" class="btn btn-outline-success my-2 my-sm-0"><i class="material-icons">search</i></button>
			</form>

			<table class="table table-striped table-hover">	
				<tr>
					<th>No.</th>
					<th>Gambar</th>
					<th>Nama</th>
					<th>Telepon</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($customers as $customer) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><img src="img/<?= $customer["gambar"]; ?>" width="100px"></td>
					<td><?= $customer["nama"]; ?></td>
					<td><?= $customer["telepon"]; ?></td>
					<td><?= $customer["email"]; ?></td>
					<td><?= $customer["alamat"]; ?></td>
					<td>
						<a href="ubah.php?id=<?= $customer["id"]; ?>" class="edit"><i class="material-icons" title="Ubah">&#xE254;</i></a>
						<a href="hapus.php?id=<?= $customer["id"]; ?>" class="delete" onclick = "return confirm('yakin?');"><i class="material-icons" data-toggle="tooltip" title="Hapus">&#xE872;</i></a>
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
</body>
</html>