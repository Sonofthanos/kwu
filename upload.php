<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input Data</title>
</head>

<body>
    <?php
    session_start();
    include('koneksi.php');
    $id = $_GET['Id'];
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE Id='$id'");
    $id = mysqli_fetch_array($data);
    ?>

    <form action="upload2.php?id=<?php echo $id['id']; ?>" method="post" enctype="multipart/form-data">
        <hr>
        id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input style="margin-bottom: 10px;" type="text" name="id" value="<?php echo $id['id']; ?>"><br>
        Username &nbsp;: <input style="margin-bottom:10px;" type="text" name="username" value="<?php echo $id['username']; ?>"><br> 
        Password &nbsp;&nbsp;: <input style="margin-bottom: 10px;" type="password" name="password" value="<?php echo $id['password']; ?>"><br> 
        level &nbsp;&nbsp;: <input style="margin-bottom: 10px;" type="text" name="level" value="<?php echo $id['level']; ?>"><br> 
        Email &nbsp;: <input style="margin-bottom: 10px;" type="text" name="Email" value="<?php echo $id['email']; ?>"><br> 
        File &nbsp;: <input style="margin-bottom:10px;" type="file" name="berkas"><br>
        <br>
        <button type="submit">Submit</button>
        <br><br><a href="halaman_admin.php">Kembali</a>
    </form>
</body>
</html>
