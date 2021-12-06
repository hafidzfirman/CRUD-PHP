<?php
 require('koneksi.php');
    $id = $_GET['id'];

    if( hapus($id) > 0 ){
        echo"
        <script>
            alert('Data berhasil Dihapus');
            document.location.href ='index.php';
        </script>
    ";
}else{
    echo"
    <script>
        alert('Data gagal Dihapus');
        document.location.href ='index.php';
    </script>
    ";

}
?>
