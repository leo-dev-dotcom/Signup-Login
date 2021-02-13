<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        td:nth-of-type(2) {
            text-transform: capitalize;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>View User</title>
    <link rel="shortcut icon" href="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-256.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>View User</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'user');

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $delete = "delete from signup_login WHERE id='$id'";
            $run = mysqli_query($conn, $delete);
            if ($run) {
                echo "Record Has Been Deleted";
            } else {
                echo "Failed, Try Again";
            }
        }


        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'user');
                $select = "select * from signup_login";
                $run = mysqli_query($conn, $select);
                $i = 0;
                while ($data = mysqli_fetch_array($run)) {
                    $i++;

                ?>
                    <tr>
                        <td><?php echo  $i; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td>
                            <?php echo "<a href='view.php?del=$data[id]'>" ?><i class="fas fa-trash-alt" title="Clik Here To Delete"></i></a>
                        </td>
                        <td>
                            <?php echo "<a href='edit.php?edit=$data[id]'>" ?><i class="fas fa-edit" title="Click Here To Edit"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <a href="login.php" class="float-right">Login Page</a>
        </div>
    </div>

</body>

</html>