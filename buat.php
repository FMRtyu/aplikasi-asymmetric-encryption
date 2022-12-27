<!DOCTYPE html>
<html lang="en">
<?php
$message = "";
include('config/database.php');
session_start();
if (!isset($_SESSION['username']) & !isset($_SESSION['password']) & !isset($_SESSION['usernameid'])) {
    header('location:login.php');
}
if (isset($_POST["buat"])) {
    $toUser = $_POST['touser'];
    $pesan = $_POST['pesan'];
    $sql = "SELECT * FROM login WHERE username='$toUser' ";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] == $_SESSION['username']) {
            $message = "<p><label>User tersebut adalah anda</label></p>";
        } else {
            $_SESSION['touser'] = $row['user_id'];
            $_SESSION['touserpass'] = $row['password'];
            $_SESSION['msg'] = $pesan;
            header('location:enkripsi.php');
        }

    } else {
        $message = "<p><label>User tersebut tidak ada</label></p>";
    }
}
if (isset($_GET['cipher'])) {
    $enkripmsg = $_GET['cipher'];
    echo $enkripmsg;
    $toUser = $_SESSION['touser'];
    $from = $_SESSION['usernameid'];
    echo $toUser;
    echo $from;
    $sql = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, timestamp, status) 
    VALUES ('.$toUser.', '.$from.', '.$enkripmsg.', current_timestamp(), '0')";
    if (mysqli_query($conn, $sql)) {
        header("location:home.php?status=berhasil");    
    } else {
        header("location:home.php?status=tidakberhasil"); 
    }
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
    <form method="POST">
        <div class="container w-75 p-3">
            <div class="form-group">
                <?php echo $message?>
            </div>
            <div class="form-group">
                <label for="touser">Username yang dituju</label>
                <input type="text" class="form-control" name="touser" required>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" rows="3" required maxlength="505"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="buat" class="btn btn-primary btn-block mb-4">Kirim pesan</button>
            </div>
        </div>
    </form>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>