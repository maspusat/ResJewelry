<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_username = "xhuman";
    $valid_password = "12345";

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username == $valid_username && $input_password == $valid_password) {
        $_SESSION['username'] = $input_username;
        header("Location: lihat.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Invalid username or password";
        header("Location: login.html");
        exit();
    }
}
?>
