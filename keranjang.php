<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="keranjang.css">
    <link rel="icon" href="kwulogo.png" type="image/gif" sizes="16x16">
</head>
</head>

<body>
    <?php
        include 'koneksi.php';
        session_start();
    ?>
    <h1>Keranjang</h1>
    <a href="kwumerch.php">Kembali</a>
    
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
            <th>Total</th>
        </tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM inventory2");
        $no = 1;
        while ($p = mysqli_fetch_assoc($data)) {
            if($p['jumlah']>0){
        ?>
            <tr>
                <?php $id = $p['id']; ?>
                <td><?php echo $no; ?></td>
                <td><?php echo $p['nama']; ?></td>
                <td><?php echo $p['harga']; ?></td>
                <td><?php echo $p['jumlah']; ?></td>
                <td ><a href="aksitambah.php?Id=<?php echo $id ?>">tambah</a><a style="margin-left: 7px ;" href="aksikurang.php?Id=<?php echo $id ?>">kurang</a></td>
                <td><?php echo ($p['harga'] * $p['jumlah']); ?> </td>
            </tr>
        <?php
            }
            $no++;
        }
        ?>
    </table>

    <a href="checkout.php?Id=<?php echo $id ?>">Check Out</a>
</body>

</html>
