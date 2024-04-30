<?php
    include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/conn.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/global_functions.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/profile_functions.php');
    validate();

    $name_page = ucfirst("perfil");

    if ($_REQUEST['sair'] == 1) {
        desconectar();
    }

    if ($_REQUEST['editar']) {
      $data_save = array(
        'profile_user' => addslashes($_REQUEST['profile_user']),
        'profile_email' => addslashes($_REQUEST['profile_email']),
        'profile_name' => addslashes($_REQUEST['profile_name']),
        'profile_surname' => addslashes($_REQUEST['profile_surname']),
        'url_profile_image' => addslashes($_REQUEST['url_profile_image']),
        'profile_address' => addslashes($_REQUEST['profile_address']),
        'profile_district' => addslashes($_REQUEST['profile_district']),
        'profile_city' => addslashes($_REQUEST['profile_city']),
        'profile_state' => addslashes($_REQUEST['profile_state']),
        'profile_country' => addslashes($_REQUEST['profile_country']),
        'profile_postalcode' => addslashes($_REQUEST['profile_postalcode'])
      );

      $edit_user_request = editUserData($data_save);

      if ($edit_user_request !== false && $edit_user_request != 0) {
        $alert = true;

        $success_details = array(
            'code' => 200,
            'message' => 'Sucesso ao inserir ou editar as informações.'
        );
      } else {
        if (!empty($edit_user_request) && is_array($edit_user_request)) {
          $alert = true;

          $error_details = $edit_user_request;
        }
      }      
    }

    if ($_REQUEST['alterar_senha']) {
      $data_save = array(
        'old_password' => addslashes($_REQUEST['old_password']),
        'new_password' => addslashes($_REQUEST['new_password'])
      );

      $edit_pass = editPassword($data_save);

      if ($edit_pass !== false && $edit_pass != 0) {
        $alert = true;

        $success_details = array(
            'code' => 200,
            'message' => 'Senha alterada com sucesso.'
        );
      } else {
        if (!empty($edit_pass) && is_array($edit_pass)) {
          $alert = true;

          $error_details = $edit_pass;
        }
      }
    }

    $view_datas = dataUserProfile();
?>

<?php require_once('.'.PATHURL.'lib/include/head-pages.php'); ?>
  <body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <?php require_once('.'.PATHURL.'pages/components/sidebar.php'); ?>

    <main class="main-content position-relative border-radius-lg">
      <?php require_once('.'.PATHURL.'pages/components/navbar.php'); ?>

      <?php require_once('.'.PATHURL.'pages/components/profile/card_header.php'); ?>

      <div class="container-fluid py-4">
        <div class="row">
          <?php require_once('.'.PATHURL.'pages/components/profile/user_datas.php'); ?>
        </div>

        <?php require_once('.'.PATHURL.'pages/components/footer.php'); ?>
      </div>
    </main>

    <?php require_once('.'.PATHURL.'lib/include/footer_scripts-pages.php'); ?>
  </body>
</html>