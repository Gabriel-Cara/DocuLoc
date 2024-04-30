<?php
  include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
  include($_SERVER['DOCUMENT_ROOT'].'/lib/conn.php');
  include($_SERVER['DOCUMENT_ROOT'].'/lib/global_functions.php');
  validate();

  $name_page = ucfirst("funcionarios");

  if ($_REQUEST['sair'] == 1) {
    desconectar();
  }
?>
  <?php require_once('.'.PATHURL.'lib/include/head-pages.php'); ?>

  <body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-gradient-warning position-absolute w-100"></div>

    <?php require_once('.'.PATHURL.'pages/components/sidebar.php'); ?>

    <main class="main-content position-relative border-radius-lg">
      <?php require_once('.'.PATHURL.'pages/components/navbar.php'); ?>

      <!-- Alerts for modals -->
      <?php require_once __DIR__ . '/components/employees_alerts.php'; ?>
      <!-- End Alerts for modals -->

      <!-- Content -->
      <div class="container-fluid py-4">
        <div class="row">
          <div class="card">
            <!-- Header -->
            <div class="row">
              <div class="card bg-default py-2 border-radius-bottom-start-0 border-radius-bottom-end-0">
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-white font-weight-bolder mt-1 mx-2">Tabela de Funcionários</h4>
                  <a class="btn btn-success mx-2 my-2" data-bs-toggle="modal" data-bs-target="#createEmployee">Criar</a>
                </div>
              </div>
            </div>

            <!-- Body -->
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome/Email</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cargo</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CPF</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telefone</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($employeeList as $employee) { ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                        class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?=$employee->name;?></h6>
                                    <p class="text-xs text-secondary mb-0"><?=$employee->email;?></p>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <span class="text-secondary text-xs font-weight-bolder">
                              <?php
                                $search_id = $employee->type;

                                $filtered_type = array_filter($typeList, function($obj) use ($search_id) {
                                  return $obj->id == $search_id;
                                });

                                if (!empty($filtered_type)) {
                                  $finded_type = reset($filtered_type);
                                  echo $finded_type->name;
                                } else {
                                  echo "Erro ao buscar";
                                }
                              ?>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">A definir</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">A definir</span>
                        </td>
                        <td class="align-middle text-center">
                          <div class="form-check form-switch justify-content-center">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if ($employee->status == 1){ echo "checked"; } ?> disabled>
                          </div>
                        </td>
                        <td class="d-flex px-2 py-1 gap-3 justify-content-center">
                            <a class="btn btn-info my-2" data-bs-toggle="modal"
                                data-bs-target="#editEmployee<?=$employee->id;?>">Editar</a>
                            <a class="btn btn-danger my-2" data-bs-toggle="modal"
                                data-bs-target="#deleteEmployee">Deletar</a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editEmployee<?=$employee->id;?>" tabindex="-1" role="dialog" aria-labelledby="modalEditEmployee" aria-hidden="true">
                      <div class="modal-dialog col-lg-12 modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <form role="form" method="PUT">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalEditEmployee">
                                Edição de funcionário
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
                              <div class="mb-3">
                                <input type="text" name="user_name" class="form-control form-control-lg" placeholder="Nome completo" value="<?=$employee->name;?>" aria-label="Nome completo" required>
                              </div>

                              <div class="mb-3">
                                <input type="email" name="user_email" class="form-control form-control-lg" placeholder="Email" value="<?=$employee->email;?>" aria-label="Email" required>
                              </div>

                              <div class="mb-3">
                                <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Senha" aria-label="Senha">
                              </div>

                              <div class="mb-3">
                                <select name="type_of_user" class="form-control form-control-lg" required>
                                  <option value="">Selecione o cargo</option>
                                  <?php foreach ($typeList as $type) {?>
                                    <option value="<?=$type->id;?>" <?php if($type->id == $employee->type) { echo "selected"; } ?>><?=$type->name;?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="mb-3">
                                <select name="company" class="form-control form-control-lg" required>
                                  <option value="">Selecione a imobiliária</option>
                                  <?php foreach ($companyList as $company) {?>
                                    <option value="<?=$company->id;?>" <?php if($company->id == $employee->company){ echo "selected"; } ?>><?=$company->name;?></option>
                                  <?php } ?>
                                </select>
                              </div>            
                            </div>

                            <div class="modal-footer">
                              <input type="hidden" name="is_edit" value="1">
                              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                                Fechar
                              </button>
                              <input type="submit" value="Editar" name="editar" class="btn btn-success">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Edit -->
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content -->

      <?php require_once('.'.PATHURL.'pages/components/footer.php'); ?>
    </main>

    <!-- Modal Create -->
    <div class="modal fade" id="createEmployee" tabindex="-1" role="dialog" aria-labelledby="modalCreateEmployee" aria-hidden="true">
      <div class="modal-dialog col-lg-12 modal-dialog-centered" role="document">
        <div class="modal-content">
          <form role="form" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCreateEmployee">
                Cadastro de funcionário
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
              <div class="mb-3">
                <input type="text" name="user_name" class="form-control form-control-lg" placeholder="Nome completo" aria-label="Nome completo" required>
              </div>

              <div class="mb-3">
                <input type="email" name="user_email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" required>
              </div>

              <div class="mb-3">
                <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Senha"
                  aria-label="Senha" required>
              </div>

              <div class="mb-3">
                <select name="type_of_user" class="form-control form-control-lg" required>
                  <option value="">Selecione o cargo</option>
                  <?php foreach ($typeList as $type) {?>
                    <option value="<?=$type->id;?>"><?=$type->name;?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <select name="company" class="form-control form-control-lg" required>
                  <option value="">Selecione a imobiliária</option>
                  <?php foreach ($companyList as $company) {?>
                    <option value="<?=$company->id;?>"><?=$company->name;?></option>
                  <?php } ?>
                </select>
              </div>            
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                Fechar
              </button>
              <input type="submit" value="Cadastrar" name="salvar" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Create -->

    <?php require_once('.'.PATHURL.'lib/include/footer_scripts-pages.php'); ?>
  </body>
</html>
