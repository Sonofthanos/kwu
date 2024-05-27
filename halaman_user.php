<!DOCTYPE html>
<html>

<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="user.css">
    <link rel="icon" href="kwulogo.png" type="image/gif" sizes="16x16">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();

    if ($_SESSION['level'] != "user") {
        header("location:index.php?pesan=gagal");
    }

    ?>
    <div class="navbar">
        <a href="halaman_user.php">Home</a>
        <a href="kwumerch.php">KWUmerch</a>
        <a href="about.html">About</a>
    </div>

    <h1>Welcome to User Page</h1>

    <?php if (!empty($_SESSION['file_path']) && file_exists($_SESSION['file_path'])) : ?>
        <img class="profile-picture" src="<?php echo $_SESSION['file_path']; ?>" alt="Profile Picture">
    <?php else : ?>
        <p>not found</p>
    <?php endif; ?>


    <p>Hello <b><?php echo $_SESSION['username']; ?></b>,</p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>

<footer>
<div class="logout">
        <a href="logout.php">LOG OUT</a></div>
</footer>
    
</body>

</html>
