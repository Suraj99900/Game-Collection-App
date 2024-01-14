<?php
session_start();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];

        $_SESSION['username'] = $username;
        $_SESSION['phoneNumber'] = $phoneNumber;
        $_SESSION['password'] = $password;
        $_SESSION['is_login'] = 1;
        echo true;
}

?>