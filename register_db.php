<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regis.css">
    <title>Register</title>
</head>
<body>
    <div class="wrapper">
        <?php
        require_once "koneksi.php";
        if (isset($_POST["submit"])) {
            $id = $_POST["Id"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $level = "user";
            $email = $_POST["email"];
            $errors = array();

            if (empty($id) || empty($username) || empty($password) || empty($level) || empty($email)) {
                echo "<div class='alert alert-danger'>Semua harus diisi</div>";
            } else {
                $sql = "INSERT INTO user (id, Username, Password, level, email) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($koneksi);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sssss", $id, $username, $password, $level, $email);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<div class='alert alert-success'>You are registered successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . mysqli_stmt_error($stmt) . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error in preparing statement: " . mysqli_stmt_error($stmt) . "</div>";
                }

                // Tutup statement setelah digunakan
                mysqli_stmt_close($stmt);
            }
        }
        ?>
        <form action="register_db.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="Id" class="form_register" placeholder="Id" required>
            </div>
            <div class="input-box">
                <input type="text" name="username" class="form_register" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="form_register" placeholder="Password" required>
            </div>
            <div class="input-box">
                <input type="text" name="email" class="form_register" placeholder="email" required>
            </div>
            <div class="input-box">
                <button type="submit" class="btn" name="submit">daftar</button>
            </div>
        </form>
        <p class="register-text">sudah punya akun ? <a href="index.php">login</a></p>
    </div>
</body>

</html>
