<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus produk berdasarkan ID
    mysqli_query($db_connect, "DELETE FROM products WHERE id=$id");

    // Alihkan ke halaman utama setelah penghapusan
    header("Location: index.php");
    exit();
} else {
    // Alihkan ke halaman utama jika ID tidak disediakan
    header("Location: index.php");
    exit();
}
?>
