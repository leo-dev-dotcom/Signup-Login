<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User</title>
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/picol-vector/32/document_text_edit-256.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit User</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'user');

        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $select = "select * from signup_login where id='$id'";
            $run = mysqli_query($conn, $select);
            $data = mysqli_fetch_array($run);
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
        }
        ?>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" autocomplete="off" id="name" value="<?php echo $name; ?>" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" autocomplete="off" id="email" value="<?php echo $email; ?>" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" autocomplete="off" id="password" value="<?php echo $password; ?>" placeholder="Enter password" name="password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
        <br>
        <a href="view.php">View User</a>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'user');

        // if ($conn) {
        //     echo "connection OK";
        // } else {
        //     echo "failed";
        // }
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $update = "UPDATE signup_login
            SET  name = '$name',  email='$email', password='$password'
            WHERE id={$id} ";

            $run_update = mysqli_query($conn, $update);
            if ($run_update) {

                header("location:view.php");
            } else {
                echo "Failed, Try Again";
            }
        }
        ?>
    </div>

</body>

</html>