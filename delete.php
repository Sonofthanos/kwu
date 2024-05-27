<?php
include 'koneksi.php';

if(isset($_GET['Id'])) {
    $id = $_GET['Id'];

    $query = "DELETE FROM user WHERE id=$id";
    
    $result = mysqli_query($koneksi, $query);

    if($result) {
        header("Location: halaman_admin.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak tersedia.";
}
?>
