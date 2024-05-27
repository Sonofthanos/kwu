<!DOCTYPE html>
<html>

<head>
    <title>KWUmerch</title>
    <link rel="stylesheet" href="merch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="user.css">
    <link rel="icon" href="kwulogo.png" type="image/gif" sizes="16x16">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include 'koneksi.php';
    session_start();
    ?>
    <div class="navbar">
       <div class="kiri">
            <a href="halaman_user.php">Home</a>
            <a href="kwumerch.php">KWUmerch</a>   
            <a href="about.html">About</a>    
       </div>
       <div class="kanan">
            <a href="keranjang.php" class="cart-link"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="logout.php" class="logout-link">LOGOUT</a>
        </div>
    </div>

    

    <h1>KWUmerch</h1>
    <h3>Selamat Berbelanja di KWUmerch</h3>

    <div class="item-container">
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM inventory2");
        while ($p = mysqli_fetch_assoc($data)) {
        ?>
            <div class="item-box" onclick="addToCart(<?php echo $p['id']; ?>)">
                <div class= "item-info">
                    <p><b><?php echo $p['nama']; ?></b></p>
                    <p class="item-price">Harga: <?php echo $p['harga']; ?></p>
                </div>
                <div class="hover-text">Klik untuk memasukkan ke keranjang</div>
                <img src="<?php echo $p['gambar']; ?>">
            </div>
        <?php
        }
        ?>
    </div>

    <script>
        function addToCart(itemId) {
            window.location.href = "cart.php?Id=" + itemId;
            alert("Barang berhasil dimasukkan ke keranjang!");
        }
    </script>
</body>

</html>
