<?php
    $protocol = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path_web = $protocol.$host;

    define('PATHURL', './');
    define('WEBURL', $path_web);
    
    $table_prefix = 'doculoc_';    
?>