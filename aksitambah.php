<?php
include "koneksi.php";

$id = $_GET['Id'];


$data = mysqli_query($koneksi, "SELECT * FROM inventory2 WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

$jumlah =  $d['jumlah'];
$new_jumlah = $jumlah + 1;


mysqli_query($koneksi, "UPDATE inventory2 SET jumlah='$new_jumlah' WHERE id='$id'");


header("location:keranjang.php");