<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="shortcut icon" href="https://cdn0.iconfinder.com/data/icons/very-basic-android-l-lollipop-icon-pack/24/key-256.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
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
        <form action="" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="login" value="Login" class="btn btn-primary btn-block">Log In</button>
            </div>
            <div class="clearfix">
                <!-- <label class="float-left form-check-label"><input type="checkbox"> Remember me</label> -->
                <a href="view.php" class="float-right">Forgotten password?</a>
            </div>

        </form>
        <p class="text-center"><a href="register.php">Create New Account</a></p>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'user');
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $select = "select * from signup_login where email='$email'";
            $run = mysqli_query($conn, $select);
            $data = mysqli_fetch_array($run);
            $dbemail = $data['email'];
            $dbpassword = $data['password'];
            if (($email === $dbemail) && ($password === $dbpassword)) {
                header("location:index.php");
                $_SESSION['email'] = $email;
            } else {
        ?>
                <script>
                    alert("Email Or Password is Wrong");
                </script>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>