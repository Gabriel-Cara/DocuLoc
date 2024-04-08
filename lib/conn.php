<?php
    $host = '162.241.60.120';
    $db_user = 'doculo09_admin';
    $db_pass = 'Victor0206*';
    $db_name = 'doculo09_app';

    $pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_pass);
?>