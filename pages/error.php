<?php
  include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
  session_start();

  $name_page = ucfirst("erro");

  $error_code = $_SESSION['error_code'];
  $error_message = $_SESSION['error_message'];
?>  
  <?php require_once('.'.PATHURL.'lib/include/head-pages.php'); ?>

  <body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative border-radius-lg">
      <!-- Content -->
      <?php require_once('.'.PATHURL.'pages/errors/'.$error_code.'.php'); ?>
      <!-- End Content -->
    </main>
  </body>
</html>