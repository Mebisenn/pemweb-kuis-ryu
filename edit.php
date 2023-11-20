<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil detail produk berdasarkan ID
    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);

    // Periksa apakah formulir telah dikirim
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Perbarui detail produk
        $newName = $_POST['new_name'];
        $newPrice = $_POST['new_price'];

        mysqli_query($db_connect, "UPDATE products SET name='$newName', price='$newPrice' WHERE id=$id");

        // Alihkan ke halaman utama setelah pengeditan
        header("Location: show.php");
        exit();
    }
} else {
    // Alihkan ke halaman utama jika ID tidak disediakan
    header("Location: show.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="POST">
        <label for="new_name">Nama produk:</label>
        <input type="text" id="new_name" name="new_name" value="<?=$product['name']?>" required>
        
        <label for="new_price">Harga:</label>
        <input type="number" id="new_price" name="new_price" value="<?=$product['price']?>" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
