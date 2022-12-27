<!DOCTYPE html>
<html lang="en">
<?php
$message = "";
include('config/database.php');
include('js.php');
session_start();
if (!isset($_SESSION['username']) & !isset($_SESSION['password']) & !isset($_SESSION['usernameid'])) {
    header('location:login.php');
}
if ($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM chat_message WHERE chat_message_id='$id' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $somel = $row['chat_message']; 
} else {
    header("location:home.php");
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
    <div class="container w-75 p-3">
        <div class="form-group">
            <?php echo $message ?>
        </div>
        <div class="form-group">
            <label for="touser">Dari Username : </label>
            <input type="text" class="form-control" name="touser" readonly value="<?php
                $from = $row['from_user_id'];
                $sql = "SELECT * FROM login WHERE user_id = $from ";

                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);

                echo $row2['username'];
                ?>">
        </div>
        <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea class="form-control" rows="10" id="pesananan"></textarea>
        </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script>
        var PassPhrase = "<?php echo $_SESSION['password'] ?>";
        var Bits = 512;

        console.log(PassPhrase);

        var RSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
        var temp = "<?php echo $somel?>";
        var DecryptionResult = cryptico.decrypt("<?php echo $somel?>", RSAkey);

        console.log("<?php echo $row['chat_message']?>"+ " DecryptionResult: " +DecryptionResult.plaintext + " RSAkey: "+ cryptico.publicKeyID(cryptico.publicKeyString(RSAkey)));
        document.getElementById('pesananan').innerHTML = DecryptionResult.plaintext;
    </script>
</body>

</html>