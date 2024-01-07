<?php
session_start();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

        $_SESSION['username'] = $username;
        $_SESSION['is_login'] = 1;
        echo true;
}

?>