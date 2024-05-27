<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="user.css">
    <link rel="icon" href="kwulogo.png" type="image/gif" sizes="16x16">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <a href="cart.php">Kembali ke Keranjang</a>
    
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        include 'koneksi.php';
        session_start();

        $totalBelanja = 0; // variabel untuk menyimpan total belanja

        // Ambil data barang yang ada di keranjang
        $dataKeranjang = mysqli_query($koneksi, "SELECT * FROM inventory2 WHERE jumlah > 0");
        $no = 1;
        while ($barang = mysqli_fetch_assoc($dataKeranjang)) {
            $subtotal = $barang['harga'] * $barang['jumlah']; // hitung subtotal per barang
            $totalBelanja += $subtotal; // tambahkan subtotal ke total belanja
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $barang['nama']; ?></td>
                <td><?php echo $barang['harga']; ?></td>
                <td><?php echo $barang['jumlah']; ?></td>
                <td><?php echo $subtotal; ?> </td>
            </tr>
        <?php
            $no++;
        }
        ?>
        <tr>
            <td colspan="4"><strong>Total Belanja:</strong></td>
            <td><?php echo $totalBelanja; ?></td>
        </tr>
    </table>

    <!-- Form untuk memproses pembayaran, misalnya -->
    <h2>Informasi Pembayaran</h2>
    <form action="proses_checkout.php" method="post">
        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" id="metode_pembayaran">
            <option value="transfer_bank">QRIS</option>
            <option value="cod">Cash on Delivery (COD)</option>
            <!-- tambahkan opsi pembayaran lain jika diperlukan -->
        </select>
        <br>
        <button type="submit">Proses Pembayaran</button>
    </form>
</body>
</html>
