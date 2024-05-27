<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pew.css">
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Reset Password</h1>
                <form action="send_email.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <button class="btn btn-succes" type="submit" name="reset">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>