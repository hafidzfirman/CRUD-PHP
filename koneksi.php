<?php
//menyambungkan Ke DB
$conn = mysqli_connect("localhost","root","","Name_database");
// Query data 
function query($query) {
    global $conn; // untuk memberitahu bahwa $conn nya itu tetap seperti di atas
    $result = mysqli_query($conn , $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

// funtion Menambah (tambah.php)
function tambah($data){
    global $conn;

     //Ambil data dari tiap elemen    
     $nis    = htmlspecialchars($data["nis"]);
     $nama   = htmlspecialchars($data["nama"]);
     $email  = htmlspecialchars($data["email"]);
     $alamat = htmlspecialchars($data["alamat"]);

    //  Upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    }

       // Query insert data
    $query = "
    INSERT INTO name_table (id,gambar,nis,nama,email,alamat)
    VALUES (NULL,'$gambar','$nis','$nama','$email','$alamat') 
    ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// Function upload (Upload.php)
function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ){
        echo"
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstansiGambarvalid = ['jpg','jpeg','png'];
    $ekstansiGambar = explode('.',$namaFile);
    $ekstansiGambar = strtolower(end($ekstansiGambar)); 
    if( !in_array($ekstansiGambar,$ekstansiGambarvalid) ){
        echo"
        <script>
            alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ){
        echo"
        <script>
            alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // Lolos pengecekan gambar siap diupload
    // Generate nama gambar baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstansiGambar;

    move_uploaded_file($tmpName,'img/' . $namafileBaru);

    return $namafileBaru;
   
}

// Function penghapus (Delete.php)
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM name_table WHERE id = $id") ;

        return mysqli_affected_rows($conn);
    }

// Function Ubah (Update.php)
function ubah($data){
    global $conn;

    
     //Ambil data dari tiap elemen
     $id     = $data["id"];    
     $nis    = htmlspecialchars($data["nis"]);
     $nama   = htmlspecialchars($data["nama"]);
     $email  = htmlspecialchars($data["email"]);
     $alamat = htmlspecialchars($data["alamat"]);
     $gambarLama = htmlspecialchars($data["gambarlama"]); 
    //  Cek apakah  user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ){
        $gambar = htmlspecialchars($data["gambar"]);
    }else{
        $gambar = upload();
    }
    


       // Query insert data
    $query = "UPDATE name_table SET 
                nis    = '$nis',
                nama   = '$nama',
                email  = '$email',
                alamat = '$alamat',
                gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


?>
