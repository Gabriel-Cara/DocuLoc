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
?>
