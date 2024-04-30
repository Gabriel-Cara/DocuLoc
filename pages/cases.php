<?php
    include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/conn.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/global_functions.php');
    validate();

    $name_page = ucfirst("casos");

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

      <!-- Content -->
      <div class="container-fluid py-4">
        <div class="row">
          <div class="card">
            <!-- Header -->
            <div class="row">
              <div
                class="card bg-default py-2 border-radius-bottom-start-0 border-radius-bottom-end-0"
              >
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-white font-weight-bolder mt-1 mx-2">
                    Tabela de Casos
                  </h4>
                  <a
                    class="btn btn-success mx-2 my-2"
                    data-bs-toggle="modal"
                    data-bs-target="#createModal"
                    >Criar</a
                  >
                </div>
              </div>
            </div>

            <!-- Body -->
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                    >
                      Responsável
                    </th>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                    >
                      Locador
                    </th>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                    >
                      Locatário
                    </th>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                    >
                      Progresso
                    </th>
                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                    >
                      Ações
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img
                            src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">
                            Gabriel Vieira Quesada Cara
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            gabriel.cara@doculoc.com
                          </p>
                          <p
                            class="text-xs text-sencodary mb-0 font-weight-bold"
                          >
                            Gerente
                          </p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-xs">Gustavo Scavassa</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="text-secondary text-xs font-weight-bolder"
                        >Marco Iwanaga</span
                      >
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-sm font-weight-bold">0%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-danger"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width: 0%"
                          ></div>
                        </div>
                      </div>
                    </td>
                    <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                      <a
                        class="btn btn-info my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        >Editar</a
                      >
                      <a
                        class="btn btn-danger my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        >Deletar</a
                      >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img
                            src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">
                            Gabriel Vieira Quesada Cara
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            gabriel.cara@doculoc.com
                          </p>
                          <p
                            class="text-xs text-sencodary mb-0 font-weight-bold"
                          >
                            Gerente
                          </p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-xs">Gustavo Scavassa</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="text-secondary text-xs font-weight-bolder"
                        >Marco Iwanaga</span
                      >
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-sm font-weight-bold">25%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-gradient-warning"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width: 25%"
                          ></div>
                        </div>
                      </div>
                    </td>
                    <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                      <a
                        class="btn btn-info my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        >Editar</a
                      >
                      <a
                        class="btn btn-danger my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        >Deletar</a
                      >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img
                            src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">
                            Gabriel Vieira Quesada Cara
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            gabriel.cara@doculoc.com
                          </p>
                          <p
                            class="text-xs text-sencodary mb-0 font-weight-bold"
                          >
                            Gerente
                          </p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-xs">Gustavo Scavassa</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="text-secondary text-xs font-weight-bolder"
                        >Marco Iwanaga</span
                      >
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-sm font-weight-bold">50%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-gradient-primary"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width: 50%"
                          ></div>
                        </div>
                      </div>
                    </td>
                    <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                      <a
                        class="btn btn-info my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        >Editar</a
                      >
                      <a
                        class="btn btn-danger my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        >Deletar</a
                      >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img
                            src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">
                            Gabriel Vieira Quesada Cara
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            gabriel.cara@doculoc.com
                          </p>
                          <p
                            class="text-xs text-sencodary mb-0 font-weight-bold"
                          >
                            Gerente
                          </p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-xs">Gustavo Scavassa</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="text-secondary text-xs font-weight-bolder"
                        >Marco Iwanaga</span
                      >
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-sm font-weight-bold">75%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-gradient-info"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width: 75%"
                          ></div>
                        </div>
                      </div>
                    </td>
                    <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                      <a
                        class="btn btn-info my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        >Editar</a
                      >
                      <a
                        class="btn btn-danger my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        >Deletar</a
                      >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img
                            src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">
                            Gabriel Vieira Quesada Cara
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            gabriel.cara@doculoc.com
                          </p>
                          <p
                            class="text-xs text-sencodary mb-0 font-weight-bold"
                          >
                            Gerente
                          </p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-xs">Gustavo Scavassa</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="text-secondary text-xs font-weight-bolder"
                        >Marco Iwanaga</span
                      >
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-sm font-weight-bold">100%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-gradient-success"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width: 100%"
                          ></div>
                        </div>
                      </div>
                    </td>
                    <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                      <a
                        class="btn btn-info my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        >Editar</a
                      >
                      <a
                        class="btn btn-danger my-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        >Deletar</a
                      >
                    </td>
                  </tr>
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
  </body>
</html>
