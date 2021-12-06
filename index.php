<?php
// Menghubungkan ke database
require('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
 </head>
 <body>
    <h1>Daftar Nama</h1>
    <a href="tambah.php">Tambah Data</a>
    <table border="1" >
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach($mahasiswa as $row ) :?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="update.php?id=<?= $row["id"];?>">Update</a>
                <a href="delete.php?id=<?= $row["id"];?>" onclick="return confirm('Benarkah Anda ingin menghapus')">Delete</a>
            </td>
            <td><img src="<?= $row["gambar"] ; ?>"  alt=""></td>
            <td><?= $row["nis"] ; ?></td>
            <td><?= $row["nama"] ; ?></td>
            <td><?= $row["email"] ; ?></td>
            <td><?= $row["alamat"] ; ?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
 </body>
</html>
