<!-- <?php
// tambah.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require './config/db.php';

    $namaProduk = $_POST['namaProduk'];
    $hargaProduk = $_POST['hargaProduk'];

    // Proses upload gambar
    $gambarProduk = $_FILES['gambarProduk']['name'];
    $gambarProdukTmp = $_FILES['gambarProduk']['tmp_name'];
    $gambarProdukPath = "./upgambar/" . $gambarProduk; // Folder uploads harus ada dan memiliki izin tulis

    move_uploaded_file($gambarProdukTmp, $gambarProdukPath);

    // Simpan data ke database
    $query = "INSERT INTO products (name, price, image) VALUES ('$namaProduk', '$hargaProduk', '$gambarProdukPath')";
    $result = mysqli_query($db_connect, $query);

    if ($result) {
        echo "Produk berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan produk. Error: " . mysqli_error($db_connect);
    }
}
?> -->
