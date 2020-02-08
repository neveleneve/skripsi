<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
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
        <form action="login.php" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <select name="level" id="level" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="peserta">Penjual</option>
                    <option value="pembeli">Pembeli</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" style="border-radius:30px;">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                <a href="#" class="pull-right">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="registerpage.php">Buat Akun Peserta</a></p>
        <p class="text-center"><a href="registerpembelipage.php">Buat Akun Pembeli</a></p>
        <p class="text-center"><a href="index.php">Home</a></p>
    </div>
</body>

</html>