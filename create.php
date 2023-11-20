<?php
require './config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaProduk = $_POST['namaProduk'];
    $hargaProduk = $_POST['hargaProduk'];

    // Proses upload gambar
    $gambarProduk = $_FILES['gambarProduk']['name'];
    $gambarProdukTmp = $_FILES['gambarProduk']['tmp_name'];
    $uploadsDirectory = './upgambar/'; // Sesuaikan path ini
    $gambarProdukPath = $uploadsDirectory . $gambarProduk;

    move_uploaded_file($gambarProdukTmp, $gambarProdukPath);

    // Simpan data ke database
    $query = "INSERT INTO products (name, price, image) VALUES ('$namaProduk', '$hargaProduk', '$gambarProdukPath')";
    $result = mysqli_query($db_connect, $query);

    if ($result) {
        // Jika sukses, arahkan kembali ke halaman show.php
        header("Location: show.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menambahkan produk. Error: " . mysqli_error($db_connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="namaProduk">Nama Produk:</label>
        <input type="text" id="namaProduk" name="namaProduk" required>

        <label for="hargaProduk">Harga:</label>
        <input type="number" id="hargaProduk" name="hargaProduk" required>

        <label for="gambarProduk">Gambar Produk:</label>
        <input type="file" id="gambarProduk" name="gambarProduk" accept="image/*" required>

        <button type="submit">Tambah Produk</button>
    </form>
</body>
</html>
