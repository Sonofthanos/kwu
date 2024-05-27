<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $namaFile = $_FILES['berkas']['name'];
    $namaSementara = $_FILES['berkas']['tmp_name'];

    $teruploud = move_uploaded_file($namaSementara, $namaFile);

    if ($teruploud) {
        $update_query = "UPDATE user SET file_path = '$namaFile' WHERE id = $id";
        if (mysqli_query($koneksi, $update_query)) {
            echo "Data updated successfully. File uploaded.";
            echo "<br>Lihat File: <a href='halaman_admin.php'>Kembali ke Halaman Admin</a>";
        } else {
            echo "Error updating data: " . mysqli_error($koneksi);
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "ID is not set or not numeric.";
}
?>
