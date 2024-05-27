<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="img/thns.png" type="image/gif" sizes="16x16">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
}

.alert {
    background-color: #f44336;
    color: white;
    padding: 10px;
    text-align: center;
}

.panel_login {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.tulisan_atas {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

.form_login {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

.tombol_login {
    background-color:#0d1e69;
    color: white;
    padding: 10px;
    border: none;
    width: 100%;
    cursor: pointer;
    border-radius: 4px;
}

.tombol_login:hover {
    background-color: #1637cd;
}

.login-register-text {
    text-align: center;
    margin-top: 15px;
}

.login-register-text a {
    color:#0d1e69;
    text-decoration: none;
    font-weight: bold;
}

.login-register-text a:hover {
    text-decoration: underline;
}


    </style>
</head>

<body>
    <h1>Login Page</h1>

    <?php
    if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
        echo "<div class='alert'>Username atau Password yang anda masukkan salah !</div>";
    }
    ?>

    <div class="panel_login">
        <p class="tulisan_atas">masukkan data anda</p>

        <form action="cek_login.php" method="post">
            <input type="text" name="username" class="form_login" placeholder="Username" required="required">

            <input type="password" name="password" class="form_login" placeholder="Password" required="required">
            
            <input type="email" name="email" class="form_login" placeholder="Email" required="required">

            <input type="submit" class="tombol_login" value="LOGIN">
        </form>
        <p class="login-register-text"> Anda belum punya akun? <a href="register_db.php">Daftar</a></p>
        <p class="login-register-text"> Lupa Password? <a href="forget.php">Lupa Password</a></p>
    </div>
</body>

</html>