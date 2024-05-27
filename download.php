<?php
session_start();
if ($_SESSION['level'] != "admin") {
    header("location:index.php?pesan=gagal");
    exit();
}


include 'koneksi.php';
$koneksi = mysqli_connect("localhost", "root", "", "toko_online2");


if(isset($_GET['Id'])){
    $id = $_GET['Id'];

   
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id=$id");
    $file = mysqli_fetch_assoc($result);
    $filePath = $file['file_path'];
    $username = $file['username'];

    
    if(file_exists($filePath)){
        $fileName = $username . '.jpg'; 
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"'); 
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath); 
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>
