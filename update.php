<?php
// Koneksi ke DB
require('koneksi.php');
// Ambil Data di URL
$id = $_GET['id'];
// Query data berdasarkan ID
$mhs = query("SELECT * FROM name_table WHERE id= $id")[0];


// cek submit sudah ditekan Atau belum
if(isset($_POST["submit"]) ){
   

  
    // Cek apakah berhasil diubah atau tidak
    if( ubah($_POST) > 0 ){
        echo"
            <script>
                alert('Data berhasil Diubah');
                document.location.href ='index.php';
            </script>
        ";

    }else{
        echo"
        <script>
            alert('Data gagal Diubah');
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
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah data </h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" id="nis" required value="<?= $mhs["nis"]; ?>"  >
            </li>
            <li> 
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>"  required >
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="<?= $mhs["email"]; ?>"  required>
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>"  required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <img src="<?= $mhs["gambar"]; ?>" alt="" style="width:40px;" ><br>
                <input type="file" name="gambar" id="gambar"  required>
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul> 

    </form>
</body>
</html>
