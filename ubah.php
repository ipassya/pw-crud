<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php';

	// ambil data di URL
	$id = $_GET["id"];

	// query data customers berdasarkan id
	$customer = query("SELECT * FROM customers WHERE id = $id")[0];

	// cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {

		// cek apakah data berhasil di ubah atau tidak
		if (ubah ($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('data gagal diubah!');
					document.location.href = 'index.php';
				</script>
			";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style/style.css">
	<title>Ubah data customer</title>
</head>
<body>
	<div class="container">
		<div class="table-wrapper">
            <div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Ubah data <b>Customers</b></h2>
					</div>
				</div>
			</div><br>

			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $customer["id"]; ?>">
				<input type="hidden" name="gambarLama" value="<?= $customer["gambar"]; ?>">
				<div class="col-sm-5">
					<div class="input-group mb-1">
						<div class="input-group-prepend">
							<label for="nama"><span class="input-group-text" id="inputGroup-sizing-default">Nama</span></label>
						</div>
						<input type="text" name="nama" id="nama" value="<?= $customer["nama"] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-1">
						<div class="input-group-prepend">
							<label for="telepon"><span class="input-group-text" id="inputGroup-sizing-default">Telepon</span></label>
						</div>
						<input type="text" name="telepon" id="telepon" value="<?= $customer["telepon"] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-1">
						<div class="input-group-prepend">
							<label for="email"><span class="input-group-text" id="inputGroup-sizing-default">Email</span></label>
						</div>
						<input type="text" name="email" id="email" value="<?= $customer["email"] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-1">
						<div class="input-group-prepend">
							<label for="alamat"><span class="input-group-text" id="inputGroup-sizing-default">Alamat</span></label>
						</div>
						<input type="text" name="alamat" id="alamat" value="<?= $customer["alamat"] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="gambar">
						<label for="gambar">Gambar : </label>
					</div>
					<img src="img/<?= $customer['gambar']; ?>" width = "100px">
					<div class="input-group mb-3">
						<div class="custom-file">
							<input type="file" name="gambar" id="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-info">Ubah Data!</button>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>