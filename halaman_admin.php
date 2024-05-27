<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0d1e69; 
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0d1e69; 
            color: #fff;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            display: inline-block;
            background-color: #0d1e69; 
            color: #fff;
            border-radius: 3px;
        }

        a:hover {
            background-color: #1637cd; 
        }

        img {
            height: 90px;
            width: 90px;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    if ($_SESSION['level'] != "admin") {
        header("location:index.php?pesan=gagal");
        exit(); 
    }

    include 'koneksi.php';
    $koneksi = mysqli_connect("localhost", "root", "", "toko_online2");

    ?>
    <header>
        <h1>Welcome to BPH Page</h1>
    </header>

    <p>Hello <b><?php echo $_SESSION['username']; ?></b>, you are logged in as bph </b>.</p>
    <a href="logout.php">LOGOUT</a>

    <br />
    <br />
    <a href="tambahdata.php">+ TAMBAH DATA</a>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM user order by ID ASC");
        while ($d = mysqli_fetch_array($data)) {
            ?> 
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $d['level']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td>
                    <?php
                    if (!empty($d['file_path']) && file_exists($d['file_path'])) {
                        echo '<img src="' . $d['file_path'] . '" alt="File" class="thumbnail">';
                    } else {
                        echo 'File not found';
                    }
                    ?>               
                <td>
                    <a href="edit.php?Id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="delete.php?Id=<?php echo $d['id']; ?>"onclick="return confirmDelete(<?php echo $d["id"]; ?>,'<?php echo $d["username"]; ?>')"> HAPUS</a>
                    <a href="upload.php?Id=<?php echo $d['id']; ?>">UPLOAD</a>
                    <a href="download.php?Id=<?php echo $d['id']; ?>">DOWNLOAD</a>
                </td>
            </tr>
        <?php
    } ?>
    </table>
    <script>
    function confirmDelete(id,username) {
        if (confirm("Are you sure you want to delete " + username + "?")) {
            window.location.href = 'delete.php?id=' + id;
        }
    }
</script>
</body>

</html>
