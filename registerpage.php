<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <form action="register.php" method="post">
            <h2 class="text-center">Registrasi</h2>
            <div class="form-group">
                <input type="text" class="form-control text-center" name="nostand" placeholder="Nomor Stand" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-center" name="namastand" placeholder="Nama Stand" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-center" name="namapenjual" placeholder="Nama Penjual" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-center" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-center" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" style="border-radius:30px;">Daftar!</button>
            </div>
        </form>
        <p class="text-center"><a href="index.php">Home</a></p>
        <p class="text-center"><a href="registerpembelipage.php">Registrasi Pembeli</a></p>
    </div>
</body>

</html>