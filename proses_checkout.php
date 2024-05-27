<?php
// Pastikan file ini disimpan dalam server yang mendukung PHP

include 'koneksi.php'; // Hubungkan ke database
session_start();

// Proses pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Simpan data pembayaran ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
    // Misalnya, Anda bisa menyimpan pesanan ke dalam database, mengirim email notifikasi, dll.

    // Setelah proses pembayaran berhasil, Anda bisa mengosongkan keranjang belanja dengan mengurangi jumlah barang dari database
    $queryUpdateJumlah = "UPDATE inventory2 SET jumlah = 0";
    mysqli_query($koneksi, $queryUpdateJumlah);

    // Redirect ke halaman sukses atau halaman lain sesuai kebutuhan
    header("Location: sukses_checkout.php");
    exit();
} else {
    // Jika pengguna mencoba mengakses file ini secara langsung tanpa melalui form checkout, kembalikan mereka ke halaman checkout
    header("Location: checkout.php");
    exit();
}
?>
