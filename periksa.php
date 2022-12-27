<?php
include('config/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = trim($_POST['Password']);
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['usernameid'] = $row['user_id'];
        $_SESSION['password'] = $row['password'];
        header("Location: home.php");
    } else {
        header("Location: login.php?msg=<p><label>Email atau password Anda salah. Silahkan coba lagi!</label></p>");
    }
}
?>