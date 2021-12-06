<?php
// Koneksi ke DB
require('koneksi.php');
// cek submit sudah ditekan Atau belum
if(isset($_POST["submit"]) ){
   

  
    // Cek apakah berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ){
        echo"
            <script>
                alert('Data berhasil Ditambahkan');
                document.location.href ='index.php';
            </script>
        ";
    }else{
        echo"
        <script>
            alert('Data gagal Ditambahkan');
            document.location.href ='index.php';
            
        </script>
        ";
        echo mysqli_error($conn);

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah data Baru</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" id="nis" required>
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul> 

    </form>
</body>
</html>
