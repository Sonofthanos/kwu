<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0d1e69;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #0d1e69;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .update-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .back-to-admin {
            display: inline-block;
            background-color: #0d1e69;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            text-decoration: none;
            text-align: center;
        }

        .back-to-admin:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <header>
        <h1>Edit User</h1>
    </header>

    <?php
    session_start();

    if ($_SESSION['level'] != "admin") {
        header("location:index.php?pesan=gagal");
    }

    include 'koneksi.php';

    $id = $_GET['Id'];

    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $email = $_POST['email'];

        $update_query = "UPDATE user SET username='$username', password='$password', level='$level', email='$email' WHERE id=$id";
        $update_result = mysqli_query($koneksi, $update_query);

        if ($update_result) {
            echo "<p class='update-message'>Data pengguna berhasil diperbarui.</p>";
        } else {
            echo "<p class='update-message'>Gagal memperbarui data pengguna.</p>";
        }
    }
    ?>

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required>

        <label for="level">Level:</label>
        <input type="text" id="level" name="level" value="<?php echo $row['level']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <input type="submit" value="Update">
    </form>

    <a href="halaman_admin.php" class="back-to-admin">Kembali ke Halaman Admin</a>
</body>

</html>
