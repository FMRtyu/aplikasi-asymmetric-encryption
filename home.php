<!DOCTYPE html>
<html lang="en">
<?php
include('config/database.php');
session_start();
if (!isset($_SESSION['username']) & !isset($_SESSION['password']) & !isset($_SESSION['usernameid'])) {
    header('location:login.php');
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Aplikasi Email Terenkripsi (AET)</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/encryption.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
    <!-- Start your project here-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">Aplikasi Email Terenkripsi (AET)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Selamat datang kembali <?php echo $_SESSION['username'] ?> di Aplikasi Email Terenkripsi (AET)</h1>
            <p class="lead">Aplikasi email yang terjamin terenkripsi (belum teruji di ITB & IPB)</p>
            <p>Email anda <br><a href="buat.php">buat </a></p>

        </div>
    </div>
    <div class="container">
        <?php
        $userid = $_SESSION['usernameid'];
        $sql = "SELECT * FROM chat_message WHERE to_user_id='$userid' ";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
        ?>
        <ul class="list-group">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <a href="baca.php?id=<?php echo $row['chat_message_id']?>">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php
                $from = $row['from_user_id'];
                $sql = "SELECT * FROM login WHERE user_id='$from' ";

                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);

                echo ("Dari Username : " . $row2['username']);
                    ?>
                    <span class="badge badge-primary badge-pill"><?php echo $row['timestamp']; ?></span>
                </li>
            </a>
            <?php
            }
        ?>
        </ul>
        <?php

        } else {
            echo ("<div class='text-center mt-5'>anda belum ada pesan</div>");
        }
        ?>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>