<?php 
	// koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "praktikum");

	function query($query) {
		global $conn;
		$result = mysqli_query ($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function tambah($data) {
		global $conn;

		// ambil data dari tiap elemen dalam form
		$nama = htmlspecialchars($data["nama"]);
		$telepon = htmlspecialchars($data["telepon"]);
		$email = htmlspecialchars($data["email"]);
		$alamat = htmlspecialchars($data["alamat"]);
		

		// upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}

		// query insert data
		$query = "INSERT INTO customers VALUES
					('', '$nama', '$telepon', '$email', '$alamat', '$gambar')
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang di upload
		if ($error === 4) {
			echo "<script>
					alert('pilih gambar terlebih dahulu!')
				</script>";

			return false;
		}

		// cek apakah yang di upload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
					alert('yang anda upload bukan gambar!')
				</script>";

			return false;
		}

		// cek jika ukurannya terlalu besar
		if ($ukuranFile > 1000000) {
			echo "<script>
					alert('ukuran gambar terlalu besar!')
				</script>";

			return false;
		}

		// lolos pengecekan, gambar siap di upload
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

		return $namaFileBaru;
	}

	function hapus($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM customers WHERE id = $id");

		return mysqli_affected_rows($conn); 
	}

	function ubah($data) {
		global $conn;

		// ambil data dari tiap elemen dalam form
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$telepon = htmlspecialchars($data["telepon"]);
		$email = htmlspecialchars($data["email"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		// cek apakah user pilih gambar baru atau tidak
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}
		

		// query insert data
		$query = "UPDATE customers SET
					nama = '$nama', telepon = '$telepon', email =  '$email', alamat = '$alamat', gambar = '$gambar'
					WHERE id = $id
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function cari($keyword) {
		$query = "SELECT * FROM customers
					WHERE
					nama LIKE '%$keyword%' OR
					telepon LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%'
				";

		return query($query);
	}

	function registrasi($data) {
		global $conn;

		$email = strtolower(stripcslashes($data["email"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		// cek email sudah ada atau belum
		$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('email sudah terdaftar!')
				</script>";

			return false;
		}

		// cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!')
				</script>";

			return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan user baru ke database
		mysqli_query($conn, "INSERT INTO users VALUES('', '$email', '$password')");

		return mysqli_affected_rows($conn);
	}
?>