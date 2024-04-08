<?php
    function desconectar() {
        setcookie('user', '', time() - 3600, '/');
        setcookie('token', '', time() - 3600, '/');
        setcookie('access', '', time() - 3600, '/');

        session_start();
        session_destroy();

        header('location: .'.PATHURL.'login.php');
        exit();
    }

    function validate() {
        if (($_COOKIE['token'] == '' || empty($_COOKIE['token']) || !isset($_COOKIE['token'])) || ($_SESSION['token'] == '' || empty($_SESSION['token']) || !isset($_SESSION['token']))) {
            header('location: .'.PATHURL.'login.php');
            exit();
        }
    }
?>
