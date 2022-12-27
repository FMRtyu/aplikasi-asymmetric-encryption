<html>

<body>
    <script src="js/jquery-3.6.3.js"></script>
    <?php
    session_start();
    $_SESSION['pubb'] = "";
    include('config/database_connection.php');
    include('js.php');

    $message = '';

    $username = trim($_POST['username']);
    $password = trim($_POST['Password']);
    $check_query = "
 SELECT * FROM login 
 WHERE username = :username
 ";
    $statement = $connect->prepare($check_query);
    $check_data = array(
        ':username' => $username
    );
    if ($statement->execute($check_data)) {
        if ($statement->rowCount() > 0) {
            $message .= '<p><label>(register)Nama sudah terdaftar !</label></p>';
            header("location:login.php?msg=" . $message);
        } else {
            if (empty($username)) {
                $message .= '<p><label>(register)Harap isi Nama !</label></p>';
                header("location:login.php?msg=" . $message);
            }
            if (empty($password)) {
                $message .= '<p><label>(register)Harap isi kata sandi !</label></p>';
                header("location:login.php?msg=" . $message);
            } else {
                if ($password != $_POST['RepeatPassword']) {
                    $message .= '<p><label>(register)Kata sandi tidak sama !</label></p>';
                    header("location:login.php?msg=" . $message);
                }
            }
            if ($message == '') {

                $data = array(
                    ':username' => $username,
                    ':password' => $password
                );

                $query = "
INSERT INTO login 
(username, password) 
VALUES (:username, :password)
";
                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    $message = "<label>Pendaftaran berhasil !</label>";
                }
                header("location:login.php?msg=<label>Pendaftaran berhasil !</label>");
            }
        }
    }
    ?>
</body>

</html>