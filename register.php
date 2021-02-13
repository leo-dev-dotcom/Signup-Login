<!DOCTYPE html>
<html lang="en">

<head>
    <title>SignUp</title>
    <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/user-interface-730/32/Add_User-256.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Sign Up</h2>
        <P>It's quick and easy.</P>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" autocomplete="off" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" autocomplete="off" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" autocomplete="off" placeholder="Enter password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
            <p>By clicking Sign Up, you agree to our <a href="#">Terms, Data Policy</a> and <a href="#">Cookie Policy</a>.</p>
            <p>Already have an account?<a href="login.php">Sign in</a></p>

        </form>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'user');




        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $select = "select * from signup_login where email='$email'";
            $run = mysqli_query($conn, $select);
            $num_rows = mysqli_num_rows($run);

            if ($num_rows > 0) {
        ?>
                <script>
                    alert("Email already exists");
                </script>
                <?php
                // echo "Email Already Exist";
            } else {
                $insert = "insert into signup_login(name, email, password) values('$name','$email','$password')";
                $run_insert = mysqli_query($conn, $insert);
                if ($run_insert) {
                    // echo "Data Has Been Inserted";
                ?>
                    <script>
                        alert("You have signed up successful");
                    </script>
        <?php

                }
                // $insert = "insert into signup_login(name, email, password) values('$name','$email','$password')";
                // $run_insert = mysqli_query($conn, $insert);
                // if ($run_insert) {
                //     echo "Data Has Been Inserted";
            }
        }
        ?>
    </div>

</body>

</html>