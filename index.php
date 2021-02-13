<?php session_start();
$conn = mysqli_connect('localhost', 'root', '', 'user');
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Ubuntu");

        * {
            box-sizing: border-box;
        }


        body {
            font-family: "Ubuntu", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
        }

        .bg {
            background: url("https://images.unsplash.com/photo-1576161787924-01bb08dad4a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2104&q=80") no-repeat center center/cover;
            position: absolute;
            top: -30px;
            left: -30px;
            width: calc(100vw + 60px);
            height: calc(100vh + 60px);
            z-index: -1;
            filter: blur(0px);
        }

        .loading-text {
            font-size: 50px;
            color: #fff;
        }
    </style>
    <title>Home</title>
    <link rel="shortcut icon" href="https://cdn0.iconfinder.com/data/icons/google-material-design-3-0/48/ic_home_48px-256.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <h2>Hello...</h2>

    <section class="bg"></section>
    <div class="loading-text">0%</div>
    <script src="script.js"></script>

    <a class="btn btn-danger" href="logout.php">Logout</a>
    <script>
        alert("Login successful");
    </script>

    <script>
        const loadText = document.querySelector('.loading-text')
        const bg = document.querySelector('.bg')

        let load = 0

        let int = setInterval(blurring, 30)

        function blurring() {
            load++;

            if (load > 99) {
                clearInterval(int)
            }

            loadText.innerText = `${load}%`
            loadText.style.opacity = scale(load, 0, 100, 1, 0)
            bg.style.filter = `blur(${scale(load, 0, 100, 30, 0)}px)`
        }

        const scale = (num, in_min, in_max, out_min, out_max) => {
            return ((num - in_min) * (out_max - out_min)) / (in_max - in_min) + out_min
        }
    </script>
</body>

</html>