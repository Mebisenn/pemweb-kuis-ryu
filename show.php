<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>
<body>
    <h1>Data produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama produk</th>
                <th>Harga</th>
                <th>Gambar produk</th>
                <th>Opsi</th>
                <form>
                    <!-- Isi formulir tambah produk di sini -->
                    <button type="submit" formaction="create.php">Tambah Produk</button>
                </form>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['price'];?></td>
                    <td><a href="<?=$row['image'];?>" target="_blank">Lihat</a></td>
                    <td><a href="<?=$row['image'];?>" download>Unduh</a></td>
                    <td>
                        <a href="edit.php?id=<?=$row['id'];?>">Edit</a>
                        <a href="delete.php?id=<?=$row['id'];?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
