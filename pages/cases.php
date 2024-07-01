<?php
    include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/conn.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/global_functions.php');
    validate();    

    $name_page = ucfirst("casos");

    if ($_REQUEST['sair'] == 1) {
        desconectar();
    }

    if ($_REQUEST['code']) {
      $alert = 1;

      $code = addslashes($_REQUEST['code']);
      $message = addslashes($_REQUEST['msg']);
    }

    $cases_table = getCases($_COOKIE['access']);

    if (array_key_exists('code', $cases_table)) {
      $alert = 1;

      $code = $cases_table['code'];
      $message = $cases_table['message'];
    }

    if ($_REQUEST['download_case']) {   
      $case = $_REQUEST['token_case'];

      generateContract($case);
    }
?>
  <?php require_once('.'.PATHURL.'lib/include/head-pages.php'); ?>

  <body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-gradient-warning position-absolute w-100"></div>

    <?php require_once('.'.PATHURL.'pages/components/sidebar.php'); ?>

    <main class="main-content position-relative border-radius-lg">
      <?php require_once('.'.PATHURL.'pages/components/navbar.php'); ?>

      <!-- Content -->
      <?php require_once('.'.PATHURL.'pages/components/cases/cases_content.php'); ?>      
      <!-- End Content -->

      <?php require_once('.'.PATHURL.'pages/components/footer.php'); ?>      
    </main>

    <?php if ($alert == 1) { 
        require_once('.'.PATHURL.'pages/components/float_alert.php');  
    } ?>

    <!-- Modal Create -->
    <div
      class="modal fade"
      id="createModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog col-lg-12 modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Cadastro de usuário
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Fechar
            </button>
            <button type="button" class="btn btn-success">Cadastrar</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('.'.PATHURL.'lib/include/footer_scripts-pages.php'); ?>
    <?php require_once('.'.PATHURL.'lib/include/footer_scripts-cases.php'); ?>
  </body>
</html>
