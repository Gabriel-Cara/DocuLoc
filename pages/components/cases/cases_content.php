<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <!-- Header -->
            <div class="row">
                <div class="card bg-default py-2 border-radius-bottom-start-0 border-radius-bottom-end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="text-white font-weight-bolder mt-1 mx-2">Tabela de Casos</h4>
                        
                        <a class="btn d-flex align-items-center btn-success mx-2 my-2" href="./new-case.html">
                            <i class="ph ph-plus-circle" style="font-size: 18px" style="font-size: 18px;"></i>
                            &nbsp;<span class="d-none d-md-block">Criar</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                Responsável
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Locador
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Locatário
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Progresso
                            </th>

                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                Ações
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3"/>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">Gabriel Vieira Quesada Cara</h6>

                                        <p class="text-xs text-secondary mb-0">gabriel.cara@doculoc.com</p>
                                        <p class="text-xs text-sencodary mb-0 font-weight-bold">Gerente</p>
                                    </div>
                                </div>
                            </td>

                            <td><h6 class="mb-0 text-xs">Gustavo Scavassa</h6></td>

                            <td class="align-middle text-sm">
                                <span class="text-secondary text-xs font-weight-bolder">Marco Iwanaga</span>
                            </td>

                            <td class="align-middle">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-sm font-weight-bold">100%</span>
                                        </div>
                                    </div>

                                    <div class="progress">
                                        <!-- 
                                            Progresso 0 ~ 25% = bg-gradient-danger
                                            Progresso 26 ~ 50% = bg-gradient-warning
                                            Progresso 51 ~ 75% = bg-gradient-info
                                            Progresso 76 ~ 100% = bg-gradient-success
                                        -->
                                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="100" aria-valuemax="100" style="width: 100%"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                                <a class="btn btn-dark my-2" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="ph ph-eye" style="font-size: 18px;"></i>
                                </a>

                                <a class="btn btn-info my-2" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="ph ph-pencil" style="font-size: 18px;"></i>
                                </a>

                                <a class="btn btn-danger my-2" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="ph ph-trash" style="font-size: 18px;"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>